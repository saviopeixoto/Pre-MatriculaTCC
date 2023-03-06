<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/json; charset="ISO-8859-1"', true );
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$cod_nivel  = pg_escape_string($_REQUEST['cod_nivel']);
$cod_escola = pg_escape_string($_REQUEST['cod_escola']);
$cod_nivel  = 14;
$cod_escola = 15;  


$sSqlEscolaTurno  = "select turno.ed15_i_sequencia,turno.ed15_c_nome from cursoturno                       ";
$sSqlEscolaTurno .= "  inner join escola on escola.ed18_i_codigo = cursoturno.ed85_i_escola                ";   
$sSqlEscolaTurno .= "  inner join cursoedu on cursoedu.ed29_i_codigo = cursoturno.ed85_i_curso             ";               
$sSqlEscolaTurno .= "  inner join ensino on ensino.ed10_i_codigo = cursoedu.ed29_i_ensino                  ";
$sSqlEscolaTurno .= "  inner join turno on turno.ed15_i_codigo = cursoturno.ed85_i_turno                   ";
$sSqlEscolaTurno .= "where  cursoedu.ed29_i_ensino = '". $cod_nivel ."'                                    "; 
$sSqlEscolaTurno .= "  and cursoturno.ed85_i_escola = '" . $cod_escola ."' order by turno.ed15_i_sequencia;";

//die($sSqlEscolaTurno);

$rsEscolaTurno = db_query($sSqlEscolaTurno);
$registros = pg_num_rows($rsEscolaTurno);
$escolaTurno   = array();

for($cont=0;$cont<$registros;$cont++) {
   db_fieldsmemory($rsEscolaTurno,$cont);	
   $escolaTurno[] = array('ed15_i_codigo' => $ed15_i_sequencia, 'ed15_c_nome' => $ed15_c_nome);
}

echo (json_encode($escolaTurno));