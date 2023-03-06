<?php
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("libs/db_funcoes.php");
require_once("libs/JSON.php");  
require_once("libs/exceptions/DBException.php");
require_once("std/db_stdClass.php");
require_once("classes/db_mobase_classe.php");
require_once("classes/db_baseescola_classe.php");
require_once("classes/db_baseescturno_classe.php");
require_once("classes/db_basefase_classe.php");
require_once("classes/db_ruas_classe.php");
require_once("classes/db_ruasbairro_classe.php");
require_once("classes/db_ruascep_classe.php");
require_once("classes/db_bairro_classe.php");
require_once("classes/db_basenecess_classe.php");

function caixaAlta($string) {
   $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
   $string = strtoupper($string);    
   return ($string);
}

$clmobase       = new cl_mobase;
$clEscolaBase   = new cl_baseescola;
$clEscBaseTurno = new cl_baseescturno;
$clEscolaFase   = new cl_basefase;
$clBaseNecess	= new cl_basenecess;

$clruas       = new cl_ruas;
$clruascep    = new cl_ruascep;
$clruasbairro = new cl_ruasbairro;
$clbairro     = new cl_bairro;

$oJson                  = new services_json();
$oRetorno               = new stdClass();
$oRetorno->iStatus      = 1;
$oRetorno->sMessage     = '';

$mo01_idadecorte    = $_POST['mo01_idadecorte'];
//if($mo01_idadecorte > 3) die('periodo invalido');

