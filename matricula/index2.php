<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Secretaria de Educação - Matricula Facil</title>
<link rel='manifest' href='/manifest.json'>
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<!--[if !lte IE 8]><!-->
<link rel="stylesheet" href="css/config.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/estilo.css" type="text/css" media="screen">
<!--<![endif]-->
<!--[if lte IE 8]><!-->
<link rel="stylesheet" href="css/config_ie.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/estilo_ie.css" type="text/css" media="screen">
<!--<![endif]-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/mask.js"></script>
<script type="text/javascript" src="js/validate.min.js"></script>
<script type="text/javascript" src="js/messages_pt_BR.js"></script>
<script type="text/javascript" src="js/belatedPNG.js" ></script>
<script type="text/javascript">
jQuery(document).ready(function() {
   DD_belatedPNG.fix('.png');
   $('a.botao').click(function() {
       var exibe = $(this).attr('rel');
       if (exibe == 'prematricula') {             
          var iframe = exibe+".php";
          $('#meio').load(iframe);          
       } else if (exibe == 'consulta') {
          var iframe = exibe+'.php';
          $('#meio').load(iframe);
       } else if (exibe == 'lista-escolas') {
          var iframe = exibe+'.php';
          $('#meio').load(iframe);          
       } else if (exibe == 'duvidas') {
          var iframe = exibe+'.php';
          $('#meio').load(iframe);          
       } else if (exibe == 'correcao') {
          var iframe = 'consultaprematricula.php';
//          $('#meio').load(iframe);          
       }
       return false;
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
<div id="tudo" class="container-fluid">
  <div id="topo">
    <div class="conteudo conteudo-100">
      <a href="index.php"><img class="png" src="img/logo.png" style="margin-left:0px;margin-top:-15px;width:380px;height:170px;"></a>
      <div id="menu" class="nav nav-pills nav-fill nav-fixed" style="margin-left:380px;margin-top:-100px;">
        <div class="menu1">
          <a href="#" class="btn btn-lg btn-success botao" rel="prematricula">Fa&ccedil;a sua Pr&eacute;-Matr&iacute;cula</a>
        </div>
        <div class="menu1">
          <a href="#" class="btn btn-lg btn-warning botao" rel="consulta">Consulte sua Pr&eacute;-Matr&iacute;cula</a>
        </div>
        <div class="menu1">
          <a href="#" class="btn btn-lg btn-primary botao" rel="correcao">Correção da Inscrição</a>
        </div>              
        <div class="menu1">
          <a href="#" class="btn btn-lg btn-info botao" rel="lista-escolas">Escolas</a>
        </div>
        <div class="menu1">
          <a href="#" class="btn btn-lg btn-danger botao" rel="duvidas">D&uacute;vidas</a>
        </div>              
        <div class="clear"></div>
      </div> 
    </div>     
  </div>
  <div id="meio">
    <div class="conteudo conteudo-100 meio-bg">
      <div class="linha2"><!-- --></div>
      <div id="centro">
        <div class="caixa-12">
          <div class="chamada1">
            <p align="center"> Inscri&ccedil;&otilde;es: Iª Fase entre 18/11/2019  &agrave; 16/12/2019 e IIª Fase entre 21/01/2020 à 24/01/2020
            </p>
          </div>
        </div>
        <div class="caixa-7">
          <div><img src="fotos/foto1.jpg" width="540" height="366"></div>
        </div>
        <div class="caixa-5">
          <div class="chamada2">
            <p align="justify">A Matr&iacute;cula F&aacute;cil &eacute; destinada aos candidatos novos que desejam ingressar na Rede Municipal de Ensino de Itabora&iacute;.</p>
          </div>
          <div class="lista-series">                 
            <div class="tipo-ensino">Educação Infantil</div>
            <div class="lista-ensino">
              Creche<br> 
              Pré-escola<br>
            </div>

            <div class="tipo-ensino"><br>Ensino Fundamental</div>
            <div class="lista-ensino">

              Anos Iniciais (1&ordm; ao 5&ordm; ano)<br>
              Anos Finais (6&ordm; ao 9&ordm; ano)<br>

              EJA (I a V Fase)<br>
              EJA (VI a IX Fase)<br>
            </div>
          </div>
          <div class="space2"></div>
          <br>
          <br>
          <br>
          <p class="chamada2">Para iniciar o cadastro da pr&eacute;-matr&iacute;cula &eacute; necess&aacute;rio ter o CEP CORRETO em m&atilde;os.
          contato suportematriculas@itaborai.rj.gov.br</p>  
          <br>
          <br>
          <br>
        </div>  
        <div class="clear"></div>
        <div class="atencao">
          <div class="atencao-icon float-l">
              <img src="img/icon-atencao.png" width="50" height="50">
          </div>
          <span style="text-align:justify;">
             Sua aloca&ccedil;&atilde;o ser&aacute; divulgada a partir do dia 20/01/2020 no site <strong>www.seme.itaborai.rj.gov.br</strong>. Para alunos da Iª Fase. J&aacute;  para alunos da IIª Fase ser&aacute; no dia 30/01/2020. Todos os candidatos contemplados dever&atilde;o levar os documentos necess&aacute;rios para efetuar sua matr&iacute;cula.
          </span>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="linha4"></div>
      </div>
    </div>    
  </div><!-- MEIO --> 
  <div id="rodape">
    <div class="conteudo">
      <div class="caixa-12 center">Prefeitura Municipal de Itabora&iacute; - Secretaria Municipal de Educa&ccedil;&atilde;o</div>
    </div>
  </div><!-- RODAPÉ -->   
</div><!-- TUDO -->
</body>
</html>
