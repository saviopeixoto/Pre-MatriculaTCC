<?php
header('Cache-Control: no-cache');
//header('Content-type: application/json; charset="utf-8"',true);
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");
require_once("libs/JSON.php");  

$oJson             = new services_json();
$oRetorno          = new stdClass();
$oRetorno->iStatus = 1;

$mo01_codigo = pg_escape_string($_REQUEST['mo01_codigo']);
$sSqlMobase  = "select * from plugins.mobase where mo01_fase = '18' and mo01_codigo = ".$mo01_codigo; //saviosdevweb@gmail.com 10/2022
$rsMobase = db_query($sSqlMobase);
$registros  = pg_num_rows($rsMobase);

if ($registros>0) {
   db_fieldsmemory($rsMobase,0);

   $oCandidato        				      = new stdClass();
   $oCandidato->mo01_codigo 		      = $mo01_codigo;
   $oCandidato->mo01_nome   		      = $mo01_nome;
   $oCandidato->mo01_dtnasc 		      = implode('/',array_reverse(explode('-',$mo01_dtnasc)));
   $oCandidato->mo01_idade  		      = $mo01_idade;
   $oCandidato->mo01_idadecorte 	      = $mo01_idadecorte;
   $oCandidato->mo01_sexo   		      = $mo01_sexo;
   $oCandidato->mo01_cor    		      = $mo01_cor;
   $oCandidato->mo01_estciv 		      = $mo01_estciv;
   $oCandidato->mo01_nacion 		      = $mo01_nacion;
   $oCandidato->mo01_ufnasc 		      = $mo01_ufnasc;
   $oCandidato->mo01_munnasc 		      = $mo01_munnasc;
   $oCandidato->mo01_mae     		      = $mo01_mae;
   $oCandidato->mo01_pai     		      = $mo01_pai;
   $oCandidato->mo01_tiporesp          = $mo01_tiporesp;
   $oCandidato->mo01_nomeresp          = $mo01_nomeresp;
   $oCandidato->mo01_cpfresp           = $mo01_cpfresp;
   $oCandidato->mo01_cartaosus         = ($mo01_cartaosus=='0'?'2':$mo01_cartaosus);
   $oCandidato->mo01_necess            = $mo01_necess;
   $oCandidato->mo01_necesstipo        = $mo01_necesstipo;
   $oCandidato->mo01_bolsafamilia      = ($mo01_bolsafamilia=='t'?'1':'2');
   $oCandidato->mo01_nis               = ($mo01_nis=="0"?'':$mo01_nis);
   $oCandidato->mo01_nivel             = $mo01_nivel;
   $oCandidato->mo01_redeorigem   	   = $mo01_redeorigem;
   $oCandidato->mo01_ufredeorigem 	   = $mo01_ufredeorigem;
   $oCandidato->mo01_munredeorigem     = $mo01_munredeorigem;
   $oCandidato->mo01_escredeorigem     = $mo01_escredeorigem;
   $oCandidato->mo01_ctbescredeorigem  = $mo01_ctbescredeorigem;
   $oCandidato->mo01_certidaotipo      = $mo01_certidaotipo;
   $oCandidato->mo01_certidaomod 	   = $mo01_certidaomod;
   $oCandidato->mo01_certidaolivro     = $mo01_certidaolivro;
   $oCandidato->mo01_certidaofolha     = $mo01_certidaofolha;
   $oCandidato->mo01_certidaonum       = $mo01_certidaonum;
   $oCandidato->mo01_certidaomatricula = $mo01_certidaomatricula;
   $oCandidato->mo01_ufcartcert 	      = $mo01_ufcartcert;
   $oCandidato->mo01_muncartcert 	   = $mo01_muncartcert;
   $oCandidato->mo01_cpf 			      = $mo01_cpf;
   $oCandidato->mo01_tipoend 		      = $mo01_tipoender;
   $oCandidato->mo01_ender 			   = $mo01_ender;
   $oCandidato->mo01_numero 		      = $mo01_numero;
   $oCandidato->mo01_bairro 		      = $mo01_bairro;
   $oCandidato->mo01_cep 			      = $mo01_cep;
   $oCandidato->mo01_uf  			      = $mo01_uf;
   $oCandidato->mo01_municip 		      = $mo01_municip;
   $oCandidato->mo01_telef 			   = $mo01_telef;
   if ($mo01_telef != '') {
      $oCandidato->mo01_telef        = '('.substr($mo01_telef,0,2).') '.substr($mo01_telef,2,5).'-'.substr($mo01_telef,7,4);
   } else {
      $oCandidato->mo01_telef          = $mo01_telef;
   }
   if ($mo01_telcel != '') {
      $oCandidato->mo01_telcel        = '('.substr($mo01_telcel,0,2).') '.substr($mo01_telcel,2,5).'-'.substr($mo01_telcel,7,4);
   } else {
      $oCandidato->mo01_telcel         = $mo01_telcel;
   }

   if ($mo01_telcom != '') {
      $oCandidato->mo01_telcom        = '('.substr($mo01_telcom,0,2).') '.substr($mo01_telcom,2,5).'-'.substr($mo01_telcom,7,4);
   } else {
      $oCandidato->mo01_telcom         = $mo01_telcom;
   }
   $oCandidato->mo01_email 			   = $mo01_email;
   $oCandidato->mo01_tiposangue 	      = $mo01_tiposangue;
   $oCandidato->mo01_fatorrh 		      = $mo01_fatorrh;

   $sSqlBaseEscola = "select * from plugins.baseescola where mo02_base = ".$mo01_codigo." order by mo02_seq";    
   $rsBaseEscola   = db_query($sSqlBaseEscola);
   $regBaseEscola  = pg_num_rows($rsBaseEscola);

   $aBaseEscola   = array();
   for($iCont=0;$iCont<$regBaseEscola;$iCont++) {
      db_fieldsmemory($rsBaseEscola,$iCont);   
      $aBaseEscola[] = array('mo02_escola' => $mo02_escola, 'mo02_parent' => $mo02_parent, 'mo02_etapa' => $mo02_etapa);
   }

   $oRetorno->oCandidato  = $oCandidato;
   $oRetorno->aBaseEscola = $aBaseEscola;

   echo $oJson->encode($oRetorno);
}
