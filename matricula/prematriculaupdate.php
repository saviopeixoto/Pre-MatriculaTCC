<?php 

$sDataHoje   = date('Y-m-d');
$sDataInicio = date('2019-11-18');
$sDataFim    = date('2019-12-16');

if (strtotime($sDataHoje)<strtotime($sDataInicio) || strtotime($sDataHoje)>strtotime($sDataFim)) {
   echo "<script>alert('Periodo de Pre Matricula Alteracao foi ENCERRADO!'); location='index.php';</script>";
}  

$mo01_codigo   = $_POST['mo01_codigo']; 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Secretaria de Educa&ccedil;&atilde;o - Matricula Facil</title>

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
<script type="text/javascript" src="js/mask.js"></script>
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
        <h2 style="text-align: center;">Altere os campos para efetuar e depois click no botão Salvar</h2>
      </div>
    </div>    
  </div>
  <br/>
  <form id="mobase" action="#" name="mobase" method="post">
    <input class="form-control" type="hidden" id="mo01_codigo" name="mo01_codigo" value="<?=$mo01_codigo?>" />
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
 	          <label for="mo01_idadecorte">Idade na data corte 31/03/2020</label>
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
              <input class="form-control" type="hidden" id="mo01_estadocivil" name="mo01_estadocivl" />
	           <label for="mo01_estciv">Estado Civil*</label>
              <select class="form-control textoupper" id="mo01_estciv" name="mo01_estciv" required="required">
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
              <input class="form-control" type="hidden" id="mo01_nacional" name="mo01_nacional" />
	           <label for="mo01_nacion">Nacionalidade*</label>
	           <select class="form-control textoupper" id="mo01_nacion" name="mo01_nacion" required="required">
                 <option value="">- Escolha uma nacionalidade -</option>
              	  <option value="BRASILEIRA">Brasileira</option>
   			     <option value="BRASILEIRA - NASCIDO NO EXTERIOR">Brasileira - Nascido no Exterior</option>
   			     <option value="BRASILEIRA - NATURALIZADO(A)">Brasileira - Naturalizado(a)</option>	             	
   			     <option value="PORTUGUESA">Portuguesa</option>
   			     <option value="ESTRANGEIRA">Estrangeira</option>		
	           </select>
			   </div>					
			 </div>
			 <div class="col-md-4">
			   <div class="form-group">
              <input class="form-control" type="hidden" id="mo01_ufnascimento" name="mo01_ufnascimento" />
              <label for="mo01_ufnasc">UF Nascimento</label>
	           <select class="form-control textoupper" id="mo01_ufnasc" name="mo01_ufnasc" required="required">
              </select>
			   </div>					
			 </div>
			 <div class="col-md-4">
			   <div class="form-group">
              <input class="form-control" type="hidden" id="mo01_municnascimento" name="mo01_municnascimento" />
	           <label for="mo01_munnasc">Município Nascimento</label>
	           <select class="form-control textoupper" id="mo01_munnasc" name="mo01_munnasc" required="required">
	           </select>
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
                 <input class="form-control" type="hidden" id="mo01_tiporesponsavel" name="mo01_tiporesponsavel" />
	              <label for="mo01_tiporesp">Tipo Responsável*</label>
	              <select class="form-control textoupper" id="mo01_tiporesp" name="mo01_tiporesp" required="required">
	             </select>
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
                   <option value="">- Escolha se possui necessidades especiais -
                   </option>
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
                 <input class="form-control" type="hidden" id="mo01_necessidade" name="mo01_necessidade" />
	              <label for="mo01_necesstipo">Qual?*</label>
	              <select class="form-control textoupper" id="mo01_necesstipo" name="mo01_necesstipo" required="required">
	              </select>
			      </div>					
		       </div>
		       <div class="col-md-4">
			      <div class="form-group">
	              <label for="mo01_bolsafamilia">O Responsável recebe Bolsa Família?*</label>
	              <select class="form-control textoupper" id="mo01_bolsafamilia" name="mo01_bolsafamilia" required="required">
                   <option value="">- Escolha se o responsável recebe bolsa família -</option>
   			       <option value="1">Sim</option>
   			       <option value="2">Não</option>
			        </select>
			      </div>					
		       </div>
			    <div class="col-md-4">
			      <div class="form-group">
	              <label for="mo01_nomeresp">Número do NIS do Candidato</label>
	              <input class="form-control" type="text" id="mo01_nis" name="mo01_nis" maxlength="11" />
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
     <div class="panel panel-primary">
      <div class="panel-heading">ESCOLARIDADE PRETENDIDA</div>
      <div class="panel-body">
       <div class="row">
         <div class="col-md-12">               
           <div class="container-fluid">
			 <div class="col-md-6">
			   <div class="form-group">
              <input class="form-control" type="hidden" id="mo01_nivelescolar" name="mo01_nivelescolar" />
	           <label for="mo01_nivel">Nivel/Modalidade de Ensino*</label>
	           <select class="form-control textoupper" id="mo01_nivel" name="mo01_nivel" required="required">
	           </select>
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
              <input class="form-control" type="hidden" id="mo01_etapa1" name="mo01_etapa1" />
              <label for="mo01_etapai">Etapa/Fase*</label>
	           <select class="form-control textoupper" id="mo01_etapai" name="mo01_etapai" required="required">
	           </select>
			   </div>					
			 </div>
			 <div class="col-md-6">
			   <div class="form-group">
              <input class="form-control" type="hidden" id="mo01_escola1" name="mo01_escola1" />
 	           <label for="mo01_escolai">1&ordf; Op&ccedil;&atilde;o de Escola*</label>
	           <select class="form-control textoupper" id="mo01_escolai" name="mo01_escolai" required="required">
              </select>
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
       <div class="row" style="display:none;" id="enderecoi">
         <div class="col-md-12">               
           <div class="container-fluid">
			    <div class="col-md-3">
			      <div class="form-group"></div>					
			    </div>
			    <div class="col-md-9">
			      <div class="form-group">
	              <input class="form-control textoupper" type="text" id="mo01_enderecoi" name="mo01_enderecoi" readonly="readonly"  />
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
              <input class="form-control" type="hidden" id="mo01_etapa2" name="mo01_etapa2" />
              <label for="mo01_etapai">Etapa/Fase*</label>
              <select class="form-control textoupper" id="mo01_etapaii" name="mo01_etapaii" required="required">
              </select>
            </div>               
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input class="form-control" type="hidden" id="mo01_escola2" name="mo01_escola2" />
              <label for="mo01_escolai">2&ordf; Op&ccedil;&atilde;o de Escola*</label>
              <select class="form-control textoupper" id="mo01_escolaii" name="mo01_escolaii" required="required">
              </select>
            </div>               
          </div>         
          <div class="col-md-3">
            <div class="form-group">
              <label for="mo01_irmaoi">Possui Irmão Matriculado?*</label>
              <select class="form-control textoupper" id="mo01_irmaoii" name="mo01_irmaoii" required="required">
                <option value="">Selecione</option>
                <option value="1">Sim</option>
                <option value="2">Não</option>
              </select>
            </div>               
          </div>
           </div>
         </div>      
       </div>
       <div class="row" style="display:none;" id="enderecoii">
         <div class="col-md-12">               
           <div class="container-fluid">
             <div class="col-md-3">
               <div class="form-group"></div>               
             </div>
             <div class="col-md-9">
               <div class="form-group">
                 <input class="form-control textoupper" type="text" id="mo01_enderecoii" name="mo01_enderecoii" readonly="readonly" />
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
              <input class="form-control" type="hidden" id="mo01_etapa3" name="mo01_etapa3" />
              <label for="mo01_etapai">Etapa/Fase*</label>
              <select class="form-control textoupper" id="mo01_etapaiii" name="mo01_etapaiii" required="required">
              </select>
            </div>               
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input class="form-control" type="hidden" id="mo01_escola3" name="mo01_escola3" />
              <label for="mo01_escolai">3&ordf; Op&ccedil;&atilde;o de Escola</label>
              <select class="form-control textoupper" id="mo01_escolaiii" name="mo01_escolaiii" required="required">
              </select>
            </div>               
          </div>         
          <div class="col-md-3">
            <div class="form-group">
              <label for="mo01_irmaoi">Possui Irmão Matriculado?*</label>
              <select class="form-control textoupper" id="mo01_irmaoiii" name="mo01_irmaoiii" required="required">
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
     </div>  
     <div class="panel panel-primary">
       <div class="panel-heading">REDE DE ORIGEM</div>
       <div class="panel-body">
       <div class="row">
         <div class="col-md-12">        
           <div class="container-fluid">
		 	    <div class="col-md-4">
			      <div class="form-group">
                 <input class="form-control" type="hidden" id="mo01_rededeorigem" name="mo01_rededeorigem" />
                 <label for="mo01_redeorigem">Rede de Ensino Origem*</label>
	              <select class="form-control textoupper" id="mo01_redeorigem" name="mo01_redeorigem" required="required">
	              </select>
			      </div>					
		  	    </div>
			    <div class="col-md-4">
			      <div class="form-group">
                 <input class="form-control" type="hidden" id="mo01_ufrededeorigem" name="mo01_ufrededeorigem" />
	              <label for="mo01_ufredeorigem">UF Escola Origem*</label>
	              <select class="form-control textoupper" id="mo01_ufredeorigem" name="mo01_ufredeorigem" required="required">
	             </select>
			   </div>					
			 </div>
			 <div class="col-md-4">
			   <div class="form-group">
              <input class="form-control" type="hidden" id="mo01_municrededeorigem" name="mo01_municrededeorigem" />
	           <label for="mo01_munredeorigem">Município Escola Origem*</label>
              <select class="form-control textoupper" id="mo01_munredeorigem" name="mo01_munredeorigem" required="required">
              </select>   
			   </div>					
			 </div>			    
           </div> 
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">
           <div class="container-fluid">
			    <div class="col-md-12">
               <input class="form-control" type="hidden" id="mo01_escolaredeorigem" name="mo01_escolaredeorigem" />
               <input class="form-control" type="hidden" id="mo01_ctbescolaredeorigem" name="mo01_ctbescolaredeorigem" />
               <label>Escola de Origem*</label>
               <input class="form-control textoupper" type="text" id="mo01_escredeorigem" name="mo01_escredeorigem" maxlength="100" />
               <select class="form-control textoupper" id="mo01_ctbescredeorigem" name="mo01_ctbescredeorigem" style="display:none;">               	
               </select>
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
			       <option value="">- Escolha o modelo de certid&atilde;o -
			       </option>
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
                 <input class="form-control" type="hidden" id="mo01_ufcertidao" name="mo01_ufcertidao" />
                 <label for="mo01_ufcartcert">UF Certid&atilde;o*</label>
                 <select class="form-control textoupper" id="mo01_ufcartcert" name="mo01_ufcartcert">
                 </select>
	     		   </div>					
		       </div>
		       <div class="col-md-4">
		         <div class="form-group">
                 <input class="form-control" type="hidden" id="mo01_municcertidao" name="mo01_municcertidao" />
   	           <label for="mo01_muncartcert">Municipio Certid&atilde;o*</label>
   	           <select class="form-control textoupper" id="mo01_muncartcert" name="mo01_muncartcert">
	              </select>
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
             <div class="col-md-4">
             </div>
             <div class="col-md-4">
               <div class="form-group">
                 <input class="form-control" type="hidden" id="mo01_tipolograd" name="mo01_tipolograd" />
                 <label for="mo01_tipoend">Tipo Logradouro*</label>
                 <select class="form-control textoupper" id="mo01_tipoend" name="mo01_tipoend" required="required">
                 </select>
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
                 <input class="form-control" type="hidden" id="mo01_lograd" name="mo01_lograd" />
   	           <label for="mo01_ender">Logradouro*</label>
   	           <select class="form-control textoupper" id="mo01_ender" name="mo01_ender" required="required" />
                 </select>
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
              <input class="form-control" type="hidden" id="mo01_codbairro" name="mo01_codbairro" />
	           <label for="mo01_bairro">Bairro*</label>
	           <select class="form-control textoupper" id="mo01_bairro" name="mo01_bairro" required="required" />
              </select>
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
                 <input class="form-control" type="hidden" id="mo01_estado" name="mo01_estado" />
	              <label for="mo01_uf">UF*</label>
	              <select class="form-control textoupper" id="mo01_uf" name="mo01_uf" required="required">
	              </select>
			      </div>					
			    </div>
			    <div class="col-md-4">
			      <div class="form-group">
                 <input class="form-control" type="hidden" id="mo01_municipio" name="mo01_municipio" />
	              <label for="mo01_">Cidade*</label>
	              <select class="form-control textoupper" id="mo01_municip" name="mo01_municip" required="required">
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
	             <label for="mo01_telresp">Tel. Resid. Fixo</label>
	             <input class="form-control" type="text" id="mo01_telef" name="mo01_telef" />
			   </div>					
			 </div>
			 <div class="col-md-4">
			   <div class="form-group">
	             <label for="mo01_telcel">Tel. Celular*</label>
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
     <div class="panel panel-primary">
       <div class="panel-body">
         <div class="form-group" align="center">
	       <button type="submit" class="btn btn-lg btn-success" name="btn-salvar" id="btn-salvar"> 
	         <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Salvar
	       </button>
	       <button type="reset" class="btn btn-lg btn-danger"> 
	         <span class="glyphicon glyphicon-remove" aria-hidden="true" name="btn-limpar"></span> Cancelar
	       </button>
	     </div>
	   </div>
	 </div>  
     <div class="panel panel-primary">
       <div class="panel-body">
	   	  <div id="alerta-success" style="display:none;text-align:center;font-size:20px;"></div>
	   </div>
	 </div>  
  </form>  
  <!-- Janela Confirmação Modal -->
  <div class="modal fade" id="matriculaupdate-modal" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Confirmação de Pré-Matrícula</h4>
        </div>
        <div class="modal-body">
          <p id="matriculaupdate-msg1"></p>
          <p id="matriculaupdate-msg2"></p>
          <p id="matriculaupdate-msg3"></p>
          <p id="matriculaupdate-msg4"></p>
          <p id="matriculaupdate-msg5"></p>
          <p id="matriculaupdate-msg6"></p>
          <p id="matriculaupdate-msg7"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="btn-imprimirupdate">Imprimir Protocolo</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div> 
</div>
</body>
</html>
