<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		.btn-top {
			padding: 20px 30px;
			font-size: 30px;
		}
		.row-top {
		    margin-top: -60px;
			text-align: center;
		}
		.rowinfo {
			font-size: 20px;
			max-width: 740px;
			margin: auto;
		}
		.panel-warning {
			color: black;
			background-color: #f3bf77;
			border-color: #eea236;
		}
		.panel-danger {
			color: black;
			background-color: #ffe5e5;
			border-color: red;
		}
	</style>
</head>
<body>

<div class="jumbotron text-center">
	<h1>My First Bootstrap Page</h1>
	<p>Resize this responsive page to see the effect!</p> 
</div>
  
<div class="container">
	<div class="row row-top">
		<button type="button" class="btn btn-success btn-lg btn-top">Faça sua Pré-Matrícula</button>
		<button type="button" class="btn btn-primary btn-lg btn-top">Consulte sua Pré-Matrícula</button>
		<button type="button" class="btn btn-info    btn-lg btn-top">Escolas</button>
		<button type="button" class="btn btn-danger  btn-lg btn-top">Dúvidas</button>
	</div>
	<br /><br />
	<div class="row rowinfo">
		<div class="panel panel-warning">
			<div class="panel-body">
				<p>Para iniciar o cadastro da pré-matrícula é necessário ter o CEP CORRETO em mãos. Dúvidas, entre em contato com suportematriculas&#64;itaborai&#46;rj&#46;gov&#46;br</p>
			</div>
		</div>
		<div class="panel panel-danger">
			<div class="panel-body">
				<p>Sua alocação será divulgada a partir do dia 20/01/2020 no site matricula&#46;itaborai&#46;rj&#46;gov&#46;br. Para alunos da Iª Fase. Já para alunos da IIª Fase será no dia 30/01/2020. Todos os candidatos contemplados deverão levar os documentos necessários para efetuar sua matrícula.</p>
			</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading">Inscrições</div>
			<div class="panel-body">
				<ul>
					<li>Iª Fase entre 18/11/2019 à 16/12/2019</li>
					<li>IIª Fase entre 21/01/2020 à 24/01/2020</li>
				</ul>
			</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-body">
				<p>A Matrícula Fácil é destinada aos candidatos novos que desejam ingressar na Rede Municipal de Ensino de Itaboraí.</p>
				<ul>
					<li>Educação Infantil</li>
					<ul>
						<li>Creche</li>
						<li>Pré-escola</li>
					</ul>
					<li>Ensino Fundamental</li>
					<ul>
						<li>Anos Iniciais (1º ao 5º ano)</li>
						<li>Anos Finais (6º ao 9º ano)</li>
						<li>EJA (I a V Fase)</li>
						<li>EJA (VI a IX Fase)</li>
					</ul>
				</ul>
			</div>
		</div>
		<br />
		
		<br />
	</div>
</div>

<div class="text-center" style="font-size:15px;background-color:#e8e8e8;    padding: 18px 0;">
	<p class="text-center">Prefeitura Municipal de Itaboraí</p>
	<p class="text-center">Dúvidas, entre em contato com suportematriculas&#64;itaborai&#46;rj&#46;gov&#46;br</p>
</div>

</body>
</html>


