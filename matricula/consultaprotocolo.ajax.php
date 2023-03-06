<?php 
include('config.php');
die_alert_se_consulta_fechada();

header('Cache-Control: no-cache');
header('Content-type: application/json; charset="utf-8"',true);
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");
require_once('lib.php');

$cpfresp = preg_replace('/[^0-9]/', '', $_REQUEST['cpfconsulta']);
if(empty($cpfresp)) die('dado invalido');

$arr_fases_consulta = "17,18"; //implode("','", get_arr_fases_consulta());

$sSqlCadastro = <<<EOF
SELECT *
  FROM plugins.mobase
 WHERE mo01_fase IN ($arr_fases_consulta)
   AND mo01_cpfresp = '$cpfresp'
EOF;

$rsCadastro = db_query($sSqlCadastro);
$registros  = pg_num_rows($rsCadastro);
$consulta   = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsCadastro,$cont);   
   $mo01_nome = utf8_encode($mo01_nome);
   $consulta[] = array('mo01_codigo' => $mo01_codigo, 'mo01_nome' => $mo01_nome);
}

echo (json_encode($consulta));
