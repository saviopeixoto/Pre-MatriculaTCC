<?php 
include('config.php');
//die_alert_se_consulta_fechada();

require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("libs/exceptions/DBException.php");
require_once("std/db_stdClass.php");

function caixaAlta($string) {
   $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
   $string = strtoupper($string);    
   return ($string);
}

$iStatus = 1;
$mo01_nome     = '';
$mo01_nomeresp = '';
$mo01_escola   = '';  
$mo01_dtnasc   = '';

$mo01_codigo  = preg_replace('/[^0-9]/', '', $_POST['mo01_codigo']);
$mo01_cpfresp = preg_replace('/[^0-9]/', '', $_POST['mo01_cpfconsulta']);

if(!is_numeric($mo01_codigo) || !is_numeric($mo01_cpfresp)) die('codigo invalido');

$sql = "SELECT DISTINCT * FROM matriculaonline.mobase WHERE mo01_codigo = '$mo01_codigo'";
$result = pg_query($sql);
if(empty(pg_num_rows($result))) {
	$mo01_escola = 'Cadastro não encontrado.';
} else {
	$row = pg_fetch_array($result, null, PGSQL_ASSOC);
	$mo01_nome     = $row['mo01_nome'];
	$mo01_nomeresp = $row['mo01_nomeresp'];
	$mo01_escola   = $row['mo01_escola'];
	$mo01_dtnasc   = $row['mo01_dtnasc'];
	
	$sql = "SELECT DISTINCT * FROM matriculaonline.complemento01 WHERE sme01_mobaseid = '$mo01_codigo'";
	$result = pg_query($sql);
	$destivado = 0;
	if(!empty(pg_num_rows($result))) {
		$row = pg_fetch_array($result, null, PGSQL_ASSOC);
		$destivado = ($row['sme01_statusid']==8) ? 1 : 0;
	}
	if($destivado) {
		$mo01_escola = "Entre em contato com suportematriculas@itaborai.rj.gov.br e informe o protocolo $mo01_codigo.";
	} else {
		$sql = <<<EOF
			  SELECT DISTINCT
					mo01_codigo,
					mo01_nome,
					mo01_dtnasc,
					mo01_nomeresp,
					mo01_cpfresp,
					ed18_i_codigo,
					( SELECT sme02_prazo
						FROM matriculaonline.complemento02
					   WHERE sme02_alocadoid = mo13_baseescturno
					ORDER BY sme02_codigo DESC
					   LIMIT 1
					) AS prazo
				FROM matriculaonline.alocados
		  INNER JOIN matriculaonline.baseescturno  ON mo03_codigo    = mo13_baseescturno
		  INNER JOIN matriculaonline.baseescola    ON mo02_codigo    = mo03_baseescola
		  INNER JOIN matriculaonline.mobase        ON mo01_codigo    = mo13_base
		  INNER JOIN matriculaonline.basefase      ON mo12_base      = mo01_codigo
		  INNER JOIN escola.serie                  ON ed11_i_codigo  = mo01_serie
		   LEFT JOIN escola.escola                 ON ed18_i_codigo  = mo02_escola
		   LEFT JOIN matriculaonline.complemento01 ON sme01_mobaseid = mo01_codigo
			   WHERE mo01_codigo = '$mo01_codigo'
				 AND mo01_cpfresp = '$mo01_cpfresp'
				 AND mo12_fase IN (17, 18)
			   LIMIT 1
EOF;
		$result = pg_query($sql);
		if(empty(pg_num_rows($result))) {
			$mo01_escola = 'Aluno ainda não alocado. Aluno na fila de espera.';
		} else {
			$row = pg_fetch_array($result, null, PGSQL_ASSOC);
			if(empty($row['ed18_i_codigo'])) {
				$mo01_escola = 'Aluno ainda não alocado. Aluno na fila de espera.';
			} else {
				include('/var/www/html/e-cidade/itaborai/lib/dados2escolas.php');
				$escola = formatar_nome($dados2escolas[$row['ed18_i_codigo']]['nome']);
				$prazo = date('d/m/Y', $row['prazo']);
				$mo01_escola = "Aluno alocado na $escola. Compareça na escola até o dia $prazo.";
			}
		}
	}
}


function formatar_nome ($string) {
	$str = preg_replace(array(
		utf8_decode("/(á|à|ã|â|ä)/"),
		utf8_decode("/(Á|À|Ã|Â|Ä)/"),
		utf8_decode("/(é|è|ê|ë)/"),
		utf8_decode("/(É|È|Ê|Ë)/"),
		utf8_decode("/(í|ì|î|ï)/"),
		utf8_decode("/(Í|Ì|Î|Ï)/"),
		utf8_decode("/(ó|ò|õ|ô|ö)/"),
		utf8_decode("/(Ó|Ò|Õ|Ô|Ö)/"),
		utf8_decode("/(ú|ù|û|ü)/"),
		utf8_decode("/(Ú|Ù|Û|Ü)/"),
		utf8_decode("/(ñ)/"),
		utf8_decode("/(Ñ)/"),
		utf8_decode("/(ç)/"),
		utf8_decode("/(Ç)/")
	), explode(" ", "a A e E i I o O u U n N c C"), $string);
	$str = strtoupper($str);
	$str = preg_replace('/[^0-9A-Z]+/', ' ', trim($str, ' ,'));
	return $str;
}

