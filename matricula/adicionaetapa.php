<?php	
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("libs/db_funcoes.php");
require_once("libs/exceptions/DBException.php");
require_once("std/db_stdClass.php");
 
//$sSqlMobase .= " and mobase.mo01_tipo = 'P2020'  ";

$sSqlMobase  = "select * from plugins.mobase      ";
$sSqlMobase .= "where mo01_fase = '9'  ";
$sSqlMobase .= "order by mobase.mo01_codigo       ";
//echo $sSqlMobase.'<br/>';
 
echo "Aguarde Gerando Sequencia";

$rsMobase  = db_query($sSqlMobase);
$regmobase = pg_num_rows($rsMobase);
 
echo "<br/>".$regmobase;

for($cont=0;$cont<$regmobase;$cont++) {
   db_fieldsmemory($rsMobase,$cont);
 
   $sSqlBaseEscola  = "select * from plugins.baseescola  ";
   $sSqlBaseEscola .= "where baseescola.mo02_base = ".$mo01_codigo;
   echo $sSqlBaseEscola.'<br/>';
   $rsBaseEscola  = db_query($sSqlBaseEscola);
   $regBaseEscola = pg_num_rows($rsBaseEscola);

   db_fieldsmemory($rsBaseEscola,1);
   $cod_etapa = $mo02_etapa;
 
   for($iConta=0;$iConta<$regBaseEscola;$iConta++) {
      db_fieldsmemory($rsBaseEscola,$iConta);

      if ($iConta == 0) {
         if ($mo02_etapa == 0) {
            $sSqlUpdate  = "update plugins.baseescola set mo02_etapa = ".$cod_etapa;
            $sSqlUpdate .= "  where mo02_codigo = ".$mo02_codigo;
            $rsUpdate    = db_query($sSqlUpdate);            
         }
      }
   }
}

echo "Fim Geração da Sequencia";
