<?php
header('Cache-Control: no-cache');
header('Content-type: application/json; charset="utf-8"',true);
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$cpfresp        = pg_escape_string($_REQUEST['cpfconsulta']);
$datanascimento = pg_escape_string($_REQUEST['dtnas']);

$cpfresp = str_replace('.', '', $cpfresp);
$cpfresp = str_replace('-', '', $cpfresp);
$datanascimento = implode('-', array_reverse(explode("/", $datanascimento)));

$sSqlMobase  = "select * from plugins.mobase where mo01_fase = '9' and mo01_cpfresp = '".$cpfresp."'";
$rsMobase    = db_query($sSqlMobase);
$registro    = pg_num_rows($rsMobase);

$flag = false;
for($cont=0;$cont<$registro;$cont++) {
   db_fieldsmemory($rsMobase,$cont); 
   if (strtotime($datanascimento) == strtotime($mo01_dtnasc)) {
   	  $flag = true;
   	  break;
   }	
}   	

$consulta = array();
if ($flag) {
   $sSqlCadastro  = "select * from plugins.mobase where mo01_fase = '9' and mo01_cpfresp = '".$cpfresp."'";    
   $rsCadastro = db_query($sSqlCadastro);
   $registros  = pg_num_rows($rsCadastro);

   for($cont=0;$cont<$registros;$cont++) {   	
      db_fieldsmemory($rsCadastro,$cont); 
      $mo01_nome = utf8_encode($mo01_nome);
      $consulta[] = array('mo01_codigo' => $mo01_codigo, 'mo01_nome' => $mo01_nome);
   }
} else {
   $consulta[] = array('mo01_codigo' => 0, 'mo01_nome' => 'Data Nascimento Invalida!');
}

echo (json_encode($consulta));