include('config.php');
include('skin/header.php');
?>
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<!--[if !lte IE 8]><!-->
<link rel="stylesheet" href="css/config.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/estilo.css" type="text/css" media="screen">
<!--<![endif]-->
<!--[if lte IE 8]><!-->
<link rel="stylesheet" href="css/config_ie.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/estilo_ie.css" type="text/css" media="screen">
<!--<![endif]-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/mask.js"></script>
<script type="text/javascript" src="js/validate.min.js"></script>
<script type="text/javascript" src="js/messages_pt_BR.js"></script>
<script type="text/javascript" src="js/belatedPNG.js" ></script>
<script type="text/javascript">
jQuery(document).ready(function() {
   DD_belatedPNG.fix('.png');
});

function carregar(pagina) {
  $("div#meio").load(pagina);
}

function tabClose() {
  var tab = window.open(window.location,"_top");
  tab.close();
}
</script>
<link rel="stylesheet" href="/skin/itaborai.css" />
</head>
<body>
<div class="jumbotron text-center jumbotron-top">
	<img src="/skin/logo.png" />
</div>
<div class="container text-center">
	<div class="row row-top">
		<a href="/" class="btn btn-primary btn-lg btn-top">Início</a>
		<a href="prematricula.php" class="btn btn-success btn-lg btn-top">Faça sua Pré-Matrícula</a>
		<a href="mapaescolas.php" target="_blank" class="btn btn-info btn-lg btn-top">Escolas</a>
		<!--a href="#" class="btn btn-danger  btn-lg btn-top">Dúvidas</a-->
	</div>
</div>
<div id="tudo">
  <div id="meio">
    <div class="container">
     <div class="panel panel-primary">
       <div class="panel-heading">CONSULTA ALOCA&Ccedil;&Atilde;O DA PRÉ-MATRÍCULA</div>
       <div class="panel-body">      
         <div class="row">
           <div class="container-fluid">                        
             <div class="col-md-12">
               <div class="form-group">
                 <label for="mo01_protocol">Numero do Protocolo</label>
                 <input class="form-control" type="text" id="mo01_protocol" name="mo01_nome" value="<?php echo $mo01_codigo; ?>" readonly />
               </div>             
             </div>
           </div>
         </div>
         <div class="row">
           <div class="container-fluid">                        
             <div class="col-md-12">
               <div class="form-group">
                 <label for="mo01_nome">Nome do Candidato</label>
                 <input class="form-control" type="text" id="mo01_nome" name="mo01_nome" value="<?php echo utf8_encode($mo01_nome); ?>" readonly />
               </div>             
             </div>
           </div>
         </div>
         <div class="row">
           <div class="container-fluid">                        
             <div class="col-md-12">
               <div class="form-group">
                 <label for="mo01_dtnasc">Data Nascimento</label>
                 <input class="form-control" type="text" id="mo01_dtnasc" name="mo01_dtnasc" value="<?php echo $mo01_dtnasc; ?>" readonly />
               </div>             
             </div>
           </div>
         </div>
         <div class="row">
           <div class="container-fluid">                        
             <div class="col-md-12">
               <div class="form-group">
                 <label for="mo01_nomeresp">Nome do Respons&aacute;vel</label>
                 <input class="form-control" type="text" id="mo01_nomeresp" name="mo01_nomeresp" value="<?php echo utf8_encode($mo01_nomeresp); ?>" readonly/>
               </div>             
             </div>
           </div>
         </div>
         <div class="row">
           <div class="container-fluid">                        
             <div class="col-md-12">
               <div class="form-group">
                 <label for="mo01_cpfresp">CPF do Respons&aacute;vel</label>
                 <input class="form-control" type="text" id="mo01_cpfresp" name="mo01_cpfresp" value="<?php echo utf8_encode($mo01_cpfresp); ?>" readonly />
               </div>             
             </div>
           </div>
         </div>
         <div class="row">
           <div class="container-fluid">                        
             <div class="col-md-12">
               <div class="form-group">
                 <label for="mo13_escola">Nome da Escola onde foi alocado</label>
                 <input class="form-control" type="text" id="mo13_escola" name="mo13_escola" value="<?php echo $mo01_escola; ?>" readonly />
               </div>             
             </div>
           </div>
         </div>
       </div>
     </div>
     <div class="panel panel-primary">
       <div class="panel-body">
         <div class="form-group" align="center">
		 <form id="moconsulta" name="moconsulta" method="post" action="comprovante.php" target="_blank">
			<input type="hidden" name="mo01_cpfresp" value="<?php echo utf8_encode($mo01_cpfresp); ?>" />
			<input type="hidden" name="mo01_codigo" value="<?php echo $mo01_protocol; /*juliegoulart@id.uff.br * echo substr($mo01_protocol, 0, -6);*/ ?>" />
			<button type="submit" class="btn btn-lg btn-success"> 
				<span class="glyphicon glyphicon-print" aria-hidden="true"></span> Protocolo de Inscrição
			</button>
		</form>
        </div>
      </div>
     </div>
    </div>
  </div><!-- MEIO --> 
<?php
include('skin/footer.php');
