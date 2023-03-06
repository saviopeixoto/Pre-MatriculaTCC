<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/xml; charset="utf-8"', true );
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$sSqlParentesco  = "select * from tipofamiliar order by z14_sequencial";
$rsParentesco    = db_query($sSqlParentesco);
$registros   = pg_num_rows($rsParentesco);
$cidades = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsParentesco,$cont);	
   $z14_descricao = utf8_encode($z14_descricao);
   $cidades[] = array('z14_sequencial' => $z14_sequencial,'z14_descricao' => $z14_descricao);
}

echo (json_encode($cidades));