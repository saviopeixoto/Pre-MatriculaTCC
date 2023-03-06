<?php	
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("libs/db_funcoes.php");
require_once("libs/exceptions/DBException.php");
require_once("std/db_stdClass.php");
 

$sSqlMobase  = "select * from plugins.mobase          ";
$sSqlMobase .= " where mo01_fase = '9'  "; 
$sSqlMobase .= "   order by mobase.mo01_codigo        ";
//echo $sSqlMobase.'<br/>';
 
echo "Agurde Gerando Sequencia";

$rsMobase  = db_query($sSqlMobase);
$regmobase = pg_num_rows($rsMobase);
 
for($cont=0;$cont<$regmobase;$cont++) {
   db_fieldsmemory($rsMobase,$cont);
    
   echo $mo01_nome.'<br/>';   
 
   $sSqlBaseEscola  = "select * from plugins.baseescola  ";
   $sSqlBaseEscola .= " where baseescola.mo02_base = ".$mo01_codigo;
   echo $sSqlBaseEscola.'<br/>';
   $rsBaseEscola  = db_query($sSqlBaseEscola);
   $regBaseEscola = pg_num_rows($rsBaseEscola);
 
   $mo01_seq = 1;
   for($iConta=0;$iConta<$regBaseEscola;$iConta++) {
      db_fieldsmemory($rsBaseEscola,$iConta);
 
      $sSqlUpdate  = "update plugins.baseescola set mo02_seq = ".$mo01_seq;
      $sSqlUpdate .= "  where mo02_codigo = ".$mo02_codigo;
      echo $sSqlUpdate.'<br/>';   
      $rsUpdate    = db_query($sSqlUpdate);

      if (!$rsUpdate) {
         $error = pg_last_error();
         echo $error.": ".$sqlAtividades.'<br/>';
      }
      $mo01_seq++;
   }
}

echo "Fim Geração da Sequencia";

