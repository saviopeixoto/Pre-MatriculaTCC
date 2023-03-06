<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/json; charset="ISO-8859-1"', true );
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$cod_nivel = pg_escape_string($_REQUEST['cod_nivel']);
$cod_ciclo = pg_escape_string($_REQUEST['cod_ciclo']);

$escola = '';
if (isset($_REQUEST['escola'])) {
   $escola    = pg_escape_string($_REQUEST['escola']); 	
}

$sSqlEscolas  = "select escola.ed18_i_codigo,escola.ed18_c_nome from escolaetapa                    ";
$sSqlEscolas .= "  inner join serie  on serie.ed11_i_codigo = escolaetapa.ed152_i_serie             ";   
$sSqlEscolas .= "  inner join escola on escola.ed18_i_codigo = escolaetapa.ed152_i_escola           ";   
$sSqlEscolas .= "where escolaetapa.ed152_i_serie = " . $cod_ciclo;
if ($escola != '') {
   $sSqlEscolas .= " and escolaetapa.ed152_i_escola != " . $escola;
}
$sSqlEscolas .= " order by ed18_c_nome;    														    ";

$rsEscolas = db_query($sSqlEscolas);
$registros = pg_num_rows($rsEscolas);
$escolas   = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsEscolas,$cont);	
   $ed18_c_nome = utf8_encode($ed18_c_nome);
   $escolas[] = array('ed18_i_codigo' => $ed18_i_codigo, 'ed18_c_nome' => $ed18_c_nome);
}

echo (json_encode($escolas));

?>