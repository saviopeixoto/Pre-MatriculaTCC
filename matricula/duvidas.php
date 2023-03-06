<?php
require_once("libs/db_stdlib.php");
require_once("libs/db_conn.php");
require_once("libs/db_conecta.php");
require_once("libs/db_utils.php");
require_once("libs/db_funcoes.php");

$duvida01 = "";
$duvida02 = "";
$duvida03 = "";
$duvida04 = "";
$iInstit  = 1;

$sSqlParagrafo_1 = "select db_paragrafo.* from db_documento
                       inner join db_docparag on db03_docum = db04_docum
                       inner join db_paragrafo on db04_idparag = db02_idparag
                    where db03_tipodoc = 5027 and db02_idparag = 181 and db03_instit  = " . $iInstit . "
                       order by db02_descr";

$rsParagrafo_1 = db_query($sSqlParagrafo_1);
if (pg_numrows($rsParagrafo_1)>0) {
   db_fieldsmemory($rsParagrafo_1, 0);
   $duvida01 = utf8_encode($db02_texto);
} else {
   $duvida01 = "Nao encontrada";
}

$sSqlParagrafo_2 = "select db_paragrafo.* from db_documento
                       inner join db_docparag on db03_docum = db04_docum
                       inner join db_paragrafo on db04_idparag = db02_idparag
                    where db03_tipodoc = 5027 and db02_idparag = 182 and db03_instit  = " . $iInstit . "
                       order by db02_descr";

$rsParagrafo_2 = db_query($sSqlParagrafo_2);
if (pg_numrows($rsParagrafo_2)>0) {
   db_fieldsmemory($rsParagrafo_2, 0);
   $duvida02 = utf8_encode($db02_texto);
} else {
   $duvida02 = "Nao encontrada";  
}

$sSqlParagrafo_3 = "select db_paragrafo.* from db_documento
                       inner join db_docparag on db03_docum = db04_docum
                       inner join db_paragrafo on db04_idparag = db02_idparag
                    where db03_tipodoc = 5027 and db02_idparag = 183 and db03_instit  = " . $iInstit . "
                       order by db02_descr";

$rsParagrafo_3 = db_query($sSqlParagrafo_3);
if (pg_numrows($rsParagrafo_3) > 0) {
   db_fieldsmemory($rsParagrafo_3, 0);
   $duvida03 = utf8_encode($db02_texto);
}

$sSqlParagrafo_4 = "select db_paragrafo.* from db_documento
                       inner join db_docparag on db03_docum = db04_docum
                       inner join db_paragrafo on db04_idparag = db02_idparag
                    where db03_tipodoc = 5027 and db02_idparag = 184 and db03_instit  = " . $iInstit . "
                       order by db02_descr";

$rsParagrafo_4 = db_query($sSqlParagrafo_4);
if (pg_numrows($rsParagrafo_4)>0) {
   db_fieldsmemory($rsParagrafo_4, 0);
   $duvida04 = utf8_encode($db02_texto);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Secretaria de Educação - Matricula Facil</title>
<!--[if !lte IE 8]><!-->
<link rel="stylesheet" href="css/config.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/estilo.css" type="text/css" media="screen">
<!--<![endif]-->
<!--[if lte IE 8]><!-->
<link rel="stylesheet" href="css/config_ie.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/estilo_ie.css" type="text/css" media="screen">
<!--<![endif]-->
<link rel="stylesheet" href="css/duvidas.css" type="text/css" media="screen">
<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript" src="js/belatedPNG.js" ></script>
<script type="text/javascript">
jQuery(document).ready(function() {
   DD_belatedPNG.fix('.png');
   $('a.duvidas').click(function() {
       var exibe = $(this).attr('rel');
       if (exibe == 'resolucao') {
          var iframe = '\
          <h2>Resolução:</h2>\
          <div class="linha5"></div>\
          <iframe src="pdf/'+exibe+'_2019.pdf" name="duvida" width="600" height="650"></iframe>';
          $('.exibe').html(iframe);          
       } else if (exibe == 'procedimentos') {
          var iframe = '\
          <h2>Procedimentos e Documentação</h2>\
          <div class="linha5"></div>\
          <iframe src="pdf/'+exibe+'_2019.pdf" name="duvida" width="600" height="650"></iframe>';
          $('.exibe').html(iframe);
       } else if (exibe == 'polos_atendimento') {
          var iframe = '\
          <h2>Polos de Atendimento</h2>\
          <div class="linha5"></div>\
          <iframe src="pdf/'+exibe+'_2019.pdf" name="duvida" width="600" height="650"></iframe>';
          $('.exibe').html(iframe);          
       } else if (exibe == 'duvidas') {
          var iframe = '\
          <h2>Tire aqui todas as suas duvidas sobre o Matrícula Fácil.</h2>\
          <div class="linha5"></div>\
          <iframe src="pdf/'+exibe+'_2019.pdf" name="duvida" width="600" height="650"></iframe>';
          $('.exibe').html(iframe);          
       } else if (exibe == 'calendario') {
          var iframe = '\
          <h2>Calendário</h2>\
          <div class="linha5"></div>\
          <iframe src="pdf/'+exibe+'_2019.pdf" name="duvida" width="600" height="650"></iframe>';
          $('.exibe').html(iframe);
       } else if (exibe == 'fases') {                 
          var iframe = '\
          <h2>Fases</h2>\
          <div class="linha5"></div>\
          <iframe src="pdf/'+exibe+'_2019.pdf" name="fase" width="600" height="650"></iframe>';
          $('.exibe').html(iframe);
       } else if (exibe == 'etapa') {                 
      }
      return false;
   });
});
</script>
</head>
<body>
<div id="tudo">
  <div id="meio">
    <div class="conteudo conteudo-100 meio-bg">
       <div class="linha2"></div>
       <div class="caixa-4">
        <div class="coluna">
          <h4>O que deseja saber?</h4>
          <div class="linha3"></div>
          <ul class="menu-duvidas">
            <li><a href="#" class="duvidas" rel="fases"><span>» </span>Fases</a></li>
            <li><a href="#" class="duvidas" rel="resolucao"><span>» </span>Sobre a Resolução</a></li>
            <li><a href="#" class="duvidas" rel="duvidas"><span>» </span>Tirar Dúvidas</a></li>
            <li><a href="#" class="duvidas" rel="procedimentos"><span>» </span>Procedimentos e Documentação</a></li>
            <li><a href="#" class="duvidas" rel="polos_atendimento"><span>» </span>Polos de Atendimento</a></li>
            <li><a href="#" class="duvidas" rel="calendario"><span>» </span>Calendário</a></li>
          </ul>
        </div>
      </div>
      <div class="caixa-8">
        <div class="coluna">
          <div class="exibe">
            <h2>Fases</h2>
            <div class="linha5"></div>
             <iframe src="pdf/fases_2019.pdf" name="fase" width="600" height="650"></iframe>
          </div>
        </div>
      </div>
      <div class="clear"></div>        
    </div> 
  </div><!-- MEIO -->
</div><!-- TUDO -->
</body>
</html>
