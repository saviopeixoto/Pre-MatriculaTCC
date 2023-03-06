<?php

require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("libs/db_funcoes.php");
require_once("std/db_stdClass.php");
require_once("libs/JSON.php");  
require_once("classes/db_ruas_classe.php");
require_once("classes/db_ruasbairro_classe.php");
require_once("classes/db_ruascep_classe.php");
require_once("classes/db_bairro_classe.php");
require_once("classes/db_ruastipo_classe.php");

$clruas       = new cl_ruas;
$clruascep    = new cl_ruascep;
$clruasbairro = new cl_ruasbairro;
$clbairro     = new cl_bairro;
$clruastipo   = new cl_ruastipo;

$oJson             = new services_json();
$oRetorno          = new stdClass();
$oRetorno->iStatus = 1;

$bEndereco = false;
$bBairro   = false;
$bCidade   = false;
$bEstado   = false;
$bTipoEndereco = false;

$j13_codbai    = 0;
$j13_nombai    = "";
$j14_codlogra  = 0;
$j14_nomlogra  = "";
$j88_codtipo   = 0;
$j88_nomtipo   = "";

$cod_cep    = pg_escape_string($_REQUEST['cod_cep']);
$cod_logra  = pg_escape_string($_REQUEST['cod_rua']);
$cod_bairro = pg_escape_string($_REQUEST['cod_bairro']);
$cod_cidade = pg_escape_string($_REQUEST['cod_cidade']);
$cod_estado = pg_escape_string($_REQUEST['cod_uf']);

/*
$cod_cep    = "24846075";
$cod_logra  = "Estrada da Cachoeira";
$cod_bairro = "Centro (Pachecos)";
$cod_cidade = "Itaboraí";
$cod_estado = "RJ";
*/

$logradouro = explode(" ",$cod_logra);
$cod_tipo   = $logradouro[0];
$cod_tipo   = trim($cod_tipo);

$cod_logra = "";
for($cont=1;$cont<count($logradouro);$cont++) {
   $cod_logra .= $logradouro[$cont]." ";
}
$cod_logra = trim($cod_logra);

$cod_tipo = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c C"),$cod_tipo);
 
$cod_logra = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/" ),explode(" ","a A e E i I o O u U n N c C"),$cod_logra);

$cod_bairro = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/" ),explode(" ","a A e E i I o O u U n N c C"),
   $cod_bairro);

$cod_cidade = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c C"),
   $cod_cidade);

$cod_estado = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/" ),explode(" ","a A e E i I o O u U n N c C"),
   $cod_estado);

$cod_tipo   = strtoupper($cod_tipo);
$cod_logra  = strtoupper($cod_logra);
$cod_bairro = strtoupper($cod_bairro); 
$cod_cidade = strtoupper($cod_cidade);
$cod_estado = strtoupper($cod_estado);

$sSqlTipoEnd = "select j88_codigo, j88_descricao from ruastipo where trim(j88_descricao) = '".$cod_tipo."'";
$rsTipoEnd   = db_query($sSqlTipoEnd);
$regtipo     = pg_num_rows($rsTipoEnd);

if ($regtipo>0) {
   db_fieldsmemory($rsTipoEnd,0);      
   $j88_codtipo = $j88_codigo;
   $j88_nomtipo = $j88_descricao;
} else {
   $bTipoEndereco = true;
}

$sSqlEndereco = "select j14_codigo from ruas where trim(j14_nome) = '".$cod_logra."'";
$rsEndereco = db_query($sSqlEndereco); 
$regend     = pg_num_rows($rsEndereco);

if ($regend > 0) {
   db_fieldsmemory($rsEndereco,0);
   $j14_codlogra = $j14_codigo;
} else {
   $bEndereco = true;
}  

$sSqlBairro = "select j13_codi,j13_descr from bairro where trim(j13_descr) = '".$cod_bairro."'";
$rsBairro   = db_query($sSqlBairro);
$regbairro  = pg_num_rows($rsBairro);

if ($regbairro > 0) {
   db_fieldsmemory($rsBairro,0);
   $j13_codbai = $j13_codi;
   $j13_nombai = $j13_descr;
} else {
   $bBairro = true;
}

$sSqlCidade = "select cp05_codlocalidades,cp05_localidades from ceplocalidades where cp05_tipo='M' and 
               trim(cp05_localidades)='".$cod_cidade."'";
$rsCidade   = db_query($sSqlCidade);
$regcidade  = pg_num_rows($rsCidade);

if ($regcidade > 0) {
   db_fieldsmemory($rsCidade,0);
} else {
   $bCidade = true;
}

