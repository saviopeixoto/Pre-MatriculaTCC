<?php
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("libs/db_funcoes.php");
require_once("libs/JSON.php");  
require_once("libs/exceptions/DBException.php");
require_once("std/db_stdClass.php");
require_once('classes/db_mobase_classe.php');
require_once('classes/db_escbase_classe.php');
require_once('classes/db_alocados_classe.php');

function caixaAlta($string) {
   $string = strtoupper($string);    
   $string = str_replace("â","A",$string);
   $string = str_replace("á","A",$string);
   $string = str_replace("ã","A",$string);
   $string = str_replace("à","A",$string);
   $string = str_replace("ä","A",$string);
   $string = str_replace("ê","E",$string);
   $string = str_replace("é","E",$string);
   $string = str_replace("è","E",$string);
   $string = str_replace("ë","E",$string);
   $string = str_replace("Ì","I",$string);
   $string = str_replace("í","I",$string);
   $string = str_replace("ì","I",$string);
   $string = str_replace("î","I",$string);
   $string = str_replace("ï","I",$string);
   $string = str_replace("ô","O",$string);
   $string = str_replace("õ","O",$string);
   $string = str_replace("ó","O",$string);
   $string = str_replace("ò","O",$string);
   $string = str_replace("ö","O",$string);
   $string = str_replace("ú","U",$string);
   $string = str_replace("ù","U",$string);
   $string = str_replace("ũ","U",$string);
   $string = str_replace("û","U",$string);
   $string = str_replace("ü","U",$string);
   $string = str_replace("ç","C",$string);
   $string = str_replace("Ç","C",$string);
   return ($string);
}

$oJson                    = new services_json();
$oRetorno                 = new stdClass();
$oRetorno->iStatus        = 1;
$oRetorno->sMessage       = '';
$oRetorno->mo01_codigo    = '';
$oRetorno->mo01_protocol  = '';
$oRetorno->mo01_nome      = '';
$oRetorno->mo01_nomeresp  = '';
$oRetorno->mo01_escolai   = '';  
$oRetorno->mo01_escolaii  = '';
$oRetorno->mo01_escolaiii = '';
$oRetorno->mo01_escola    = '';

$clmobase = new cl_mobase;
$clEscolaBase = new cl_escbase;
$clalocados = new cl_alocados;

$mo01_cpfresp  = pg_escape_string($_REQUEST['mo01_cpfresp']);
$mo01_protocol = pg_escape_string($_REQUEST['mo01_protocol']);

$mo01_cpfresp  = str_replace('.', '', $mo01_cpfresp);
$mo01_cpfresp  = str_replace('-', '', $mo01_cpfresp);

//$mo01_cpfresp  = '12942966773';
//$mo01_protocol = '823122017';

$rsmatricula = $clmobase->sql_record($clmobase->sql_query_consulta("","*","","mo01_cpfresp='".$mo01_cpfresp."' and mo01_protocol='".$mo01_protocol."'"));
$numregalu = $clmobase->numrows; 

if ($numregalu>0) {
   db_fieldsmemory($rsmatricula,0);
   $rsalocados = $clalocados->sql_record($clalocados->sql_query_dadosaluno($mo01_codigo,"*","",""));
   $numregalo = $clalocados->numrows;

   if ($numregalo>0) {
      db_fieldsmemory($rsalocados,0);
      $dt_nasc = explode('-',$mo01_dtnasc);
      $mo01_dtnasc = $dt_nasc[2].'/'.$dt_nasc[1].'/'.$dt_nasc[0];
      $oRetorno->mo01_protocol = $mo01_protocol;
      $oRetorno->mo01_nome     = caixaAlta($mo01_nome);
      $oRetorno->mo01_nomeresp = caixaAlta($mo01_nomeresp);
      $oRetorno->mo01_cpfresp  = $mo01_cpfresp;
      $oRetorno->mo01_dtnasc   = $mo01_dtnasc;
      $oRetorno->mo01_idade    = $mo01_idade;
      $oRetorno->mo01_escola   = utf8_encode($ed18_c_nome);
      $oRetorno->sMessage      = '';
   } else {
      $aEscola = array();
      $regmatri = $clmobase->numrows;
      $oRetorno->iStatus = 2;
      for($cont=0;$cont<$regmatri;$cont++) {
         db_fieldsmemory($rsmatricula,$cont);
         $dt_nasc = explode('-',$mo01_dtnasc);
         $mo01_dtnasc = $dt_nasc[2].'/'.$dt_nasc[1].'/'.$dt_nasc[0];
         $mo01_telcel = "(". substr($mo01_telcel,0,2). ")". " ".substr($mo01_telcel,2,4)."-".substr($mo01_telcel,6,4);
         $oRetorno->mo01_protocol  = $mo01_protocol;
         $oRetorno->mo01_nome      = caixaAlta($mo01_nome);
         $oRetorno->mo01_nomeresp  = caixaAlta($mo01_nomeresp);
         $oRetorno->mo01_dtnasc    = $mo01_dtnasc;
         $oRetorno->mo01_telcel    = $mo01_telcel;
         $oRetorno->mo01_cpfresp   = $mo01_cpfresp;
         $aEscola[$cont]           = utf8_encode($ed18_c_nome);
      }
      $oRetorno->mo01_escolai   = $aEscola[0];
      $oRetorno->mo01_escolaii  = $aEscola[1];
      $oRetorno->mo01_escolaiii = $aEscola[2];
   }
} else {
   $oRetorno->iStatus  = 3;
   $oRetorno->sMessage = "CPF ou Protocolo invalido!"; 
}

echo $oJson->encode($oRetorno);

?>
