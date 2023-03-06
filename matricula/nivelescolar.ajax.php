<?php
header('Cache-Control: no-cache');
//header('Content-type: application/json; charset="utf-8"',true);
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$idade  = pg_escape_string($_REQUEST['idade']);
$dtnasc = pg_escape_string($_REQUEST['dtnas']);
$dtcort = pg_escape_string($_REQUEST['dtcort']);

$idadeMinima = 5;
$aIdade_i = array(6,7,8,9,10,11);
$aIdade_f = array(11,12,13,14);
$dtnas    = implode('-', array_reverse(explode("/", $dtnasc)));
$dtcort   = implode('-', array_reverse(explode("/", $dtcort)));
$ano_n    = substr($dtnas,0,4);
$ano      = substr($dtcort,0,4);
$dtlim_i  = $ano.'-04-01';
$dtlim_f  = $ano.'-12-31';
$dtnas    = explode('-',$dtnas);
$dtnasc   = $ano.'-'.$dtnas[1].'-'.$dtnas[2];

if (strtotime($dtnasc)>=strtotime($dtlim_i) && strtotime($dtnasc)<=strtotime($dtlim_f)) {
   $idade_ano = $ano - $ano_n;
} else {
   $idade_ano = $idade;
}

if ($idade<=$idadeMinima) {
  if ($idade_ano>$idadeMinima) { 
      $sSqlNivelEscolar  = "   select distinct ensino.ed10_i_codigo,ensino.ed10_c_descr from escola.serie                        ";
      $sSqlNivelEscolar .= "   inner join escola.ensino on ensino.ed10_i_codigo = serie.ed11_i_ensino                            ";
      $sSqlNivelEscolar .= "   inner join plugins.idadeetapa on idadeetapa.mo15_etapa = serie.ed11_i_codigo                      ";
      $sSqlNivelEscolar .= "where idadeetapa.mo15_idade <= " . $idade ." order by ensino.ed10_i_codigo                           ";
   } else {
      $sSqlNivelEscolar  = "   select distinct ensino.ed10_i_codigo,ensino.ed10_c_descr from escola.serie                        ";
      $sSqlNivelEscolar .= "   inner join escola.ensino on ensino.ed10_i_codigo = serie.ed11_i_ensino                            ";
      $sSqlNivelEscolar .= "   inner join plugins.idadeetapa on idadeetapa.mo15_etapa = serie.ed11_i_codigo                      ";
      $sSqlNivelEscolar .= "where idadeetapa.mo15_idade = " . $idade ." and ensino.ed10_i_codigo<3 order by ensino.ed10_c_descr; ";
   }
} else {
   if (in_array($idade,$aIdade_i)) {
      $idade_i = 6;
      $idade_f = 14;
 
      $sSqlNivelEscolar  = "select ensino.ed10_i_codigo,ensino.ed10_c_descr from escola.ensino                   ";
      $sSqlNivelEscolar .= " Where ensino.ed10_i_idadei >= " . $idade_i . " and ensino.ed10_i_idadef <= ".$idade_f;   
      $sSqlNivelEscolar .= "   order by ensino.ed10_c_descr;                                                     ";
  
   } else {
      if (in_array($idade,$aIdade_f)) {
         $idade_i = 6;
         $idade_f = 14; 
      } elseif ($idade > 14 && $idade < 18) {
         $idade_i = 5;
         $idade_f = 99;

      } else {
         $idade_i = 15;
         $idade_f = 99;  
      }
 
      $sSqlNivelEscolar  = "select ensino.ed10_i_codigo,ensino.ed10_c_descr from escola.ensino                   ";
      $sSqlNivelEscolar .= " Where ensino.ed10_i_idadei >= " . $idade_i . " and ensino.ed10_i_idadef <= ".$idade_f;   
      $sSqlNivelEscolar .= "   order by ensino.ed10_c_descr;                                                     ";
   }

 // $sSqlNivelEscolar  = "select ensino.ed10_i_codigo,ensino.ed10_c_descr from escola.ensino                   ";
  //$sSqlNivelEscolar .= " Where ensino.ed10_i_idadei >= " . $idade_i . " and ensino.ed10_i_idadef <= ".$idade_f;   
 //$sSqlNivelEscolar .= "   order by ensino.ed10_c_descr;                                                     ";
}

//echo $sSqlNivelEscolar.'<br/>';

$rsNivelEscolar = db_query($sSqlNivelEscolar);
$registros      = pg_num_rows($rsNivelEscolar);
$escolaridade   = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsNivelEscolar,$cont);	
   $ed10_c_descr = utf8_encode($ed10_c_descr);
   $escolaridade[] = array('ed10_i_codigo' => $ed10_i_codigo, 'ed10_c_descr' => $ed10_c_descr);
}

echo (json_encode($escolaridade));

?>
