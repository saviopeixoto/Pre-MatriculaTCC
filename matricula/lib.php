<?php
/**
 * @author    Rodrigo Devolder <rodrigodevolder@gmail.com>
 * @copyright 2021 Prefeitura Municipal de Itaborai <itaborai.rj.gov.br>
 */

function periodovalido () {
	return true;
	global $dadosconfig;
	foreach($dadosconfig as $row) {
		if(time() >= strtotime($row['ini']) && time() < strtotime('+1 day', strtotime($row['fim']))) return true;
	}
	return false;
}

function get_fase () {
	global $dadosconfig;
	foreach($dadosconfig as $row) {
		if(time() >= strtotime($row['ini']) && time() < strtotime('+1 day', strtotime($row['fim']))) return $row['fase'];
	}
	return false;
}

function get_arr_fases_consulta () {
	return [14];

	global $dadosconfig;
	$arr = [];
	foreach($dadosconfig as $row) {
		if(time() >= strtotime($row['consultaini'])) $arr[] = $row['fase'];
	}
	return $arr;

}

function echo_botao_prematricula () {
	if(periodovalido()) echo '<a href="prematricula.php" class="btn btn-success btn-lg btn-top">Faça sua Pré-Matrícula</a>';
}

function die_alert_se_consulta_fechada () {
	if(empty(get_arr_fases_consulta())) die_page_alert();
}

function die_alert_se_inscricao_fechada () {
	if(!periodovalido()) die_page_alert();
}

function die_page_alert () {
	$periodofechado = 'lhas0df12i5uya4s66df5nsadf';
	include('periodofechado.php');
	die;
}

function get_base_token () {
	return 'l0df128i5sduya344s6f5nadsadf';
}

function get_token () {
	$basetoken = get_base_token();
	return md5($basetoken . date('YmdHi'));
}

function check_token ($token) {
	$basetoken = get_base_token();
	$token_minuto2 = md5($basetoken . date('YmdHi', strtotime('-2 minutes')));
	$token_minuto1 = md5($basetoken . $key . date('YmdHi', strtotime('-1 minutes')));
	$token_agora = md5($basetoken . $key . date('YmdHi'));
	return in_array($token, [$token_agora, $token_minuto1, $token_minuto2]);
}

//if(time() < strtotime($data_ini) || time() > strtotime($data_fim)) die('Periodo Pré-Matricula inválido');
