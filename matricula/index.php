<?php
include('config.php');
include('skin/header.php');
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="/skin/itaborai.css" />
</head>
<body>
<div class="jumbotron text-center jumbotron-top">
	<img src="/skin/logo.png" />
</div>
<div class="container text-center">
	<div class="row row-top">
		<?php echo_botao_prematricula(); ?>
		<a href="consulta.php" class="btn btn-primary btn-lg btn-top">Consulte sua Pré-Matrícula</a>
		<a href="mapaescolas.php" class="btn btn-info btn-lg btn-top">Escolas</a>
		<!--a href="#" class="btn btn-danger  btn-lg btn-top">Dúvidas</a-->
	</div>
</div>
<br />
<div class="container text-center">
	<div class="row rowinfo">
		<!--div class="panel panel-danger">
			<div class="panel-body">
				<p><h3>A pré-matrícula para o ano de <b>2022</b> está <b> ENCERRADA</b>.<br/></h3></p>
				<p><h3>A 1ª Fase da pré-matrícula para o ano de <b>2023</b><br />começa dia <b>05/12/2022&nbsp;às&nbsp;8h</b> e termina <b>13/01/2023&nbsp;às&nbsp;17h.<b></h3></p>
				<p><h3>O resultado estará disponivel em "Consulte sua Pré-Matricula" aqui nesta página entre os dias 23/01/2023 e 27/01/2023.</h3> </p>
			</div>
		</div-->
		<div class="panel panel-primary text-left">
			<div class="panel-heading">Inscrições abertas o ano todo</div>
			<div class="panel-body">
				<ul>
					<li>A pré-matrícula realiza inscrições de novos alunos e transferências.</li>
					<li>O resultado da inscrição ficará disponivel em "Consulte sua Pré-Matrícula" em até 7 dias após a inscrição.</li>
					<li>Caso necessite de assistência presencial para realizar a sua inscrição, procure a escola municipal mais próxima.</li>
				</ul>
			</div>
		</div>
		<!--<div class="panel panel-primary">
			<div class="panel-body">
				<p>Alunos de 4 anos ou mais não deverão realizar a pré-matricula no site, deverão procurar a escola de preferência que ainda possua vaga.</p>
			</div> 
		</div> -->
		<div class="panel panel-primary text-left">
			<div class="panel-heading">Documentos necessários</div>
			<div class="panel-body">
				<p>Documentos necessários para matrícula ou transferência (original e cópia):</p>
				<ul>
					<li>Certidão de Nascimento</li>
					<li>Comprovante de Residência atualizado</li>
					<li>Cartão de Vacinação</li>
					<li>Cartão Bolsa Família, caso tenha  e nº do NIS do aluno</li>
					<li>Cartão do SUS</li>
					<li>Tipo Sanguíneo e Fator RH</li>
					<li>RG e CPF do responsável</li>
					<li>2 fotos 3x4</li>
					<li>Protocolo de Transferência</li>
				</ul>
			</div>
		</div>
		<div class="panel panel-warning">
			<div class="panel-body">
				<p>Para iniciar o cadastro da pré-matrícula é necessário ter o CEP CORRETO.</p>
			</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-body">
				<p><a target="_blank" href="https://do.ib.itaborai.rj.gov.br/edicoes/2022/2022-09-29.pdf">Clique aqui</a> para acessar todas as normas e procedimentos para ingresso e permanência de estudantes nas Unidades Escolares e Administrativas da Rede Pública Municipal de Ensino de Itaboraí para o ano&nbsp;letivo&nbsp;de&nbsp;2023, incluindo as datas e o calendário oficial.</p>
			</div>
		</div>
		<br /><br />
	</div> 
</div>
<?php
include('skin/footer.php');
