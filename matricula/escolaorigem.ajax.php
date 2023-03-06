<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/json; charset="utf-8"', true );
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$sSqlEscolaOrigem  = "select ed18_i_codigo, ed18_c_nome from escola order by ed18_c_nome; ";
//die($sSqlEscolaOrigem);

$rsEscolaOrigem = db_query($sSqlEscolaOrigem);
$registros = pg_num_rows($rsEscolaOrigem);
$escolaorigem   = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsEscolaOrigem,$cont);	
   $ed18_c_nome = utf8_encode($ed18_c_nome);
   $escolaorigem[] = array('ed18_i_codigo' => $ed18_i_codigo, 'ed18_c_nome' => $ed18_c_nome);
}

echo (json_encode($escolaorigem));

?>
