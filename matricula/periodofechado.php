<?php 
if(!isset($periodofechado) || $periodofechado != 'lhas0df12i5uya4s66df5nsadf') die('Verifique o periodo.');
?>
<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap/css/bootstrap-theme.min.css">

<style type="text/css">
.botao { 
  font-size:14px;
}    
body {
    background: white;
}
</style>
<link rel="stylesheet" href="/skin/itaborai.css" />
</head>
<body>
<div class="jumbotron text-center jumbotron-top">
	<img src="/skin/logo.png" />
</div>
<div class="container text-center">
	<div class="row row-top">
		<a href="/" class="btn btn-success btn-lg btn-top">Início</a>
		<?php echo_botao_prematricula(); ?>
		<a href="viewescolas.php" class="btn btn-info btn-lg btn-top">Escolas</a>
		<!--a href="#" class="btn btn-danger  btn-lg btn-top">Dúvidas</a-->
	</div>
</div>
<br /><br />
<div class="container text-center">
	<div class="row rowinfo">
		<div class="panel panel-danger">
			<div class="panel-body">
				<p>Fechado.</p>
			</div>
		</div>
		<div class="panel panel-danger">
			<div class="panel-body">
				<p>Sua alocação será divulgada a partir do dia 18/01/2021 aqui neste site <b>www.matricula.itaborai.rj.gov.br</b> para alunos da Iª&nbsp;Fase. Já para alunos da IIª&nbsp;Fase será no dia 28/01/2021. Todos os candidatos contemplados deverão levar os documentos necessários para efetuar sua matrícula.</p>
			</div>
		</div>
		<div class="panel panel-primary text-left">
			<div class="panel-heading">Inscrições</div>
			<div class="panel-body">
				<ul>
					<li>Iª Fase entre 01/12/2020 à 30/12/2020</li>
					<li>IIª Fase entre 18/01/2021 à 22/01/2021</li>
				</ul>
			</div>
		</div>
		<br><br>
	</div>
</div>

<?php
include('skin/footer.php');
