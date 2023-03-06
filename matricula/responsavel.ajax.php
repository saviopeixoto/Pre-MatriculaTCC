<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/json; charset="utf-8"', true );
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$sSqlBairros = "select mo06_codigo, mo06_descr from plugins.tiporesp order by mo06_codigo";
//echo $sSqlBairros.'<br/>';
$rsBairros = db_query($sSqlBairros);
$registros  = pg_num_rows($rsBairros);
$cidades = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsBairros,$cont);	
   $mo06_descr = utf8_encode($mo06_descr);
   $cidades[] = array('mo06_codigo' => $mo06_codigo,'mo06_descr' => $mo06_descr);
}

echo (json_encode($cidades));
