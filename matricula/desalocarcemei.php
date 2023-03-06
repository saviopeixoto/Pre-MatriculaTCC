<?php	
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("libs/db_funcoes.php");
require_once("libs/exceptions/DBException.php");
require_once("std/db_stdClass.php");

echo "Aguarde Desalocando<br/>";

$sSqlMobase  = "select * from plugins.alocados             								  ";
$sSqlMobase .= "  inner join plugins.mobase on mobase.mo01_codigo = alocados.mo13_base    ";
$sSqlMobase .= "where mobase.mo01_remaneja = 0 and alocados.mo13_escola =96			  ";
$sSqlMobase .= "  and mobase.mo01_tipo = 'P2020'                                          "; 
$sSqlMobase .= "order by mobase.mo01_codigo       										  ";

$rsMobase  = db_query($sSqlMobase);
$regmobase = pg_num_rows($rsMobase);

echo "Total: ".$regmobase.'<br/>';

$iContador = 1; 
for($conta=0;$conta<$regmobase;$conta++) {
   db_fieldsmemory($rsMobase,$conta);
  
   echo "Candidato: ".$mo01_codigo.' - '.$mo01_nome.'<br/>';
   $sSqlDelete  = "delete from plugins.alocados where mo13_codigo = ".$mo13_codigo;
   $rsDelete    = db_query($sSqlDelete);
   $iContador++;
}

echo "Total Desalocados: ".($iContador-1).'<br/>';
echo "Fim Processo de Desalocar!!!";
