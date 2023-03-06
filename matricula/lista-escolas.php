<?php
/*
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");
require_once('classes/db_escbairro_classe.php');

$aEscolaBairro = array();
$clEscBairro = new cl_escbairro;

$sCampos = "mo08_bairro,ed18_c_nome,ed18_i_rua,j88_descricao,j14_nome,ed18_i_numero,ed18_c_compl,j13_descr ";
$sOrdem  = "mo08_bairro";
$sWhere  = "";

$rsEscolaBairro = $clEscBairro->sql_record($clEscBairro->sql_query_escola_bairro($sCampos,$sOrdem,$sWhere));
$aEscola        = db_utils::getCollectionByRecord($rsEscolaBairro);
$aEscolaBairro  = new ArrayObject($aEscola);
//db_fieldsmemory($rsEscolaBairro,0);
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Secretaria de Educação - Matricula Fácil</title>
<!--[if !lte IE 8]><!-->
<link rel="stylesheet" href="css/config.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/estilo.css" type="text/css" media="screen">
<!--<![endif]-->
<!--[if lte IE 8]><!-->
<link rel="stylesheet" href="css/config_ie.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/estilo_ie.css" type="text/css" media="screen">
<!--<![endif]-->
<link rel="stylesheet" href="css/lista-escolas.css" type="text/css" media="screen">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/belatedPNG.js" ></script>
<script type="text/javascript">
jQuery(document).ready(function() {
   DD_belatedPNG.fix('.png');
});
</script>
</head>
<body>
<div class="container">
  <div class="conteudo conteudo-100 meio-bg">
  <div class="linha2"><!-- --></div>
  <div class="row">
    <div class="col-md-12">        
      <div class="container-fluid">
        <h1 style="text-align:center;color:#ff8000;">Lista de Escolas da Rede Municipal de Ensino de Itaboraí.</h1>
      </div> 
    </div>
  </div>
  <br/>
  <div class="row">
    <div class="col-md-12">        
      <div class="container-fluid">
        <div class="linha5"></div>
        <iframe src="pdf/lista_escola.pdf" name="duvida" width="100%" height="650"></iframe>';
      </div>
    </div>
  </div>   
</div>
</body>
</html>
