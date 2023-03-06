<?php
header( 'Cache-Control: no-cache' );
header('Content-type: application/json; charset="utf-8"', true);
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$sSqlEstado = "select * from db_uf order by db12_codigo";
$rsEstado   = db_query($sSqlEstado);

$rsEstado = db_query($sSqlEstado);
$registros = pg_num_rows($rsEstado);
$estados   = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsEstado,$cont);	
   $db12_nome = utf8_encode($db12_nome);
   $estados[] = array('db12_uf' => $db12_uf, 'db12_nome' => $db12_nome);
}
 
$oEstados = json_encode($estados);
echo $oEstados;
?>