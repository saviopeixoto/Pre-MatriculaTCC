<?php
/**
 * @author    Rodrigo Devolder <rodrigodevolder@gmail.com>
 * @copyright 2021 Prefeitura Municipal de Itaborai <itaborai.rj.gov.br>
 */

include_once(__DIR__ .'/lib.php');

//die('Voltaremos dentro de alguns minutos. Obrigado pela compreensão.');   //Esta linha que fecha todo o site

$tipo_fase = 'P';  //R=remanejamento, P=prematricula

$dadosconfig = [
	[
		'fase' => '9',
		'tipo' => 'P',
		'ini' => '2020-12-01',
		'fim' => '2020-12-30',
		'consultaini' => '2021-01-18'
	],[
		'fase' => '10',
		'tipo' => 'P',
		'ini' => '2021-01-18',
		'fim' => '2021-01-22',
		'consultaini' => '2021-01-28'
	],[
		'fase' => '11',
		'tipo' => 'P',
		'ini' => '2021-02-01',
		'fim' => '2021-09-30',
		'limiteidade' => 3,
		'consultaini' => '2021-02-01'
	],[
		'fase' => '12',
		'tipo' => 'P',
		'ini' => '2021-06-02',
		'fim' => '2021-07-18',
		'consultaini' => '2021-07-20'
	],[
		'fase' => '13',
		'tipo' => 'R',
		'ini' => '2022-01-18',
		'fim' => '2022-02-30',
		'consultaini' => '2022-01-20'
	],[
		'fase' => '14',
		'tipo' => 'P',
		'ini' => '2022-12-01',
		'fim' => '2022-12-31',
		'consultaini' => '2022-01-17'
	],[
		'fase' => '15',
		'tipo' => 'P',
		'ini' => '2022-01-20',
		'fim' => '2022-01-24',
		'consultaini' => '2022-01-27'
	],[
		'fase' => '16',
		'tipo' => 'P',
		'ini' => '2022-02-01',
		'fim' => '2022-10-30',
		'consultaini' => '2022-02-01'
	],[
		'fase' => '18',
		'tipo' => 'P',
		'ini' => '2022-12-05',
		'fim' => '2023-12-31',
		'consultaini' => '2023-01-23'
	]
];
