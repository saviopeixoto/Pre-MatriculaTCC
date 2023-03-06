<?php 
require_once('classes/DataValidator.php');
   
$clvalidate = new Data_Validator();

$oJson                  = new services_json();
$oRetorno               = new stdClass();
$oRetorno->iStatus      = 1;
$oRetorno->sMessage     = '';

$mo01_dtnasc        = $_POST['mo01_dtnasc'];
$mo01_idade         = $_POST['mo01_idade'];
$mo01_idadecorte    = $_POST['mo01_idadecorte'];
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
$mo01_ciclo         = $_POST['mo01_ciclo'];
$mo01_serie         = $_POST['mo01_serie'];
$mo01_escolai       = $_POST['mo01_escolai'];
$mo01_irmaoi        = $_POST['mo01_irmaoi'];
$mo01_escolaii      = ($_POST['mo01_escolaii']==""?"":$_POST['mo01_escolaii']);
$mo01_irmaoii       = ($_POST['mo01_irmaoii']==""?"0":$_POST['mo01_irmaoii']);
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
$mo01_tipoend       = $_POST['mo01_tipoend'];
$mo01_ender         = $_POST['mo01_ender'];
$mo01_numero        = $_POST['mo01_numero'];
$mo01_bairro        = $_POST['mo01_bairro'];
$mo01_cep           = $_POST['mo01_cep'];
$mo01_uf            = $_POST['mo01_uf'];
$mo01_municip       = $_POST['mo01_municip'];
$mo01_telef         = ($_POST['mo01_telef']==""?"":$_POST['mo01_telef']);
$mo01_telcel        = $_POST['mo01_telcel'];
$mo01_telcom        = ($_POST['mo01_telcom']==""?"":$_POST['mo01_telcom']);
$mo01_email         = $_POST['mo01_email'];

$clvalidate->set('mo01_dtnasc', $mo01_dtnasc);
$clvalidate->set('mo01_idade', $mo01_idade);
$clvalidate->set('mo01_idadecorte', $mo01_idadecorte);
$clvalidate->set('mo01_nome', $mo01_nome);
$clvalidate->set('mo01_sexo', $mo01_sexo);
$clvalidate->set('mo01_cor', $mo01_cor);
$clvalidate->set('mo01_estciv', $mo01_estciv);
$clvalidate->set('mo01_nacion', $mo01_nacion);
$clvalidate->set('mo01_ufnasc', $mo01_ufnasc);
$clvalidate->set('mo01_munnasc', $mo01_munnasc);
$clvalidate->set('mo01_mae', $mo01_mae);
$clvalidate->set('mo01_tipores', $mo01_tiporesp);
$clvalidate->set('mo01_nomeresp', $mo01_nomeresp);
$clvalidate->set('mo01_cpfresp', $mo01_cpfresp);
$clvalidate->set('mo01_cartaosus', $mo01_cartaosus);
$clvalidate->set('mo01_necess', $mo01_necess);
$clvalidate->set('mo01_necesstipo', $mo01_necesstipo);
$clvalidate->set('mo01_bolsafamilia', $mo01_bolsafamilia);
$clvalidate->set('mo01_nivel', $mo01_nivel);
$clvalidate->set('mo01_ciclo', $mo01_ciclo);
$clvalidate->set('mo01_serie', $mo01_serie);
$clvalidate->set('mo01_escolai', $mo01_escolai);
$clvalidate->set('mo01_escolaii', $mo01_escolaii);
$clvalidate->set('mo01_escolaiii', $mo01_escolaiii);
$clvalidate->set('mo01_redeorigem', $mo01_redeorigem);
$clvalidate->set('mo01_ufredeorigem', $mo01_ufredeorigem);
$clvalidate->set('mo01_munredeorigem', $mo01_munredeorigem);

if ($mo01_redeorigem != 8) {
   $clvalidate->set('mo01_escredeorigem', $mo01_escredeorigem);
   $clvalidate->set('mo01_ctbescredeorigem', $mo01_ctbescredeorigem);
}

$clvalidate->set('mo01_certidaotipo', $mo01_certidaotipo);
$clvalidate->set('mo01_certidaomod', $mo01_certidaomod);

if ($mo01_certidaomod != 2) {
   $clvalidate->set('mo01_certidaolivro', $mo01_certidaolivro);
   $clvalidate->set('mo01_certidaofolha', $mo01_certidaofolha);
   $clvalidate->set('mo01_certidaonum', $mo01_certidaonum);
} else {
   $clvalidate->set('mo01_certidaomatricula', $mo01_certidaomatricula);
}

$clvalidate->set('mo01_ufcartcert', $mo01_ufcartcert);
$clvalidate->set('mo01_muncartcert', $mo01_muncartcert);
$clvalidate->set('mo01_tipoend', $mo01_tipoend);
$clvalidate->set('mo01_ender', $mo01_ender);
$clvalidate->set('mo01_bairro', $mo01_bairro);
$clvalidate->set('mo01_cep', $mo01_cep);
$clvalidate->set('mo01_uf', $mo01_uf);
$clvalidate->set('mo01_municip', $mo01_muncip);
$clvalidate->set('mo01_telcel', $mo01_telcel);

if (!$validate->validate()) {
   $erros = $validate->get_errors();   
   $oRetorno->iStatus  = 2;
   $oRetorno->sMessage = $erros;
}

echo $oJson->encode($oRetorno);

?>