<?php 
include('config.php');
die_alert_se_consulta_fechada();

require_once("libs/fpdf/fpdf.php");
require_once("libs/fpdi/autoload.php");
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");

function caixaAlta($string) {
   return strtoupper(utf8_decode($string));
}

$mo01_codigo = $_REQUEST['mo01_codigo'];
//$mo01_cpfresp = $_REQUEST['mo01_cpfresp'];
//if(!is_numeric($mo01_codigo) || !is_numeric($mo01_cpfresp)) die('codigo invalido');
if(!is_numeric($mo01_codigo)) die('codigo invalido');

global $logo;
$sSqlInstituicao = "select nomeinst as prefeitura, munic,uf,logo from db_config where codigo =".db_getsession("DB_instit");
$rsInstituicao  = db_query($sSqlInstituicao);
db_fieldsmemory($rsInstituicao, 0);
$munic = strtoupper($munic);

$logo = 'logo-itaborai.jpg';

$sql = <<<EOF
SELECT *
FROM plugins.mobase
WHERE mo01_codigo = '$mo01_codigo'
  /*AND mo01_cpfresp = '$mo01_cpfresp'*/
LIMIT 1
EOF;
$result = db_query($sql);
db_fieldsmemory($result, 0);
$row = pg_fetch_array($result, null, PGSQL_ASSOC);

$escolas = array ();
$sSqlEscolas  = "select * from plugins.baseescola  ";
$sSqlEscolas .= "  inner join escola   on escola.ed18_i_codigo = baseescola.mo02_escola  ";
$sSqlEscolas .= "  inner join ruas     on ruas.j14_codigo = escola.ed18_i_rua            ";
$sSqlEscolas .= "  inner join bairro   on bairro.j13_codi = escola.ed18_i_bairro         ";
$sSqlEscolas .= "  inner join ruastipo on ruastipo.j88_codigo = ruas.j14_tipo            ";
$sSqlEscolas .= "  inner join serie    on serie.ed11_i_codigo = baseescola.mo02_etapa    ";
$sSqlEscolas .= "where plugins.baseescola.mo02_base = '{$mo01_codigo}' order by mo02_codigo";                     

//die($sSqlEscolas);
$rsEscolas = db_query($sSqlEscolas);
$numrows = pg_numrows($rsEscolas);
$mo01_dtcad = explode('-',$mo01_datacad);

if ($numrows > 0) {
   for($i = 0; $i < $numrows; $i ++) {
      db_fieldsmemory($rsEscolas, $i);
      $j14_nome  = utf8_decode($j14_nome);
      $j13_descr = utf8_decode($j13_descr);
      $j14_nome  = $j14_nome;
      $j13_descr = $j13_descr;
      $escolas [$i] ["escola"]   = $ed18_c_nome;
	  $escolas [$i] ["etapa"]   = $ed11_c_descr;
      $escolas [$i] ["endereco"] = caixaAlta($j88_sigla).' '.caixaAlta($j14_nome).($ed18_i_numero == ''?' ':', '.$ed18_i_numero).($ed18_c_compl==''?' ':', '.$ed18_c_compl).' BAIRRO: '.caixaAlta($j13_descr);
   }  
}

$mo01_cpfresp = substr($mo01_cpfresp,0,3).'.'.substr($mo01_cpfresp,3,3).'.'.substr($mo01_cpfresp,6,3).'-'.substr($mo01_cpfresp,9,2);

$pdf = new FPDF("P","pt","A4");
$pdf->AddPage();
$pdf->settopmargin(1);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',12);
$pdf->SetLineWidth(1);
$pdf->Rect(2,3,590,832,2,'1234');
//$pdf->RoundedRect(2,3,204,292,2,'1234');
$pdf->SetLineWidth(0.5);
$pdf->Rect(4,5,586,826,2,'1234');
$pdf->SetLineWidth(0.2);

$pdf->Image('img/' . $logo,70,25,60,60);
$pdf->sety(34);
$pdf->setfont('Arial','B',14);
$pdf->Multicell(0,8,$prefeitura,0,'C',0);
$pdf->sety(50);
$pdf->setfont('Arial','B',14);
$pdf->Multicell(0,8,'Secretaria Municipal de Educação',0,'C',0);
$pdf->sety(70);
$pdf->setfont('Arial','B',12);
$pdf->Multicell(0,8,"PROTOCOLO DE INSCRIÇÃO Nº {$row['mo01_protocol']}",0,"C",0); // tipo de alvara
$pdf->Line(10,120,580,120);

$coluna = 70;
$linha  = $pdf->gety();
$a = $linha;

$pdf->setx(100);
//$pdf->roundedrect($coluna-2,$linha,187,27,2,'1234');
$pdf->Ln(1);
$pdf->sety($linha+20); 
$pdf->setfont('Arial','B',14);
$pdf->Multicell(0,8,'DADOS DO CANDIDATO',0,"C",0); // tipo de alvara
$pdf->SetFont('Arial','',10);
$pdf->Text($coluna,$linha+60,'NOME DO CANDIDATO:'); // inscricao
$pdf->SetFont('Arial','',10);
$pdf->Text($coluna + 120,$linha+60, caixaAlta($row['mo01_nome'])); // inscricao
$pdf->Text($coluna,$linha+80,"NOME RESPONSÁVEL: "); // nome
$pdf->Text($coluna + 120,$linha+80, caixaAlta($row['mo01_nomeresp'])); // nome
$pdf->Text($coluna,$linha+100,"CPF RESPONSÁVEL: "); // endereco
$pdf->Text($coluna + 120,$linha+100, formatCnpjCpf($row['mo01_cpfresp'])); // inscricao

