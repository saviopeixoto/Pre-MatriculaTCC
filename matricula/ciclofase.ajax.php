<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/xml; charset="utf-8"', true );
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$cod_nivel  = pg_escape_string($_REQUEST['cod_nivel']);
$cod_nivel  = 14;

$sSqlFase = "select ciclos.mo09_codigo, ciclos.mo09_descricao from plugins.ciclosensino
               inner join plugins.ciclos on ciclos.mo09_codigo = ciclosensino.mo14_ciclo
               inner join ensino on ensino.ed10_i_codigo = ciclosensino.mo14_ensino
             where plugins.ciclosensino.mo14_ensino = '" . $cod_nivel . "' order by ciclos.mo09_codigo;";
//             where mo14_ensino = '".$cod_nivel."' order by mo04_codigo";

$rsFase   = db_query($sSqlFase);
$registros   = pg_num_rows($rsFase);
$fases = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsFase,$cont);	
   $fases[] = array('mo04_codigo' => $mo04_codigo, 'mo04_desc' => $mo04_desc);
}

echo (json_encode($fases));