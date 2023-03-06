<?php
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$sSqlMobase = "select * from plugins.mobase order by mo01_codigo ";
$rsMobase   = db_query($sSqlMobase);

for($cont=0;$cont<pg_num_rows($rsMobase);$cont++) {
   $oMobase = db_utils::fieldsMemory($rsMobase,$cont);

   $sSqlEscolaBase = "select * from plugins.baseescola where mo02_base = ".$oMobase->mo01_codigo." order by mo02_codigo";
   echo $sSqlEscolaBase.'<br/>';
   $rsEscolaBase   = db_query($sSqlEscolaBase);

   $seq = 0;
   for($conta=0;$conta<pg_num_rows($rsEscolaBase);$conta++) {
      $oEscolaBase = db_utils::fieldsMemory($rsEscolaBase,$conta);

   	  ++$seq;
   	  $sSqlEscolaBaseUpdate = "update plugins.baseescola set mo02_seq = ".$seq." where mo02_codigo=".$oEscolaBase->mo02_codigo;
   	  $rsEscolaBaseUpdate   = db_query($sSqlEscolaBaseUpdate);
   } 
}