$sSqlEstado = "select db12_uf, db12_nome from db_uf where db12_uf = '".$cod_estado."'";
$rsEstado   = db_query($sSqlEstado);
$regestado  = pg_num_rows($rsEstado);

if ($regestado > 0) {
   db_fieldsmemory($rsEstado,0);
} else {
   $bEstado = true;
}

if (!$bEndereco && !$bBairro) {
   $oRetorno->j14_codigo   = $j14_codlogra;
   $oRetorno->j14_nome     = $cod_logra;
   $oRetorno->j88_codigo   = $j88_codtipo;
   $oRetorno->j88_descr    = $j88_nomtipo;
   $oRetorno->j13_codi     = $j13_codbai;
   $oRetorno->j13_descr    = $j13_nombai;
   $oRetorno->cp05_muncod  = $cp05_codlocalidades;
   $oRetorno->cp05_munnome = $cp05_localidades;
   $oRetorno->db12_uf      = $db12_uf;
   $oRetorno->db12_nome    = $db12_nome;
} else {
   $sqlerro = false;
   db_inicio_transacao();

   if ($bTipoEndereco) {
      $clruastipo->j88_sigla     = substr($cod_tipo,0,3);
      $clruastipo->j88_descricao = $cod_tipo;
      $clruastipo->incluir(null);    

      if ($clruastipo->erro_status == 0) {
         $sqlerro  = true;
         $erro_msg = $clruastipo->erro_msg;
      }
      $j88_codtipo = $clruastipo->j88_codigo;     
      $j88_nomtipo = $clruastipo->j88_descricao;
   }

   if ($bBairro) {
      $clbairro->j13_descr = $cod_bairro;
      $clbairro->j13_rural = 'FALSE';  
      $clbairro->incluir(null);    

      if ($clbairro->erro_status == 0) {
         $sqlerro  = true;
         $erro_msg = $clbairro->erro_msg;
      }

      $j13_codbai = $clbairro->j13_codi;
      $j13_nombai = $clbairro->j13_descr;
   }

   if ($bEndereco) { 
      $clruas->j14_nome = $cod_logra;  
      $clruas->j14_tipo = $j88_codtipo;  
      $clruas->j14_rural = 'FALSE';  
      $clruas->j14_lei = null;
      $clruas->j14_dtlei = null;
      $clruas->j14_obs = $cod_tipo;
      $clruas->incluir(null);

      if ($clruas->erro_status == 0) {
         $sqlerro = true;
         $erro_msg = $clruas->erro_msg;
      }
      $j14_codlogra = $clruas->j14_codigo;
      $j14_nomlogra = $clruas->j14_nome;
      
   }      

   if (isset($j13_codi) and $j13_codi != '') {
      $rsRuasBairro = $clruasbairro->sql_record($clruasbairro->sql_query("","*","","j16_bairro = ".$j13_codi));
      $numreg = $clruasbairro->numrows;

      if ($numreg<=0) {
         $clruasbairro->j16_bairro = $j13_codbai;
         $clruasbairro->j16_lograd = $j14_codlogra;
         $clruasbairro->incluir(null);
    
         if ($clruasbairro->erro_status == 0) {
            $sqlerro  = true;
            $erro_msg = $clruasbairro->erro_msg;
         }
      }
   }

   if (isset($cod_cep) and $cod_cep != '') {
      $rsRuasCep = $clruascep->sql_record($clruascep->sql_query ("","","*","","j29_cep = '".$cod_cep."'"));
      $numregcep = $clruascep->numrows;

      if ($numregcep<=0) {
         $clruascep->j29_cep    = $cod_cep;
         $clruascep->j29_inicio = '0';
         $clruascep->j29_final  = '0';
         $clruascep->incluir($j14_codlogra,'0');
    
         if ($clruascep->erro_status == 0) {
            $sqlerro  = true;
            $erro_msg = $clruascep->erro_msg;
         }
      }   
   }

   if ($sqlerro) {
      $oRetorno->iStatus = 2;
      $oRetorno->sMessage = $erro_msg;
   }
   
   db_fim_transacao($sqlerro);   

   $oRetorno->j14_codigo   = $j14_codlogra;
   $oRetorno->j14_nome     = $cod_logra;
   $oRetorno->j88_codigo   = $j88_codtipo;
   $oRetorno->j88_descr    = $j88_nomtipo; 
   $oRetorno->j13_codi     = $j13_codbai;
   $oRetorno->j13_descr    = $j13_nombai;
   $oRetorno->cp05_muncod  = $cp05_codlocalidades;
   $oRetorno->cp05_munnome = $cp05_localidades;
   $oRetorno->db12_uf      = $db12_uf;
   $oRetorno->db12_nome    = $db12_nome; 
}

echo $oJson->encode($oRetorno);

?>
