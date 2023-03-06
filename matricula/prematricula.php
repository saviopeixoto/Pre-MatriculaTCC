<?php
include('config.php');
die_alert_se_inscricao_fechada();

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
		<a href="mapaescolas.php" target="_blank" class="btn btn-info btn-lg btn-top">Escolas</a>
		<!--a href="#" class="btn btn-danger  btn-lg btn-top">Dúvidas</a-->
	</div>
</div>
<div class="container" style="margin-top:20px;">
  <h2 class="text-center">Preencha todos os campos para efetuar a pré-matrícula</h2>
  <p class="text-center">Apenas para novos candidatos que desejam ingressar na Rede Municipal de Ensino de Itaboraí. Dúvidas, entre em contato com <b>suportematriculas&#64;itaborai&#46;rj&#46;gov&#46;br</b></p>
  <br />
  <form id="mobase" action="#" name="mobase" method="post">
    <input class="form-control" type="hidden" id="mo01_codigo" name="mo01_codigo" value="" />
    <div class="panel panel-primary">
      <div class="panel-heading">DATA DE NASCIMENTO DO ALUNO</div>
      <div class="panel-body">
      <div class="row">
        <div class="col-md-12">        
          <div class="container-fluid">
			<div class="col-md-4">
			  <div class="form-group">
	            <label for="mo01_dtnasc">Data Nascimento*</label>
			    <input class="form-control" type="text" id="mo01_dtnasc" name="mo01_dtnasc" required="required" />
			  </div>					
		  	</div>
			<div class="col-md-4">
			  <div class="form-group">
 	            <label for="mo01_idade">Idade na data atual</label>
			    <input class="form-control" type="number" id="mo01_idade" name="mo01_idade" readonly="readonly" />
			  </div>					
			</div>
			<div class="col-md-4">
			  <div class="form-group">
 	            <label for="mo01_idadecorte">Idade na data corte 31/03/2023</label>
			    <input class="form-control" type="number" id="mo01_idadecorte" name="mo01_idadecorte" readonly="readonly" />
			  </div>					
			</div>			    
          </div> 
        </div>
       </div>
       </div> 
     </div>  
     <div class="panel panel-primary">
      <div class="panel-heading">DADOS PESSOAIS DO ALUNO</div>
      <div class="panel-body">      
       <div class="row">
         <div class="col-md-12">
           <div class="container-fluid">
			 <div class="col-md-12">
			   <div class="form-group">
 	             <label for="mo01_nome">Nome Completo do Aluno*</label>
	             <input class="form-control textoupper" type="text" id="mo01_nome" name="mo01_nome" required="required" maxlength="100" />
			   </div>					
			 </div>	 
           </div>	
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">
           <div class="container-fluid">
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_sexo">Sexo*</label>
	             <select class="form-control textoupper" id="mo01_sexo" name="mo01_sexo" required="required">
                   <option value="">- Escolha qual o sexo do candidato -</option>
                   <option value="M">Masculino</option>
			       <option value="F">Feminino</option>			             		             	
	             </select>
			   </div>					
			 </div>
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_cor">Cor/Etnia</label>
	             <select class="form-control textoupper" id="mo01_cor" name="mo01_cor">
                   <option value="">- Escolha cor/etnia do candidato -</option>
                   <option value="1">Branca</option>
                   <option value="2">Negra</option>
                   <option value="3">Parda</option>
                   <option value="4">Amarela</option>
                   <option value="5">Indigena</option>
                   <option value="6">Não Declarada</option>	             	
	             </select>
			   </div>					
			 </div>
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_estciv">Estado Civil*</label>
	             <select class="form-control textoupper" id="mo01_estciv" name="mo01_estciv" required="required"></select>
			   </div>					
			 </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">
           <div class="container-fluid">
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_nacion">Nacionalidade*</label>
	             <select class="form-control textoupper" id="mo01_nacion" name="mo01_nacion" required="required">
                   <option value="">- Escolha uma nacionalidade -</option>
               	   <option value="Brasileira">Brasileira</option>
			       <option value="Brasileira - Nascido no Exterior">Brasileira - Nascido no Exterior</option>
			       <option value="Brasileira - Naturalizado(a)">Brasileira - Naturalizado(a)</option>			             	
			       <option value="Portuguesa">Portuguesa</option>			             	
			       <option value="Estrangeira">Estrangeira</option>			             	
	             </select>
			   </div>					
			 </div>
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_ufnasc">UF Nascimento</label>
	             <select class="form-control textoupper" id="mo01_ufnasc" name="mo01_ufnasc" required="required"></select>
			   </div>					
			 </div>
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_munnasc">Município Nascimento</label>
	             <select class="form-control textoupper" id="mo01_munnasc" name="mo01_munnasc" required="required"></select>
			   </div>					
			 </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">
           <div class="container-fluid">
			 <div class="col-md-12">
			   <div class="form-group">
 	             <label for="mo01_mae">Nome M&atilde;e*</label>
	             <input class="form-control textoupper" type="text" id="mo01_mae" name="mo01_mae" required="required" maxlength="70" />
			   </div>					
			 </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">
           <div class="container-fluid">
			 <div class="col-md-12">
			   <div class="form-group">
 	             <label for="mo01_pai">Nome Pai</label>
	             <input class="form-control textoupper" type="text" id="mo01_pai" name="mo01_pai" maxlength="70" />
			   </div>					
			 </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">
           <div class="container-fluid">
			 <div class="col-md-12">
			   <div class="form-group">
	             <label for="mo01_tiporesp">Tipo Responsável*</label>
	             <select class="form-control textoupper" id="mo01_tiporesp" name="mo01_tiporesp" required="required"></select>
			   </div>					
			 </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">
           <div class="container-fluid">
			 <div class="col-md-12">
			   <div class="form-group">
	             <label for="mo01_nomeresp">Nome Responsável*</label>
	             <input class="form-control textoupper" type="text" id="mo01_nomeresp" name="mo01_nomeresp" required="required" maxlength="70" />
			   </div>					
			 </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">
           <div class="container-fluid">
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_cpfresp">CPF Responsável*</label>
	             <input class="form-control" type="text" id="mo01_cpfresp" name="mo01_cpfresp" required="required" />
			   </div>					
			 </div>
		     <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_cartaosus">Candidato possui Cartão do SUS?*</label>
	             <select class="form-control textoupper" id="mo01_cartaosus" name="mo01_cartaosus" required="required">
                   <option value="">- Escolha se possui cartão do SUS -</option>
			       <option value="1">Sim</option>
			       <option value="2">Não</option>			             				             
			     </select>
			   </div>					
		     </div>		     	     
		     <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_necess">Possui necessidades especiais?*</label>
	             <select class="form-control textoupper" id="mo01_necess" name="mo01_necess" required="required">
                   <option value="">- Escolha se possui necessidades especiais -</option>
			       <option value="1">Não</option>
			       <option value="2">Aluno</option>			    
			       <option value="3">Responsável</option>			    
			       <option value="4">Membro Familiar, Residente na casa candidato</option>			    
			     </select>
			   </div>					
		     </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">        
           <div class="container-fluid">
		     <div class="col-md-4">
		       <div class="form-group">
	             <label for="mo01_necesstipo">Qual?*</label>
	             <select class="form-control textoupper" id="mo01_necesstipo" name="mo01_necesstipo" required="required"></select>
			   </div>					
		     </div>
		     <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_bolsafamilia">O Responsável recebe Auxílio Brasil ou outro Programa Social?*</label>
	             <select class="form-control textoupper" id="mo01_bolsafamilia" name="mo01_bolsafamilia" required="required">
                   <option value="">- Escolha se o responsável é beneficiário de Programa Social -</option>
			       <option value="1">Sim</option>
			       <option value="2">Não</option>			             				             
			     </select>
			   </div>					
		     </div>
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_nomeresp">Número do NIS do Candidato</label>
	             <input class="form-control" type="text" id="mo01_nis" name="mo01_nis" required="required" maxlength="11" />
			   </div>					
			 </div>
            </div> 
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">        
           <div class="container-fluid">
		     <div class="col-md-4">
		       <div class="form-group">
	             <label for="mo01_tiposangue">Tipo Sanguineo</label>
	             <select class="form-control textoupper" id="mo01_tiposangue" name="mo01_tiposangue">
                   <option value="">- Escolha o Tipo Sanguineo -</option>
			       <option value="A">A</option>
			       <option value="B">B</option>			             				             
			       <option value="AB">AB</option>			             				             
			       <option value="O">O</option>			             				             	             	
	             </select>
			   </div>					
		     </div>
		     <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_gemeo">Possui irmão gêmeo?</label>
	             <select class="form-control textoupper" id="mo01_gemeo" name="mo01_gemeo" required="required">
                   <option value="">- Escolha uma opção -</option>
			       <option value="1">Sim</option>
			       <option value="0">Não</option>		             	             	             	
	             </select>
			   </div>					
		     </div>
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_fatorrh">Fator RH</label>
	             <select class="form-control textoupper" id="mo01_fatorrh" name="mo01_fatorrh">
                   <option value="">- Escolha o Fator RH -</option>
			       <option value="+">+ (Positivo)</option>
			       <option value="-">- (Negativo)</option>			             				             
			     </select>
			   </div>					
			 </div>
            </div> 
         </div>
       </div>
     </div>
	 </div>
     <div class="panel panel-primary">
      <div class="panel-heading">ESCOLARIDADE PRETENDIDA</div>
      <div class="panel-body">
       <div class="row">
         <div class="col-md-12">               
           <div class="container-fluid">
			 <div class="col-md-6">
			   <div class="form-group">
	             <label for="mo01_nivel">Nivel/Modalidade de Ensino*</label>
	             <select class="form-control textoupper" id="mo01_nivel" name="mo01_nivel" required="required"></select>
			   </div>					
			 </div>
			 <div class="col-md-6">
			   <div class="form-group">
			   </div>					
			 </div>
           </div>
         </div>      	
       </div>       
       <div class="row">
         <div class="col-md-12">               
           <div class="container-fluid">
			 <div class="col-md-3">
			   <div class="form-group">
	             <label for="mo01_etapai">Etapa/Fase*</label>
	             <select class="form-control textoupper" id="mo01_etapai" name="mo01_etapai" required="required"></select>
			   </div>					
			 </div>
			 <div class="col-md-6">
			   <div class="form-group">
 	             <label for="mo01_escolai">1&ordf; Op&ccedil;&atilde;o de Escola*</label>
	             <select class="form-control textoupper" id="mo01_escolai" name="mo01_escolai" required="required"></select>
			   </div>					
			 </div>			 
			 <div class="col-md-3">
			   <div class="form-group">
 	             <label for="mo01_irmaoi">Possui Irmão Matriculado?*</label>
	             <select class="form-control textoupper" id="mo01_irmaoi" name="mo01_irmaoi" required="required">
                   <option value="">Selecione</option>
			       <option value="1">Sim</option>
			       <option value="2">Não</option>
	             </select>
			   </div>					
			 </div>
           </div>
         </div>     	
       </div>