$mo01_codigo        = $_POST['mo01_codigo'];
$mo01_dtnasc        = $_POST['mo01_dtnasc'];
$mo01_idade         = $_POST['mo01_idade'];
$mo01_nome          = $_POST['mo01_nome'];
$mo01_sexo          = $_POST['mo01_sexo'];
$mo01_cor           = $_POST['mo01_cor'];
$mo01_estciv        = $_POST['mo01_estciv'];
$mo01_nacion        = $_POST['mo01_nacion'];
$mo01_ufnasc        = $_POST['mo01_ufnasc'];
$mo01_munnasc       = $_POST['mo01_munnasc'];
$mo01_mae           = $_POST['mo01_mae'];
$mo01_pai           = $_POST['mo01_pai'];
$mo01_tiporesp      = $_POST['mo01_tiporesp'];
$mo01_nomeresp      = $_POST['mo01_nomeresp'];
$mo01_cpfresp       = $_POST['mo01_cpfresp'];
$mo01_cartaosus     = ($_POST['mo01_cartaosus']==""?'0':$_POST['mo01_cartaosus']);
$mo01_necess        = ($_POST['mo01_necess']==""?'0':$_POST['mo01_necess']);
$mo01_necesstipo    = ($_POST['mo01_necesstipo']==""?'0':$_POST['mo01_necesstipo']);
$mo01_bolsafamilia  = $_POST['mo01_bolsafamilia'];
$mo01_nis           = ($_POST['mo01_nis']==""?'0':$_POST['mo01_nis']);
$mo01_nivel         = $_POST['mo01_nivel'];
$mo01_ciclo         = '0';
$mo01_etapai        = $_POST['mo01_etapai'];
$mo01_escolai       = $_POST['mo01_escolai'];
$mo01_irmaoi        = $_POST['mo01_irmaoi'];
$mo01_etapaii       = ($_POST['mo01_etapaii']==""?"0":$_POST['mo01_etapaii']);
$mo01_escolaii      = ($_POST['mo01_escolaii']==""?"":$_POST['mo01_escolaii']);
$mo01_irmaoii       = ($_POST['mo01_irmaoii']==""?"0":$_POST['mo01_irmaoii']);
$mo01_etapaiii      = ($_POST['mo01_etapaiii']==""?"0":$_POST['mo01_etapaiii']);
$mo01_escolaiii     = ($_POST['mo01_escolaiii']==""?"":$_POST['mo01_escolaiii']);
$mo01_irmaoiii      = ($_POST['mo01_irmaoiii']==""?"0":$_POST['mo01_irmaoiii']);
$mo01_redeorigem    = $_POST['mo01_redeorigem'];
$mo01_ufredeorigem  = $_POST['mo01_ufredeorigem'];
$mo01_munredeorigem = $_POST['mo01_munredeorigem'];
$mo01_escredeorigem = ($_POST['mo01_escredeorigem']==""?"":$_POST['mo01_escredeorigem']);
$mo01_ctbescredeorigem  = ($_POST['mo01_ctbescredeorigem']==""?"":$_POST['mo01_ctbescredeorigem']);
$mo01_certidaotipo  = ($_POST['mo01_certidaotipo']==""?"":$_POST['mo01_certidaotipo']);
$mo01_certidaomod   = ($_POST['mo01_certidaomod']=""?"":$_POST['mo01_certidaomod']);
$mo01_certidaolivro = ($_POST['mo01_certidaolivro']==""?"":$_POST['mo01_certidaolivro']);
$mo01_certidaofolha = ($_POST['mo01_certidaofolha']==""?"":$_POST['mo01_certidaofolha']);
$mo01_certidaonum   = ($_POST['mo01_certidaonum']==""?"":$_POST['mo01_certidaonum']);
$mo01_certidaomatricula = ($_POST['mo01_certidaomatricula']==""?"":$_POST['mo01_certidaomatricula']);
$mo01_ufcartcert    = ($_POST['mo01_ufcartcert']==""?"":$_POST['mo01_ufcartcert']);
$mo01_muncartcert   = ($_POST['mo01_muncartcert']==""?"":$_POST['mo01_muncartcert']);
$mo01_cpf           = ($_POST['mo01_cpf']==""?"":$_POST['mo01_cpf']);
$mo01_tipoend       = substr($_POST['mo01_tipoend'],0,10);
$mo01_ender         = $_POST['mo01_ender'];
$mo01_nomeend       = $_POST['mo01_nomeend'];
$mo01_numero        = ($_POST['mo01_numero']!=''?$_POST['mo01_numero']:'0');
$mo01_bairro        = $_POST['mo01_bairro'];
$mo01_nomebair      = $_POST['mo01_nomebair'];
$mo01_cep           = $_POST['mo01_cep'];
$mo01_uf            = $_POST['mo01_uf'];
$mo01_municip       = $_POST['mo01_municip'];
$mo01_telef         = ($_POST['mo01_telef']==""?"":$_POST['mo01_telef']);
$mo01_telcel        = $_POST['mo01_telcel'];
$mo01_telcom        = ($_POST['mo01_telcom']==""?"":$_POST['mo01_telcom']);
$mo01_email         = $_POST['mo01_email'];
$mo01_tiposangue    = $_POST['mo01_tiposangue'];
$mo01_fatorrh       = $_POST['mo01_fatorrh'];
$mo01_creche        = $_POST['mo01_creche'];


$cpfresp = str_replace('.', '', $mo01_cpfresp);
$cpfresp = str_replace('-', '', $cpfresp);

$dataNasc = explode('/',$mo01_dtnasc);
$mo01_dtnasc = $dataNasc[2].'-'.$dataNasc[1].'-'.$dataNasc[0];

if (!empty($mo01_ctbescredeorigem)) {
   $sSqlEscolaRedeOrigem = "select ed18_c_nome from escola where ed18_i_codigo = ".$mo01_ctbescredeorigem;
   $rsEscolaRedeOrigem = db_query($sSqlEscolaRedeOrigem);
   db_fieldsmemory($rsEscolaRedeOrigem,0);  
   $mo01_escredeorigem = $ed18_c_nome;    
} else {
   $mo01_ctbescredeorigem = 0; 
}

if (!empty($mo01_bairro)) {
   $sSqlBairro = "select j13_descr from bairro where j13_codi = ".$mo01_bairro;
   $rsBairro = db_query($sSqlBairro);
   db_fieldsmemory($rsBairro,0);  
   $mo01_nomebai = $j13_descr;    
} else {
   $mo01_bairro = 0; 
}

