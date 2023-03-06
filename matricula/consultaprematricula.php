<?php

echo "<script>alert('Consulta liberada a partir do dia 23/01/2023.'); location='index.php';</script>"; 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Secretaria de Educação - Matricula Fácil</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<!--[if !lte IE 8]><!-->
<link rel="stylesheet" href="css/config.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/estilo.css" type="text/css" media="screen">
<!--<![endif]-->
<!--[if lte IE 8]><!-->
<link rel="stylesheet" href="css/config_ie.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/estilo_ie.css" type="text/css" media="screen">
<!--<![endif]-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mask.js"></script>
<script type="text/javascript" src="js/validate.min.js"></script>
<script type="text/javascript" src="js/validateadd.js" ></script>
<script type="text/javascript" src="js/messages_pt_BR.js"></script>
<script type="text/javascript" src="js/belatedPNG.js" ></script>
<script type="text/javascript">
function limparDados() {
   $("#mo22_senha").val('');
   $("#mo01_codigo").val('');
   $("#mo01_dtnasc").val('');
}

jQuery(document).ready(function() {
   $("#mo01_cpfconsulta").mask("999.999.999-99");  
   $("#mo01_dtnasc").mask("99/99/9999");  
   $("#moconsulta").validate({
       rules: {
         mo01_cpfconsulta  : { required : true, cpf : true },
         mo01_codigo       : { required : true },
         mo01_dtnasc       : { required : true }
       } 
   });

   $('#mo01_dtnasc').change(function() {
      var cpfconsulta = $('#mo01_cpfconsulta').val();  
      var datanasc    = $('#mo01_dtnasc').val();  

      if (cpfconsulta != '') {
         if (datanasc != '') {
            $.getJSON('consultaprotocoloupdate.ajax.php?search=',{cpfconsulta: cpfconsulta, dtnas: datanasc, jax: 'true'}, function(j) {
              var options = ''; 
              if (j[0].mo01_codigo == 0) {
                 options += '<option value="' + j[0].mo01_codigo + '">' + j[0].mo01_nome + '</option>';
              } else {
                 options = '<option value="">– Escolha um Candidato -</option>'; 
                 for(var i=0; i<j.length; i++) {
                    options += '<option value="' + j[i].mo01_codigo + '">' + j[i].mo01_nome + '</option>';
                 }  
              } 
              $('#mo01_codigo').html(options).show();
            });
         } else {
            alert('Digite a Data de Nascimento de um dos Filhos!');
         }
      } else {
         $('#mo01_codigo').html('<option value="">– Escolha um Candidato -</option>');
      }
  });
});
</script>
<style type="text/css">
.botao { 
  font-size:14px;
}    
</style>
</head>
<body>
<div class="container">
  <div class="conteudo conteudo-100 meio-bg">
    <div class="linha2"><!-- --></div>
    <div class="row">
      <div class="col-md-12">        
        <div class="container-fluid">
          <h1 style="text-align: center;">Pr&eacute;-Matrícula</h1>
          <h2 style="text-align: center;">Corre&ccedil;&atilde;o da PréMatricula</h2>
        </div>
      </div>    
    </div>
    <form id="mobase-consulta" name="mobase-consulta" method="post" action="prematriculaupdate.php">
      <div class="row">
        <div class="col-md-12">        
          <div class="container-fluid">
            <div class="linha2"><!-- --></div>
            <div class="col-md-4">
              <div class="form-group">
                <h4>Corre&ccedil;&atilde;o PréMatricula</h4>
              </div>          
              <div class="form-group">
                <label>Preencha o <strong>CPF do respons&aacute;vel</strong> e <strong>Escolha o candidato</strong></label>
              </div>          
            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-12">
                  <div class="container-fluid">                        
                    <div class="form-group">
                      <label><h4>Corrija os dados. Entre com os dados abaixo.</h4></label>
                    </div>                               
                  </div>        
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="container-fluid">                        
                    <div class="form-group">
                      <label for="mo01_cpfconsulta">CPF Respons&aacute;vel*</label>
                      <input class="form-control" type="text" id="mo01_cpfconsulta" name="mo01_cpfconsulta" />
                    </div>             
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="container-fluid">                        
                    <div class="form-group">
                      <label for="mo01_dtnasc">Data Nascimento de um dos filhos*</label>
                      <input class="form-control" type="text" id="mo01_dtnasc" name="mo01_dtnasc" />
                    </div>             
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">        
                  <div class="container-fluid">
                    <div class="form-group">
                      <label for="mo01_codigo">Candidato*</label>
                      <select class="form-control textoupper" id="mo01_codigo" name="mo01_codigo" required="required"></select>
                    </div>      
                  </div>
                </div>              
              </div>
              <div class="row">
                <div class="col-md-12">        
                  <div class="container-fluid">
                    <div class="form-group" align="center">
                    <button type="submit" class="btn btn-lg btn-success" name="btn-consultar" id="btn-consultar" onclic="tabClose();"> 
                       <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Consultar
                    </button>
                    <button type="reset" class="btn btn-lg btn-danger"> 
                       <span class="glyphicon glyphicon-remove" aria-hidden="true" name="btn-limpar"></span> Cancelar
                    </button>
                  </div>
                  </div>
                </div>  
              </div>             
            </div>
          </div>        
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>
