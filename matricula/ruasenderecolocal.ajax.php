<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/json; charset="utf-8"', true );
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$cod_tipo  = pg_escape_string($_REQUEST['cod_tipo']);
//$cod_tipo  = 3;

$sSqlCidades = "select j14_codigo,j14_nome from ruas where j14_tipo = ".$cod_tipo;
//echo $sSqlCidades;
$rsCidades = db_query($sSqlCidades);
$registros = pg_num_rows($rsCidades);
$cidades = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsCidades,$cont);	
   $j14_nome = utf8_encode($j14_nome);
   $cidades[] = array('j14_codigo' => $j14_codigo,'j14_nome' => $j14_nome);
}

echo (json_encode($cidades));