$mo01_cpfresp = str_replace('.', '', $mo01_cpfresp);
$mo01_cpfresp = str_replace('-', '', $mo01_cpfresp);
$mo01_cpf = str_replace('.', '', $mo01_cpf);
$mo01_cpf = str_replace('-', '', $mo01_cpf);
$mo01_nis = str_replace('.', '', $mo01_nis);
$mo01_nis = str_replace('-', '', $mo01_nis);
$mo01_cep = str_replace('.', '', $mo01_cep);
$mo01_cep = str_replace('-', '', $mo01_cep);

if (!empty($mo01_telef)) {
   $mo01_telef = str_replace('(', '', $mo01_telef);
   $mo01_telef = str_replace(')', '', $mo01_telef);
   $mo01_telef = str_replace(' ', '', $mo01_telef);
   $mo01_telef = str_replace('-', '', $mo01_telef);
}

if (!empty($mo01_telcel)) {
   $mo01_telcel = str_replace('(', '', $mo01_telcel);
   $mo01_telcel = str_replace(')', '', $mo01_telcel);
   $mo01_telcel = str_replace(' ', '', $mo01_telcel);
   $mo01_telcel = str_replace('-', '', $mo01_telcel);
}

if (!empty($mo01_telcom)) {
   $mo01_telcom = str_replace('(', '', $mo01_telcom);
   $mo01_telcom = str_replace(')', '', $mo01_telcom);
   $mo01_telcom = str_replace(' ', '', $mo01_telcom);
   $mo01_telcom = str_replace('-', '', $mo01_telcom);
}

 if (!empty($mo01_certidaomatricula)) {
    $mo01_certidaomatricula = str_replace('.', '', $mo01_certidaomatricula);
    $mo01_certidaomatricula = str_replace('-', '', $mo01_certidaomatricula);
}

