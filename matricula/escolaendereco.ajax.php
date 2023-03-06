<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/json; charset="utf-8"', true );
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("std/db_stdClass.php");

$escola = pg_escape_string($_REQUEST['escola']);

$sSqlEscolaOrigem   = "select ed18_i_numero, ed18_c_compl, j14_nome, j13_descr, j88_sigla ";
$sSqlEscolaOrigem  .= "  from escola        										      ";
$sSqlEscolaOrigem  .= "    inner join ruas     on ruas.j14_codigo = escola.ed18_i_rua     ";
$sSqlEscolaOrigem  .= "    inner join bairro   on bairro.j13_codi = escola.ed18_i_bairro  ";
$sSqlEscolaOrigem  .= "    inner join ruastipo on ruastipo.j88_codigo = ruas.j14_tipo     ";
$sSqlEscolaOrigem  .= "where ed18_i_codigo = ".$escola;
//die($sSqlEscolaOrigem);

$rsEscolaOrigem = db_query($sSqlEscolaOrigem);
$registros = pg_num_rows($rsEscolaOrigem);

$endereco = '';
if ($registros>0) {
   db_fieldsmemory($rsEscolaOrigem,0);	
   $j14_nome  = utf8_encode($j14_nome);
   $j13_descr = utf8_encode($j13_descr);
   if (is_numeric(trim($j14_nome))) {
      $sSqlLogradouro = "select j14_nome from ruas where j14_codigo = ".$j14_nome;
      $rsLogradouro   = db_query($sSqlLogradouro);
      db_fieldsmemory($rsLogradouro,0);	
   }

   $endereco = $j88_sigla.' '.$j14_nome.($ed18_i_numero == ''?' ':', '.$ed18_i_numero).($ed18_c_compl==''?' ':', '.$ed18_c_compl).' BAIRRO: '.$j13_descr;  	 
}

echo (json_encode($endereco));

?>