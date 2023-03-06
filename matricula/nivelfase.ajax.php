<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/json; charset="utf-8"', true );
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$cod_nivel = pg_escape_string($_REQUEST['cod_nivel']);
$idade     = pg_escape_string($_REQUEST['idade']);
$idadeMinima = 5;

if ($idade<=$idadeMinima) {
   $sSqlFase  = "select serie.ed11_i_codigo, (serie.ed11_c_descr) as descr   ";
   $sSqlFase .= "from escola.serie                                                                                                   "; 
   $sSqlFase .= "   inner join plugins.idadeetapa on idadeetapa.mo15_etapa = serie.ed11_i_codigo                                     ";
   $sSqlFase .= "   inner join ensino on ensino.ed10_i_codigo = serie.ed11_i_ensino                                                  ";
   $sSqlFase .= "where serie.ed11_i_ensino = " . $cod_nivel . " and idadeetapa.mo15_idade = ".$idade."                               ";
   $sSqlFase .= "   order by ensino.ed10_c_descr;                                                                                    ";
} else {
   $sSqlFase  = "select serie.ed11_i_codigo, (serie.ed11_c_descr) as descr   ";
   $sSqlFase .= "from escola.serie                                                                                                   "; 
   $sSqlFase .= "   inner join ensino on ensino.ed10_i_codigo = serie.ed11_i_ensino                                                  ";
   $sSqlFase .= "where ensino.ed10_i_codigo = " . $cod_nivel . "                                                                     ";
   $sSqlFase .= " and ensino.ed10_i_codigo>2                                                                                         ";
   $sSqlFase .= "   order by ensino.ed10_i_codigo,serie.ed11_i_codigo;                                                               ";
}

$rsFase = db_query($sSqlFase);
$registros = pg_num_rows($rsFase);
$fases = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsFase,$cont);	
   $mo09_descricao = utf8_encode($descr);
   $fases[] = array('mo09_codigo' => $ed11_i_codigo, 'mo09_descricao' => $mo09_descricao);
}

echo (json_encode($fases));

?>
