<?php
include('config.php');
include('skin/header.php');

?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap/css/bootstrap-theme.min.css">

<!--[if !lte IE 8]><!-->
<link rel="stylesheet" href="css/config.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/estilo.css" type="text/css" media="screen">
<!--<![endif]-->

<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<!--[if !lte IE 8]><!-->
<link rel="stylesheet" href="css/config.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/estilo.css" type="text/css" media="screen">
<!--<![endif]-->
<!--[if lte IE 8]><!-->
<link rel="stylesheet" href="css/config_ie.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/estilo_ie.css" type="text/css" media="screen">
<!--<![endif]-->
<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script type="text/javascript" src="js/belatedPNG.js"></script>
<script type="text/javascript" src="js/carregatabelas.js"></script>
<script type="text/javascript" src="js/enviardados.js"></script>
<style type="text/css">
.modal-body {
    position: static;
    padding-bottom: 18px;
}
.textoupper {
  text-transform:uppercase;
}
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
		<a href="consulta.php" class="btn btn-primary btn-lg btn-top">Consulte sua Pré-Matrícula</a>
	</div>
</div>
<div class="container-fluid" style="margin-top:20px;">

<div class="center">
	<div class="alert alert-info"><a href="escolas2023.pdf" target="_blank" style="font-size:16px;">Lista de Escolas em PDF</a></div><br />
</div>

<iframe src="https://www.google.com/maps/d/embed?mid=1RBv3S0qDOyGsbNgpM22eIsdOABuSYMrR&z=12" style="min-height:800px;width:100%;"></iframe>

</div>
<?php
include('skin/footer.php');
