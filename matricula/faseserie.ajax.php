<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/json; charset="ISO-8859-1"', true );
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$cod_ciclo  = pg_escape_string($_REQUEST['cod_ciclo']);
//$cod_ciclo  = 1;

$sSqlSerie  = "select fase.mo04_codigo, fase.mo04_desc from plugins.fase                        ";
$sSqlSerie .= "  inner join plugins.ciclos on ciclos.mo09_codigo = fase.mo04_ciclo              "; 
$sSqlSerie .= "where plugins.fase.mo04_ciclo = '" . $cod_ciclo . "' order by fase.mo04_codigo;  ";

//die($sSqlSerie);

$rsSerie   = db_query($sSqlSerie);
$registros = pg_num_rows($rsSerie);
$series    = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsSerie,$cont);	
   $series[] = array('mo04_codigo' => $mo04_codigo, 'mo04_desc' => $mo04_desc);
}

echo (json_encode($series));