try {

      db_inicio_transacao();

      $cod_bairro = 0;
      $nom_bairro = "";
      $cod_rua    = 0;  
      $nom_rua    = "";

      // cadastrar bairros/ruas

      if (!empty($mo01_nomebair)) {
         $mo01_nomebair = caixaAlta($mo01_nomebair);

         $sSqlBairro = "select * from bairro where trim(j13_descr) = '".trim($mo01_nomebair)."'";
         $rsBairro = db_query($sSqlBairro);
         $numbairro = pg_num_rows($rsBairro);

         if ($numbairro<=0) { 
            $clbairro->j13_descr = $mo01_nomebair;
            $clbairro->j13_rural = 'FALSE';  
            $clbairro->incluir(null);    

            if ($clbairro->erro_status == 0) {
               throw new DBException($clbairro->erro_msg);
            }

            $mo01_bairro = $clbairro->j13_codi;
         } else {    
            db_fieldsmemory($rsBairro,0);
            $mo01_bairro = $j13_codi;
         }
      }

      if (!empty($mo01_nomeend) && $mo01_ender == "") {
         $mo01_nomeend = caixaAlta($mo01_nomeend);
         
         $sSqlEndereco = "select * from ruas where trim(j14_nome) = '".trim($mo01_nomeend)."'";
         $rsEndereco = db_query($sSqlEndereco);
         $numendereco = pg_num_rows($rsEndereco);

         if ($numendereco<=0) {
            $clruas->j14_nome = $mo01_nomeend;  
            $clruas->j14_tipo = $mo01_tipoend;  
            $clruas->j14_rural = 'FALSE';  
            $clruas->j14_lei = null;
            $clruas->j14_dtlei = null;
            $clruas->j14_obs = $mo01_tipoend;
            $clruas->incluir(null);

            if ($clruas->erro_status == 0) {
               throw new DBException( $clruas->erro_msg);
            }

            $mo01_ender   = $clruas->j14_codigo;

            $clruasbairro->j16_bairro = $mo01_bairro;
            $clruasbairro->j16_lograd = $mo01_ender;
            $clruasbairro->incluir(null);
      
            if ($clruasbairro->erro_status == 0) {
               throw new DBException( $clruasbairro->erro_msg);
            }

            $clruascep->j29_cep    = $mo01_cep;
            $clruascep->j29_inicio = '0';
            $clruascep->j29_final  = '0';
            $clruascep->incluir($mo01_ender,'0');

            if ($clruascep->erro_status == 0) {
               throw new DBException( $clruascep->erro_msg);
            }
         } else {
            db_fieldsmemory($rsEndereco,0);
            $mo01_ender = $j14_codigo;          
         }   
      } 

      $clmobase->mo01_codigo        = $mo01_codigo;
      $clmobase->mo01_dtnasc        = $mo01_dtnasc;
      $clmobase->mo01_idade         = $mo01_idade;
      $clmobase->mo01_idadecorte    = $mo01_idadecorte;
      $clmobase->mo01_nome          = caixaAlta($mo01_nome);
      $clmobase->mo01_sexo          = $mo01_sexo;
      $clmobase->mo01_cor           = $mo01_cor;
      $clmobase->mo01_estciv        = $mo01_estciv;
      $clmobase->mo01_nacion        = caixaAlta($mo01_nacion);
      $clmobase->mo01_ufnasc        = $mo01_ufnasc;
      $clmobase->mo01_munnasc       = $mo01_munnasc;
      $clmobase->mo01_mae           = caixaAlta($mo01_mae);
      $clmobase->mo01_pai           = caixaAlta($mo01_pai);
      $clmobase->mo01_tiporesp      = $mo01_tiporesp;
      $clmobase->mo01_nomeresp      = caixaAlta($mo01_nomeresp);
      $clmobase->mo01_cpfresp       = $mo01_cpfresp;
      $clmobase->mo01_cartaosus     = $mo01_cartaosus;
      $clmobase->mo01_necess        = $mo01_necess;
      $clmobase->mo01_necesstipo    = $mo01_necesstipo;
      $clmobase->mo01_bolsafamilia  = ($mo01_bolsafamilia=="1"?'TRUE':'FALSE');
      $clmobase->mo01_nis           = $mo01_nis;
      $clmobase->mo01_nivel         = $mo01_nivel;
      $clmobase->mo01_ciclo         = $mo01_ciclo;
      $clmobase->mo01_redeorigem    = $mo01_redeorigem;
      $clmobase->mo01_ufredeorigem  = $mo01_ufredeorigem;
      $clmobase->mo01_munredeorigem = $mo01_munredeorigem;
      $clmobase->mo01_escredeorigem = $mo01_escredeorigem;
      $clmobase->mo01_ctbescredeorigem = $mo01_ctbescredeorigem;
      $clmobase->mo01_certidaotipo  = $mo01_certidaotipo;
      $clmobase->mo01_certidaomod   = $mo01_certidaomod;
      $clmobase->mo01_certidaolivro = $mo01_certidaolivro;
      $clmobase->mo01_certidaofolha = $mo01_certidaofolha;
      $clmobase->mo01_certidaonum   = $mo01_certidaonum;
      $clmobase->mo01_certidaomatricula = $mo01_certidaomatricula;
      $clmobase->mo01_cpf           = $mo01_cpf;
      $clmobase->mo01_ufcartcert    = $mo01_ufcartcert;
      $clmobase->mo01_muncartcert   = $mo01_muncartcert;
      $clmobase->mo01_tipoend       = $mo01_tipoend;
      $clmobase->mo01_ender         = $mo01_ender;
      $clmobase->mo01_numero        = $mo01_numero;
      $clmobase->mo01_bairro        = $mo01_bairro;
      $clmobase->mo01_nomebai       = $mo01_nomebai;
      $clmobase->mo01_cep           = $mo01_cep;
      $clmobase->mo01_uf            = $mo01_uf;
      $clmobase->mo01_municip       = $mo01_municip;
      $clmobase->mo01_telef         = $mo01_telef;
      $clmobase->mo01_telcel        = $mo01_telcel;
      $clmobase->mo01_telcom        = $mo01_telcom;
      $clmobase->mo01_email         = $mo01_email;
      $clmobase->mo01_datacad       = date("Y-m-d");
      $clmobase->mo01_tiposangue    = $mo01_tiposangue;
      $clmobase->mo01_fatorrh       = $mo01_fatorrh;
	  $clmobase->mo01_creche        = $mo01_creche;
      $clmobase->update($mo01_codigo);

      if ($clmobase->erro_status == 0) {
         throw new DBException( $clmobase->erro_msg);
      }

      $aEscolas = array();       
      if (!empty($mo01_escolai)) {
         $mo01_etapai = $mo01_etapai==''?'0':$mo01_etapai;
         $aEscolas = array(array('escola'=>$mo01_escolai,'parent'=>$mo01_irmaoi,'etapa'=>$mo01_etapai));
      }

      if (!empty($mo01_escolaii)) {
         $mo01_etapaii = $mo01_etapaii==''?'0':$mo01_etapaii;
         array_push($aEscolas,array('escola'=>$mo01_escolaii,'parent'=>$mo01_irmaoii,'etapa'=>$mo01_etapaii));
      }

      if (!empty($mo01_escolaiii)) {
         $mo01_etapaiii = $mo01_etapaiii==''?'0':$mo01_etapaiii;
         $mo01_escolaiii = $mo01_escolaiii==''?'0':$mo01_escolaiii;
         $mo01_irmaoiii = $mo01_irmaoiii==''?'0':$mo01_irmaoiii;
         array_push($aEscolas,array('escola'=>$mo01_escolaiii,'parent'=>$mo01_irmaoiii,'etapa'=>$mo01_etapaiii));
      }

//      $clEscolaBase->excluir($mo01_codigo);

      $mo02_seq = 1;
      foreach($aEscolas as $oEscola) {
/*
         $sSqlEscolaBase = "select * from plugins.baseescola where mo02_base=".$mo01_codigo." and mo02_seq=".$mo02_seq;
         $rsEscolaBase   = db_query($sSqlEscolaBase);
         $mo02_codigo    = '';
         if (pg_num_rows($rsEscolaBase)>0) {
            db_fieldsmemory($rsEscolaBase,0);   
            $clEscolaBase->mo02_codigo = $mo02_codigo; 
         } 
*/
         $clEscolaBase->mo02_base    = $mo01_codigo;
         $clEscolaBase->mo02_escola  = $oEscola['escola'];
         $clEscolaBase->mo02_dtcad   = date("Y-m-d");
         $clEscolaBase->mo02_status  = 'TRUE';
         $clEscolaBase->mo02_parent  = $oEscola['parent'];
         $clEscolaBase->mo02_seq     = $mo02_seq;
         $clEscolaBase->mo02_etapa   = $oEscola['etapa'];
         $clEscolaBase->incluir(null);

/*
         if ($mo02_codigo == '') {
            $clEscolaBase->incluir(null);
         } else {  
            $clEscolaBase->alterar($mo02_codigo,$mo02_seq);
         }
*/ 
        if ($clEscolaBase->erro_status == 0) {
            throw new DBException($clEscolaBase->erro_msg);
         }

         $mo02_seq++;   
      }

      db_fim_transacao();

      $sSqlMobase = "select * from plugins.mobase where mo01_codigo=".$mo01_codigo; 
      $rsMobase   = db_query($sSqlMobase);
      db_fieldsmemory($rsMobase,0);

      $oRetorno->mo01_codigo = $mo01_codigo;
      $oRetorno->mo01_protocol = $mo01_protocol;
      $oRetorno->mo01_nome = caixaAlta($mo01_nome);
      $oRetorno->mo01_nomeresp = caixaAlta($mo01_nomeresp);
      $oRetorno->mo01_cpfresp = $mo01_cpfresp;
      $oRetorno->sMessage = $sSqlMobse; //'Inscrição efetuada com Sucesso!';
      echo $oJson->encode($oRetorno);
      
} catch( Exception $oErro ) {
      $oRetorno->iStatus  = 2;
      $oRetorno->sMessage = $oErro->getMessage();
      echo $oJson->encode($oRetorno);
      db_fim_transacao(true);
}

?>
