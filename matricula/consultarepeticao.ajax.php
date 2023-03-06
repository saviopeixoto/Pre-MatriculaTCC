<?php 
die;
/*

include('config.php');
die_alert_se_consulta_fechada();

header('Cache-Control: no-cache');
header('Content-type: application/json; charset="utf-8"',true);
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$oRetorno  = new stdClass();
$oRetorno->iStatus  = 1;
$oRetorno->sMessage = '';

$nome = $_REQUEST['mo01_nome'];
$mo01_cpfresp = $_REQUEST['mo01_cpfresp'];
$mo01_cpfresp  = preg_replace('/[^0-9]/', '', $mo01_cpfresp);
if(empty($nome) || !is_numeric($mo01_cpfresp)) die('codigo invalido');

$arr_fases_consulta = 18; //implode("','", get_arr_fases_consulta()); saviodevweb@gmail.com 10/2022

$sSqlCadastro = <<<EOF
SELECT *
FROM plugins.mobase
WHERE mo01_cpfresp = '$mo01_cpfresp'
  AND mo01_fase IN ('$arr_fases_consulta')
LIMIT 1
EOF;

/*
$nome    = pg_escape_string($_REQUEST['mo01_nome']);
$cpfresp = pg_escape_string($_REQUEST['mo01_cpfresp']);

$cpfresp = str_replace('.', '', $cpfresp);
$cpfresp = str_replace('-', '', $cpfresp);

$sSqlCadastro  = "select * from plugins.mobase";
$sSqlCadastro .= " Where mo01_fase = '9' and mo01_cpfresp = '".$cpfresp."'";       

//echo $sSqlCadastro.'<br/>';
*/

$rsCadastro = db_query($sSqlCadastro);
$registros  = pg_num_rows($rsCadastro);

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsCadastro,$cont);   
   if (strtolower($nome) == strtolower($mo01_nome)) {
      $oRetorno->iStatus  = 2;
      $oRetorno->sMessage = "Candidato ja tem cadastro para este responsavel!"; 
      break;
   }
}

echo (json_encode($oRetorno));

?>
