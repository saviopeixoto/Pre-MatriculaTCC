<?php 
include('config.php');
die_alert_se_consulta_fechada();

include('skin/header.php');
?>
<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="css/bootstrap/js/bootstrap.min.js"></script>
<!--[if !lte IE 8]><!-->
<link rel="stylesheet" href="css/config.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/estilo.css" type="text/css" media="screen">
<!--<![endif]-->
<!--[if lte IE 8]><!-->
<link rel="stylesheet" href="css/config_ie.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/estilo_ie.css" type="text/css" media="screen">
<!--<![endif]-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script type="text/javascript" src="js/validate.min.js"></script>
<script type="text/javascript" src="js/validateadd.js" ></script>
<script type="text/javascript" src="js/messages_pt_BR.js"></script>
<script type="text/javascript" src="js/belatedPNG.js" ></script>
<script type="text/javascript">
function limparDados() {
   $("#mo01_cpfconsulta").val('');
   $("#mo01_codigo").val('');
}

jQuery(document).ready(function() {
	$("#mo01_cpfconsulta").mask("000.000.000-00");
	$("#moconsulta").validate({
		rules: {
			mo01_cpfconsulta  : { required : true, cpf : true },
			//mo01_protocol   : { required : true }
			mo01_codigo       : { required : true }
		} 
	});
	$('#mo01_cpfconsulta').change(function() {
		var cpfconsulta = $('#mo01_cpfconsulta').val();  
		if(!validarCPF(cpfconsulta)) {
			$('#mo01_codigo').html('<option value="">– Digite corretamente acima o CPF do responsável -</option>');
			return false;
		}
		$.getJSON('consultaprotocolo.ajax.php?search=',{cpfconsulta: cpfconsulta, ajax: 'true'}, function(j) {
			if(j.length==0) {
				$('#mo01_codigo').html('<option value="">– CPF do responsável não encontrado -</option>');
			} else {
				var options = '<option value="">– Escolha um Candidato -</option>';
				for(var i=0; i<j.length; i++) {
					options += '<option value="' + j[i].mo01_codigo + '">' + j[i].mo01_nome + '</option>';
				}
				$('#mo01_codigo').html(options).show();
			}
		}).fail(function() {
			var options = '<option value="">– CPF do responsável não encontrado -</option>';
			$('#mo01_codigo').html(options).show();
		});
	});
});


function validarCPF(cpf) {	
	cpf = cpf.replace(/[^\d]+/g,'');	
	if(cpf == '') return false;	
	// Elimina CPFs invalidos conhecidos	
	if (cpf.length != 11 || 
		cpf == "00000000000" || 
		cpf == "11111111111" || 
		cpf == "22222222222" || 
		cpf == "33333333333" || 
		cpf == "44444444444" || 
		cpf == "55555555555" || 
		cpf == "66666666666" || 
		cpf == "77777777777" || 
		cpf == "88888888888" || 
		cpf == "99999999999")
		return false;		
	// Valida 1o digito	
	add = 0;	
	for (i=0; i < 9; i ++)		
		add += parseInt(cpf.charAt(i)) * (10 - i);	
		rev = 11 - (add % 11);	
		if (rev == 10 || rev == 11)		
			rev = 0;	
		if (rev != parseInt(cpf.charAt(9)))		
			return false;		
	// Valida 2o digito	
	add = 0;	
	for (i = 0; i < 10; i ++)		
		add += parseInt(cpf.charAt(i)) * (11 - i);	
	rev = 11 - (add % 11);	
	if (rev == 10 || rev == 11)	
		rev = 0;	
	if (rev != parseInt(cpf.charAt(10)))
		return false;		
	return true;   
}

</script>
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
		<a href="mapaescolas.php" class="btn btn-info btn-lg btn-top">Escolas</a>
		<!--a href="#" class="btn btn-danger  btn-lg btn-top">Dúvidas</a-->
	</div>
</div>
<div class="container">
	<div class="row">
		<br /><br />
		<h2 class="text-center">Consulte aqui a sua Pré-Matrícula</h2>
		<p class="text-center">Consulte a sua alocação ou reimprima o seu protocolo aqui. Dúvidas, entre em contato com <b>suportematriculas&#64;itaborai&#46;rj&#46;gov&#46;br</b></p>
		<br />
		<form id="moconsulta" name="moconsulta" method="post" action="fichaalocacao.php">
			<div class="panel panel-primary text-left" style="margin:auto;max-width:715px;">
				<div class="panel-body">
					<div class="form-group">
						<label for="mo01_cpfconsulta">CPF Respons&aacute;vel</label>
						<input class="form-control" type="text" id="mo01_cpfconsulta" name="mo01_cpfconsulta" />
					</div>             
					<div class="form-group">
						<label for="mo01_codigo">Candidato</label>
						<select class="form-control textoupper" id="mo01_codigo" name="mo01_codigo" required="required"></select>
					</div>      
				</div>
				<div class="panel-footer">
					<button type="submit" class="btn btn-lg btn-success" name="btn-consultar" id="btn-consultar">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Consultar
					</button>
				</div>
			</div>
		</form>
		<br /><br /><br /><br /><br /><br />
		<br /><br /><br /><br /><br /><br />
	</div>
</div>
<?php
include('skin/footer.php');
