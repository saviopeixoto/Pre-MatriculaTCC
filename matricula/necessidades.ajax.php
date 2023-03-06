<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/json; charset="utf-8"', true );
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$sSqlNecessidade = "select * from necessidade WHERE ed48_i_codigo != 100 order by ed48_i_codigo";  //rodrigodevolder@gmail.com
$rsNecessidade   = db_query($sSqlNecessidade);
$registros   = pg_num_rows($rsNecessidade);
$cidades = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsNecessidade,$cont);	
   $ed48_c_descr = utf8_encode($ed48_c_descr);
   $cidades[] = array('ed48_i_codigo' => $ed48_i_codigo,'ed48_c_descr' => $ed48_c_descr);
}

echo (json_encode($cidades));
