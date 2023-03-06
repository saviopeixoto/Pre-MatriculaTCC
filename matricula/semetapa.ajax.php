<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/json; charset="utf-8"', true );
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$escola = pg_escape_string($_REQUEST['escola']);
$etapa =  pg_escape_string($_REQUEST['etapa']);
$aviso = 0;
$arr1  = array(20,24,33,38,39,40,77,96,101);
$arr2  = array(29,50,77);
$arr3  = array(1,10,17,46,53,58,74,75,76,80,83,90,93);
$arr3I = array(11);
$arr4  = array(1,13,75);
$arr5  = array(1,13,75);
// a chave é a etapa e o array são as escolas
$sem_etapa = array(
    1  => $arr1,
	2  => $arr2,
	3  => $arr3,
	26 => $arr3I,
	4  => $arr4,
	5  => $arr5,
	);
    

//if (array_key_exists($escola, $sem_etapa){
foreach ($sem_etapa as $chave =>  $valor){
	if ($chave == $etapa){
		if (in_array($escola, $valor)){
			$aviso = 1;
		}
	}
}		
echo(json_encode($aviso));