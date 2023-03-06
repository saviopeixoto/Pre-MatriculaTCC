<?php
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("libs/db_funcoes.php");

$dbresposta01 = "";
$iInstit      = db_getsession('DB_instit');

$sSqlParagrafo_1 = "select db_paragrafo.* from db_documento
                       inner join db_docparag on db03_docum = db04_docum
                       inner join db_paragrafo on db04_idparag = db02_idparag
                    where db03_tipodoc = 5028 and db02_idparag = 185 and db03_instit  = " . $iInstit . "
                       order by db02_descr";

$rsParagrafo_1 = db_query($sSqlParagrafo_1);
if (pg_numrows($rsParagrafo_1)>0) {
   db_fieldsmemory($rsParagrafo_1, 0);
   $dbresposta01 = utf8_encode($db02_texto);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Secretaria de Educação - Matricula Facil</title>
<!--[if !lte IE 8]><!-->
<link rel="stylesheet" href="css/config.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/estilo.css" type="text/css" media="screen">
<!--<![endif]-->
<!--[if lte IE 8]><!-->
<link rel="stylesheet" href="css/config_ie.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/estilo_ie.css" type="text/css" media="screen">
<!--<![endif]-->
<link rel="stylesheet" href="css/duvidas.css" type="text/css" media="screen">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/belatedPNG.js"></script>
</head>
<body>
<div id="tudo">
  <div id="meio">
    <h4>Tire aqui todas as suas duvidas sobre o Matrícula Fácil.</h4>
    <div class="linha5"></div>
      <ul class="pergunta">
        <li>1) Quem poderá se inscrever no sistema Matrícula Fácil? </li>
        <li class="resposta">R: Estudantes novos, oriundos de outras Redes de Ensino, bem como os que desejam iniciar ou retornar à vida escolar, na Rede Pública Municipal de Ensino de Itaboraí, para a Educação Infantil ou Ensino Fundamental, nas modalidades: Regular, Educação Especial e Educação de Jovens e Adultos.
        </li>   
      </ul>
      <ul class="pergunta">
        <li>2) Perdi o prazo disponibilizado no Matrícula Fácil. O que fazer?</li>
        <li class="resposta">Para o candidato que perdeu o prazo de inscrição, este poderá se inscrever na IIª Fase de inscrição, no endereço www.seme.itaborai.rj.gov.br que acontecerá nos dias 21 a 24/01/2019.
        </li>
      </ul>
      <ul class="pergunta">      
        <li>3) Fiz a inscrição, mas não fui alocado em nenhuma escola</li>         
        <li class="resposta">
          R: Para o candidato que não foi alocado , procure a Secretaria Municipal de Educação, através da Divisão de Matrícula e Estatística a partir de 04/02/2019.
        </li> 
      </ul>
      <ul class="pergunta">      
        <li>4) Como faço para saber o resultado da inscrição?</li>
        <li class="resposta">
          R: Realize a consulta no site www.seme.itaborai.rj.gov.br através do nº do CPF e do nº do protocolo de inscrição ou consulte lista disponível na Secretaria Municipal de Educação e nas Escolas Municipais.
        </li>
      </ul>
      <ul class="pergunta">
        <li>5) Não encontrei o meu Cep no formulário de preenchimento on-line. O que faço?</li>
        <li class="resposta">R: Escolha o Cep mais próximo ao seu logradouro(endereço) ou consulte os Correios.</li>
      </ul>  
      <ul class="pergunta">
        <li>6) O que significa REDE DE ORIGEM mostrado no 4º campo de preenchimento do formulário on-line?</li> 
        <li class="resposta">R: É a Rede de Ensino na qual a sua última escola pertencia. (Particular, Municipal, Estadual ou Federal).</li>
      </ul>
      <ul class="pergunta">
        <li>7) Como será feita a seleção dos candidatos à Pré-Matrícula?</li> 
        <li class="resposta">R: Conforme os critérios estabelecidos pela RESOLUÇÃO SEME Nº 25/2018, de 1º novembro de 2018, no Artigo. 13.</li>
      </ul>
  </div>
</div>	
</body>
</html>