<?php
header('Cache-Control: no-cache');
header('Content-type: application/json; charset="utf-8"',true);
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$sSqlEstadoCivil = "select mo07_codigo, mo07_descr from plugins.estcivil order by mo07_codigo";
$rsEstadoCivil   = db_query($sSqlEstadoCivil);
$registros       = pg_num_rows($rsEstadoCivil);
$estadoscivil    = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsEstadoCivil,$cont);	
   $mo07_descr = utf8_encode($mo07_descr);
   $estadoscivil[] = array('mo07_codigo' => $mo07_codigo,'mo07_descr' => $mo07_descr);
}

echo (json_encode($estadoscivil));

?>