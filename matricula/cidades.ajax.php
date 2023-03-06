<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/json; charset="utf-8"', true );
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$cod_uf  = pg_escape_string($_REQUEST['cod_uf']);
//$cod_uf  = 'RJ';

$sSqlCidades = "select cp05_codlocalidades, cp05_localidades from ceplocalidades where cp05_tipo = 'M' and cp05_sigla = '".$cod_uf."' order by cp05_localidades";

//echo $sSqlCidades;
$rsCidades   = db_query($sSqlCidades);
$registros   = pg_num_rows($rsCidades);
$cidades = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsCidades,$cont);	
   $cp05_localidades = utf8_encode($cp05_localidades);
   $cidades[] = array('cp05_codlocalidades' => $cp05_codlocalidades,'cp05_localidades' => $cp05_localidades);
}

echo (json_encode($cidades));