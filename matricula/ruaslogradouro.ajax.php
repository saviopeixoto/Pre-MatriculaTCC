<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/json; charset="utf-8"', true );
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

if (isset($_REQUEST['cod_rua'])) {
   $cod_logra  = pg_escape_string($_REQUEST['cod_rua']);
   $sSqlEndereco = "select j14_codigo, j14_nome from ruas where j14_codigo = ".$cod_logra;
} else {
   $sSqlEndereco = "select j14_codigo, j14_nome from ruas order by j14_codigo";
}

$rsEndereco   = db_query($sSqlEndereco); 
$registros    = pg_num_rows($rsEndereco);
$aEndereco    = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsEndereco,$cont);  
   $j14_nome = utf8_encode($j14_nome);
   if (is_numeric(trim($j14_nome))) {
      $sSqlLogradouro = "select j14_nome from ruas where j14_codigo = ".$j14_nome;
      $rsLogradouro   = db_query($sSqlLogradouro);
      db_fieldsmemory($rsLogradouro,0);	
   }
   $j14_nome = utf8_encode($j14_nome);
   $aEndereco[] = array('j14_codigo' => $j14_codigo,'j14_nome' => $j14_nome);
}

echo (json_encode($aEndereco));

?>
