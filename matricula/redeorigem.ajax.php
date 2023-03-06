<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/json; charset="ISO-8859-1"', true );
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$sSqlRedeOrigem = "select * from plugins.redeorigem order by mo05_codigo";
$rsRedeOrigem = db_query($sSqlRedeOrigem);
$registros    = pg_num_rows($rsRedeOrigem);
$redeorigem   = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsRedeOrigem,$cont);	
   $redeorigem[] = array('mo05_codigo' => $mo05_codigo, 'mo05_descr' => $mo05_descr);
}

echo (json_encode($redeorigem));

?>