<div class="row" style="padding: 0 45px;">
	<div class="alert alert-warning" id="sem_etapa" style="color:black;display:none;"><b>Esta Unidade N&Atilde;O ATENDE esta etapa no momento. Selecione esta op&ccedil;&atilde;o caso deseje participar de um cadastro de demanda.</b></div>
</div>
<div class="row">
	<div class="col-md-12">               
		<div class="container-fluid">
			<div class="form-group">
				<div class="col-md-7">
					<div class="form-group" id="enderecoi" style="display:none;">
						<label>Endereço da escola:</label>
						<input class="form-control textoupper" type="text" id="mo01_enderecoi" name="mo01_enderecoi" readonly="readonly" />
					</div>					
				</div>				 
				<div class="col-md-5" >
					<label id="creche" for="creche" style="display:none;">Participou da pre-matr&iacute;cula de 2022 e n&atilde;o foi alocado?*</label>
					<select class="form-control textoupper" id="mo01_creche" name="mo01_creche" style="display: none;" required="required">
						<option value="">Selecione</option>
						<option value="1">Sim</option>
						<option value="2">Não</option>
					</select>
				</div>					
			</div>
		</div>     	
	</div>
</div>
       <div class="row"  style="position:relative;margin-top: 12px;" >
	   <p style="position: absolute;z-index: 1;padding: 2px 10px;top: -8px;left: 52px;font-weight: bold;background-color: #dbdbdb;border: 1px solid #b9b9b9;border-radius: 4px;">2ª opção de escola (opcional)</p>
         <div class="col-md-12">               
           <div class="container-fluid" style="border: 1px solid #c1c1c1;margin: 0 29px;border-radius: 3px;padding: 34px 0 20px 0;background-color: #ebebeb;">
			 <div class="col-md-3">
			   <div class="form-group">
	             <label for="mo01_etapaii">2° Opção da Etapa/Fase*</label>
	             <select class="form-control textoupper" id="mo01_etapaii" name="mo01_etapaii" ></select>
			   </div>					
			 </div>
			 <div class="col-md-6">
			   <div class="form-group">
 	             <label for="mo01_escolaii">2&ordf; Op&ccedil;&atilde;o de Escola*</label>
	             <select class="form-control textoupper" id="mo01_escolaii" name="mo01_escolaii" ></select>
			   </div>		
        <div class="row" style="display:none;" id="enderecoii">
         <div class="col-md-12">               
           <div class="container-fluid">
			 <div class="col-md-3">
			   <div class="form-group"></div>					
			 </div>
			 <div class="col-md-15">
			   <div class="form-group">
	             <input class="form-control textoupper" type="text" id="mo01_enderecoii" name="mo01_enderecoii" readonly="readonly" />
			   </div>					
			 </div>			 
           </div>
         </div>     	
       </div>			   
			 </div>
			 <div class="col-md-3">
			   <div class="form-group">
 	             <label for="mo01_irmaoii">Possui Irmão Matriculado?</label>
	             <select class="form-control textoupper" id="mo01_irmaoii" name="mo01_irmaoii">
                   <option value="">Selecione</option>
			       <option value="1">Sim</option>
			       <option value="2">Não</option>
	             </select>
			   </div>					
			 </div>
           </div>
         </div>     	
       </div>
    
       <!---<div class="row">
         <div class="col-md-12">               
           <div class="container-fluid">
			 <div class="col-md-3">
			   <div class="form-group">
	             <label for="mo01_etapaiii">Etapa/Fase</label>
	             <select class="form-control textoupper" id="mo01_etapaiii" name="mo01_etapaiii"></select>
			   </div>					
			 </div>
			 <div class="col-md-6">
			   <div class="form-group">
 	             <label for="mo01_escolaiii">3&ordf; Op&ccedil;&atilde;o de Escola</label>
	             <select class="form-control textoupper" id="mo01_escolaiii" name="mo01_escolaiii"></select>
			   </div>					
			 </div>
			 <div class="col-md-3">
			   <div class="form-group">
 	             <label for="mo01_irmaoiii">Possui Irmão Matriculado?</label>
	             <select class="form-control textoupper" id="mo01_irmaoiii" name="mo01_irmaoiii">
                   <option value="">Selecione</option>
			       <option value="1">Sim</option>
			       <option value="2">Não</option>
	             </select>
			   </div>					
			 </div>
           </div>
         </div>     	
       </div>
       <div class="row" style="display:none;" id="enderecoiii">
         <div class="col-md-12">               
           <div class="container-fluid">
			 <div class="col-md-3">
			   <div class="form-group"></div>					
			 </div>
			 <div class="col-md-9">
			   <div class="form-group">
	             <input class="form-control textoupper" type="text" id="mo01_enderecoiii" name="mo01_enderecoiii" readonly="readonly" />
			   </div>					
			 </div>			 
           </div>
         </div>     	
       </div>      
     </div>  --->
	 </div></div>
     <div class="panel panel-primary">
       <div class="panel-heading">REDE DE ORIGEM</div>
       <div class="panel-body">
       <div class="row">
         <div class="col-md-12">        
           <div class="container-fluid">
		 	 <div class="col-md-4">
			   <div class="form-group">
                 <label for="mo01_redeorigem">Rede de Ensino Origem*</label>
	             <select class="form-control textoupper" id="mo01_redeorigem" name="mo01_redeorigem" required="required"></select>
			   </div>					
		  	 </div>
			 <div class="col-md-4">
			   <div class="form-group">
	                 <label for="mo01_ufredeorigem">UF Escola Origem*</label>
	             <select class="form-control textoupper" id="mo01_ufredeorigem" name="mo01_ufredeorigem" required="required"></select>
			   </div>					
			 </div>
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_munredeorigem">Município Escola Origem*</label>
                 <select class="form-control textoupper" id="mo01_munredeorigem" name="mo01_munredeorigem" required="required"></select>   
			   </div>					
			 </div>			    
           </div> 
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">
           <div class="container-fluid">
			 <div class="col-md-12">
               <label>Escola de Origem*</label>
               <input class="form-control textoupper" type="text" id="mo01_escredeorigem" name="mo01_escredeorigem" maxlength="100" />
               <select class="form-control textoupper" id="mo01_ctbescredeorigem" name="mo01_ctbescredeorigem" style="display:none;"></select>
             </div>
           </div>
         </div>               
       </div>
       </div>
     </div>  
     <div class="panel panel-primary">
       <div class="panel-heading">DOCUMENTOS</div>
       <div class="panel-body">
       <div class="row">
         <div class="col-md-12">        
           <div class="container-fluid">
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_certidaotipo">Tipo Certid&atilde;o*</label>
	             <select class="form-control textoupper" id="mo01_certidaotipo" name="mo01_certidaotipo" required="required">
			       <option value="">- Escolha o tipo de certid&atilde;o -</option>
			       <option value="0">N&atilde;o Possui</option>
			       <option value="1">Nascimento</option>
			       <option value="2">Casamento</option>
			     </select>
			   </div>					
			 </div>
			 <div class="col-md-4">
			   <div class="form-group">
			   </div>					
			 </div>			    
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_certidaomod">Modelo Certid&atilde;o*</label>
	             <select class="form-control textoupper" id="mo01_certidaomod" name="mo01_certidaomod" required="required">
			       <option value="">- Escolha o modelo de certid&atilde;o -</option>
			       <option value="1">Antigo</option>
			       <option value="2">Novo</option>			             	
			     </select>
			   </div>					
			 </div>
           </div> 
         </div>
       </div>  
       <div id="certidaoantiga" class="row" style="display:none;">
         <div class="col-md-12">        
           <div class="container-fluid">
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_certidaolivro">N&ordm; Livro*</label>
                 <input class="form-control textoupper" type="text" id="mo01_certidaolivro" name="mo01_certidaolivro" maxlength="8" />
			   </div>					
			 </div>			    
		     <div class="col-md-4">
			   <div class="form-group">
                 <label for="mo01_certidaofolha">N&ordm; Folha*</label>
                 <input class="form-control textoupper" type="text" id="mo01_certidaofolha" name="mo01_certidaofolha" maxlength="4"/>
			   </div>					
		     </div>
		     <div class="col-md-4">
			   <div class="form-group">
                 <label for="mo01_certidaonum">N&ordm; Termo*</label>
                 <input class="form-control textoupper" type="text" id="mo01_certidaonum" name="mo01_certidaonum" maxlength="8" />
			   </div>					
		     </div>			    
           </div> 
         </div>
       </div>
       <div id="certidaonova" class="row">
         <div class="col-md-12">        
           <div class="container-fluid">
		     <div class="col-md-12">
			   <div class="form-group">
	             <label for="mo01_certidaomatricula">N&ordm; Matricula(Certidão Nova)*</label>
	             <input class="form-control" type="text" id="mo01_certidaomatricula" name="mo01_certidaomatricula" />
			   </div>					
		     </div>			    
           </div> 
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">        
           <div class="container-fluid">
		     <div class="col-md-4">
			   <div class="form-group">
                 <label for="mo01_ufcartcert">UF Certid&atilde;o*</label>
                 <select class="form-control textoupper" id="mo01_ufcartcert" name="mo01_ufcartcert"></select>
			   </div>					
		     </div>
		     <div class="col-md-4">
		       <div class="form-group">
	             <label for="mo01_muncartcert">Municipio Certid&atilde;o*</label>
	             <select class="form-control textoupper" id="mo01_muncartcert" name="mo01_muncartcert"></select>
			   </div>					
		     </div>
		     <div class="col-md-4">
			   <div class="form-group">
                 <label for="mo01_cpf">CPF Aluno</label>
	             <input class="form-control" type="text" id="mo01_cpf" name="mo01_cpf" />
			   </div>					
		     </div>
           </div> 
         </div>
       </div>
       </div>
     </div>  
     <div class="panel panel-primary">
       <div class="panel-heading">RESID&Ecirc;NCIA / CONTATO</div>
       <div class="panel-body">
       <div class="row">
         <div class="col-md-12">
           <div class="container-fluid">
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_cep">Cep*</label>
	             <input class="form-control" type="text" id="mo01_cep" name="mo01_cep" required="required" />	             
			   </div>					
			 </div>
           </div>         
         </div>       
       </div>
       <div class="row">
         <div class="col-md-12">
           <div class="container-fluid">
			 <div class="col-md-3">
			   <div class="form-group">
	             <label for="mo01_tipoend">Tipo Logradouro*</label>
	             <select class="form-control textoupper" id="mo01_tipoend" name="mo01_tipoend" required="required"></select>
			   </div>					
			 </div>
			 <div class="col-md-9">
			   <div class="form-group">
	             <label for="mo01_ender">Logradouro*</label>
	             <select class="form-control textoupper" id="mo01_ender" name="mo01_ender" required="required"></select>
	             <input class="form-control textoupper" id="mo01_nomeend" name="mo01_nomeend" style="display:none;" />
			   </div>					
			 </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">
           <div class="container-fluid">
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_numero">Número</label>
	             <input class="form-control" type="text" id="mo01_numero" name="mo01_numero" maxlength="10" />
			   </div>					
			 </div>
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_bairro">Bairro*</label>
	             <select class="form-control textoupper" id="mo01_bairro" name="mo01_bairro" required="required"></select>
	             <input class="form-control textoupper" id="mo01_nomebair" name="mo01_nomebair" style="display:none;" />
			   </div>					
			 </div>
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_compl">Complemento</label>
	             <input type="text" class="form-control textoupper" id="mo01_compl" name="mo01_compl" />
			   </div>					
			 </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">
           <div class="container-fluid">
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_uf">UF*</label>
	             <select class="form-control textoupper" id="mo01_uf" name="mo01_uf" required="required"></select>
			   </div>					
			 </div>
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_">Cidade*</label>
	             <select class="form-control textoupper" id="mo01_municip" name="mo01_municip" required="required"></select>
			   </div>					
			 </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">
           <div class="container-fluid">
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_telresp">Tel. Celular 1*</label>
	             <input class="form-control" type="text" id="mo01_telef" name="mo01_telef" required="required" />
			   </div>					
			 </div>
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_telcel">Tel. Celular 2*</label>
	             <input class="form-control" type="text" id="mo01_telcel" name="mo01_telcel" required="required" />
			   </div>					
			 </div>
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_telcom">Tel. Comercial Fixo</label>
	             <input class="form-control" type="text" id="mo01_telcom" name="mo01_telcom" />
			   </div>					
			 </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">
           <div class="container-fluid">
			 <div class="col-md-12">
			   <div class="form-group">
 	             <label for="mo01_email">E-mail</label>
	             <input class="form-control" type="text" id="mo01_email" name="mo01_email" />
			   </div>					
			 </div>
           </div>
         </div>
       </div>
       </div>
     </div>  
	<center>
		<button type="submit" class="btn btn-lg btn-success" name="btn-salvar" id="btn-salvar"> 
			<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Cadastrar
		</button>
	</center>
	<br><br><br>
    <!--div class="panel panel-primary">
       <div class="panel-body">
         <div class="form-group" align="center">

	       <!--button type="reset" class="btn btn-lg btn-danger"> 
	         <span class="glyphicon glyphicon-remove" aria-hidden="true" name="btn-limpar"></span> Cancelar
	       </button- ->
	     </div>
	   </div>
	 </div>  
     <div class="panel panel-primary">
       <div class="panel-body">
	   	  <div id="alerta-success" style="display:none;text-align:center;font-size:20px;"></div>
	   </div>
	 </div-->  
  </form>  
  <!-- Janela Confirmação Modal -->
  <div class="modal fade" id="matricula-modal" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Confirmação de Pré-Matrícula</h4>
        </div>
        <div class="modal-body">
          <p id="matricula-msg1"></p>
          <p id="matricula-msg2"></p>
          <p id="matricula-msg3"></p>
          <p id="matricula-msg4"></p>
          <p id="matricula-msg5"></p>
          <p id="matricula-msg6"></p>
          <p id="matricula-msg7"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="btn-imprimir">Imprimir Protocolo</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div> 
</div>
</div>
</div>
<?php
include('skin/footer.php');
