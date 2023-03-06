<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/json; charset="utf-8"', true );
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$sSqlRuasTipo = "select j88_codigo, j88_descricao from ruastipo order by j88_codigo";

$rsRuasTipo = db_query($sSqlRuasTipo);
$registros  = pg_num_rows($rsRuasTipo);
$cidades = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsRuasTipo,$cont);	
   $j88_descricao = utf8_encode($j88_descricao);
   $cidades[] = array('j88_codigo' => $j88_codigo,'j88_descricao' => $j88_descricao);
}

echo (json_encode($cidades));