$linha = $linha+110;
$coluna = 70;

$pdf->setx(44);
//$pdf->rect($coluna,$linha+7,187,27,2,'1234');
$pdf->Ln(1);
$pdf->sety($linha+30); 
$pdf->setfont('Arial','B',20);
$pdf->Multicell(0,8,'ESCOLAS ESCOLHIDAS',0,"C",0); // tipo de alvara
$pdf->Line(10,$linha+60,580,$linha+60);
$pdf->setxy(50,$linha+70);
$pdf->setfont('Arial','B',12);
//$pdf->cell(30,3,"Escola",0,0,"L",0);
$pdf->cell(63,3,"NOME DA(S) ESCOLA(S)",0,0,"L",0);
$pdf->Line(10,$linha+80,580,$linha+80);

$pdf->setfont('Arial','',12);
$yy  = $linha+90;
for($ii=0;$ii<$numrows;$ii++) {
   $pdf->setxy(50,$yy);
   $pdf->setfont('Arial','',12);
   $pdf->cell(30,3,$escolas[$ii]['escola'],0,1,"L",0);
   $yy += 20;
   $pdf->setxy(60,$yy);
   $pdf->setfont('Arial','',8);
   $pdf->cell(30,3,$escolas[$ii]['endereco'],0,1,"L",0);
   $yy += 20;
   $pdf->setxy(50,$yy);
   $pdf->setfont('Arial','',10);
   $pdf->cell(30,3,"ETAPA: ".$escolas[$ii]['etapa'],0,1,"L",0);
   $yy += 20;
}

$pdf->Line(10,$yy+10,580,$yy+10);
$pdf->setxy(15,$yy+30);
$pdf->multicell(0,3,$munic.",(".$uf. ")    ".$mo01_dtcad[2]." DE ".strtoupper(db_mes($mo01_dtcad[1]))." DE ".$mo01_dtcad[0].".",0,"C",0);

$pdf->Line(10,$yy+50,580,$yy+50);
$pdf->setfont('Arial','B',11);
$pdf->Text(40,$yy+80, "Após a alocação, os seguintes documentos serão necessários para a matrícula na escola:");
$pdf->setfont('Arial','B',11);
$pdf->Text(40,$yy+100,"ORIGINAL E CÓPIA DE:");
$pdf->Text(40,$yy+120,"*Certidão de nascimento;");
$pdf->Text(40,$yy+130,"*Comprovante de residência atualizado;");
$pdf->Text(40,$yy+140,"*Cartão de vacinação;");
$pdf->Text(40,$yy+150,"*CPF do estudante;");
$pdf->Text(40,$yy+160,"*Cartão do SUS;");
$pdf->Text(40,$yy+170,"*Tipo Sanguíneo e Fator RH;");
$pdf->Text(40,$yy+180,"*RG e CPF do responsável;");
$pdf->Text(40,$yy+190, "*(02) fotos 3 x 4;");
$pdf->Text(40,$yy+200, "*Protocolo de transferência");
$pdf->Text(40,$yy+210, "*Informar se é beneficiário de Programa Social e o respectivo Número de Identificação Social (NIS).");
 

$texto = "O resultado da alocação estará disponível no site matricula.itaborai.rj.gov.br em até 7 dias.\nCaso não haja vaga, sua inscrição fará parte de uma fila de espera.\nPara dúvidas, envie email para suportematriculas@itaborai.rj.gov.br";
$texto2 = verifica_nee($row);

 
$pdf->Line(10,$yy+10,580,$yy+10);
$pdf->setfont('Arial','',12);
$pdf->setxy(10,$yy+230);
$pdf->multicell(0,13,$texto,0,"L");

$pdf->Line(10,$yy+10,580,$yy+10);
$pdf->setfont('Arial','',12);
$pdf->setxy(10,$yy+280);
$pdf->multicell(0,13,$texto2,0,"J", 0);

header( 'Cache-Control: no-cache' );
header( 'Content-type: application/json; charset="iso-8859-1"', true );
$pdf->Output();


//==============================================================
function formatCnpjCpf($value) {
  $CPF_LENGTH = 11;
  $cnpj_cpf = preg_replace("/\D/", '', $value);
  if (strlen($cnpj_cpf) === $CPF_LENGTH) {
    return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
  } 
  return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
}

/* 
* Funcao para verificar se o candidato ou familiar possui
* deficiencia, TGD ou AH/SD e retornar aviso 
* @return string $aviso_nee
*/

function verifica_nee($row){
	$nee = $row['mo01_necess'];
	$aviso_nee = "";
	if ($nee != 1){
		$aviso_nee = "Para validar a informação das necessidades especiais, envie cópia do protocolo de inscrição e documentos (laudos com cid, declaração, encaminhamento a especialista) que comprovem a deficiência ou transtorno informado para o email edespecial@edu.itaborai.rj.gov.br . Ou, se preferir, entregue as cópias dentro de um envelope com identificação do candidato aos cuidados da Coordenação da Educação Especial na Secretaria Municipal de Educação, localizada na Praça Marechal Floriano Peixoto. O responsável pela inscrição terá até 48h para enviar os comprovantes.";
	}
	return $aviso_nee;
}