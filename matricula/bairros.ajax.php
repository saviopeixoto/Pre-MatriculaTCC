<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/json; charset="utf-8"', true );
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$sSqlBairros = "select j13_codi, j13_descr from bairro order by j13_codi";
$rsBairros = db_query($sSqlBairros);
$registros = pg_num_rows($rsBairros);
$aBairros  = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsBairros,$cont);	
   if (is_numeric(trim($j13_descr))) {
      $sSqlBairro = "select j13_descr from bairro where j13_codi = ".$j13_descr;
      $rsBairro   = db_query($sSqlBairro);
      db_fieldsmemory($rsBairro,0);	
   }
   $j13_descr = utf8_encode($j13_descr);
   $aBairros[] = array('j13_codi' => $j13_codi,'j13_descr' => $j13_descr);
}

echo (json_encode($aBairros));