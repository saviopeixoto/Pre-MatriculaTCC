<?php

class cl_mobase  {
   var $query_sql  = null; 
   var $numrows    = 0; 
   var $numrows_incluir = 0; 
   var $numrows_alterar = 0; 
   var $numrows_excluir = 0; 
   var $erro_status= null; 
   var $erro_sql   = null; 
   var $erro_banco = null;  
   var $erro_msg   = null;  
   var $erro_campo = null;  
   var $pagina_retorno = null; 

   // cria variaveis do arquivo 
   var $mo01_codigo = 0; 
   var $mo01_dtnasc_dia = null; 
   var $mo01_dtnasc_mes = null; 
   var $mo01_dtnasc_ano = null; 
   var $mo01_dtnasc = null; 
   var $mo01_idade = 0;
   var $mo01_idadecorte = 0;
   var $mo01_nome = null;
   var $mo01_sexo = null;
   var $mo01_cor  = 0;
   var $mo01_estciv = 0;
   var $mo01_nacion = null;
   var $mo01_ufnasc = 0;
   var $mo01_munnasc = 0;
   var $mo01_mae = null;
   var $mo01_pai = null;
   var $mo01_tiporesp = null;
   var $mo01_nomeresp = null;
   var $mo01_cpfresp  = null;
   var $mo01_bolsafamilia = null;
   var $mo01_necess = 0;
   var $mo01_necesstipo = 0;
   var $mo01_cartaosus = 0;
   var $mo01_nivel = 0;
   var $mo01_ciclo = 0;
   var $mo01_redeorigem = 0;
   var $mo01_ufredeorigem = null;
   var $mo01_munredeorigem = 0;
   var $mo01_escredeorigem = null;
   var $mo01_ctbescredeorigem = 0;
   var $mo01_certidaotipo = 0;
   var $mo01_certidaomod = 0;
   var $mo01_certidaolivro = null;
   var $mo01_certidaofolha = null;
   var $mo01_certidaonum = null;
   var $mo01_certidaomatricula = null;
   var $mo01_cpf = null;
   var $mo01_ufcartcert = 0;
   var $mo01_muncartcert = 0;
   var $mo01_tipoend = 0;
   var $mo01_ender = null;
   var $mo01_numero = null;
   var $mo01_bairro = 0;
   var $mo01_cep = null;
   var $mo01_uf = null;
   var $mo01_municip = null;
   var $mo01_telef   = null;
   var $mo01_telcel  = null;
   var $mo01_telcom  = null;
   var $mo01_email   = null;
   var $mo01_tiposangue = null;
   var $mo01_fatorrh    = null;   
   var $mo01_tipo       = null;
   var $mo01_fase = 0;
   var $mo01_gemeo = 0;
   var $mo01_creche = 0;

   // cria propriedade com as variaveis do arquivo 
   var $campos = "";

   //funcao construtor da classe 
   function cl_mobase() { 
//     $this->pagina_retorno =  basename($GLOBALS["HTTP_SERVER_VARS"]["PHP_SELF"]);
     $this->pagina_retorno =  basename($_SERVER["SCRIPT_NAME"]);
   }
   //funcao erro 
   function erro($mostra,$retorna) { 
     if(($this->erro_status == "0") || ($mostra == true && $this->erro_status != null )){
        echo "<script>alert(\"".$this->erro_msg."\");</script>";
        if($retorna==true){
           echo "<script>location.href='".$this->pagina_retorno."'</script>";
        }
     }
   }

   // funcao para atualizar campos
   function atualizacampos($exclusao=false) {
     if($exclusao==false){
       $this->mo01_codigo = ($this->mo01_codigo == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_codigo"]:$this->mo01_codigo);
       if($this->mo01_dtnasc == ""){
         $this->mo01_dtnasc_dia = substr($this->mo01_dtnasc,0,2);
         $this->mo01_dtnasc_mes = substr($this->mo01_dtnasc,3,2);
         $this->mo01_dtnasc_ano = substr($this->mo01_dtnasc,6,4);
         $this->mo01_dtnasc = $this->mo01_dtnasc."-".$this->mo01_dtnasc_mes."-".$this->mo01_dtnasc_dia;
       }
       $this->mo01_idade = ($this->mo01_idade == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_idade"]:$this->mo01_idade);
       $this->mo01_idadecorte = ($this->mo01_idadecorte == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_idadecorte"]:$this->mo01_idadecorte);
       $this->mo01_nome = ($this->mo01_nome == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_nome"]:$this->mo01_nome);
       $this->mo01_sexo = ($this->mo01_sexo == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_sexo"]:$this->mo01_sexo);
       $this->mo01_cor = ($this->mo01_cor == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_cor"]:$this->mo01_cor);
       $this->mo01_estciv = ($this->mo01_estciv == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_estciv"]:$this->mo01_estciv);
       $this->mo01_nacion = ($this->mo01_nacion == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_nacion"]:$this->mo01_nacion);
       $this->mo01_ufnasc = ($this->mo01_ufnasc == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_ufnasc"]:$this->mo01_ufnasc);
       $this->mo01_munnasc = ($this->mo01_munnasc == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_munnasc"]:$this->mo01_munnasc);
       $this->mo01_mae = ($this->mo01_mae == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_mae"]:$this->mo01_mae);
       $this->mo01_pai = ($this->mo01_pai == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_pai"]:$this->mo01_pai);
       $this->mo01_tiporesp = ($this->mo01_tiporesp == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_tiporesp"]:$this->mo01_tiporesp);
       $this->mo01_nomeresp = ($this->mo01_nomeresp == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_nomeresp"]:$this->mo01_nomeresp);
       $this->mo01_cpfresp = ($this->mo01_cpfresp == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_cpfresp"]:$this->mo01_cpfresp);
       $this->mo01_bolsafamilia = ($this->mo01_bolsafamilia == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_bolsafamilia"]:$this->mo01_bolsafamilia);
       $this->mo01_necess = ($this->mo01_necess == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_necess"]:$this->mo01_necess);
       $this->mo01_necesstipo = ($this->mo01_necesstipo == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_necess"]:$this->mo01_necesstipo);
       $this->mo01_cartaosus = ($this->mo01_cartaosus == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_cartaosus"]:$this->mo01_cartaosus);
       $this->mo01_nivel = ($this->mo01_nivel == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_nivel"]:$this->mo01_nivel);
       $this->mo01_ciclo = ($this->mo01_ciclo == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_ciclo"]:$this->mo01_ciclo);
       $this->mo01_redeorigem = ($this->mo01_redeorigem == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_redeorigem"]:$this->mo01_redeorigem);
       $this->mo01_ufredeorigem = ($this->mo01_ufredeorigem == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_ufredeorigem"]:$this->mo01_ufredeorigem);
       $this->mo01_munredeorigem = ($this->mo01_munredeorigem == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_munredeorigem"]:$this->mo01_munredeorigem);
       $this->mo01_escredeorigem = ($this->mo01_escredeorigem == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_escredeorigem"]:$this->mo01_escredeorigem);
       $this->mo01_ctbredeorigem = ($this->mo01_ctbredeorigem == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_ctbredeorigem"]:$this->mo01_ctbredeorigem);
       $this->mo01_certidaotipo = ($this->mo01_certidaotipo == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_certidaotipo"]:$this->mo01_certidaotipo);
       $this->mo01_certidaomod = ($this->mo01_certidaomod==""?@$GLOBALS["HTTP_POST_VARS"]["mo01_certidaomod"]:$this->mo01_certidaomod);
       $this->mo01_certidaolivro = ($this->mo01_certidaolivro == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_certidaolivro"]:$this->mo01_certidaolivro);
       $this->mo01_certidaofolha = ($this->mo01_certidaofolha == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_certidaofolha"]:$this->mo01_certidaofolha);
       $this->mo01_certidaonum = ($this->mo01_certidaonum==""?@$GLOBALS["HTTP_POST_VARS"]["mo01_certidaonum"]:$this->mo01_certidaonum);
       $this->mo01_certidaomatricula = ($this->mo01_certidaomatricula == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_certidaomatricula"]:$this->mo01_certidaomatricula);
       $this->mo01_cpf = ($this->mo01_cpf == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_cpf"]:$this->mo01_cpf);
       $this->mo01_ufcartcert = ($this->mo01_ufcartcert == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_ufcartcert"]:$this->mo01_ufcartcert);
       $this->mo01_muncartcert = ($this->mo01_muncartcert==""?@$GLOBALS["HTTP_POST_VARS"]["mo01_muncartcert"]:$this->mo01_muncartcert);
       $this->mo01_tipoend = ($this->mo01_tipoend == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_tipoend"]:$this->mo01_tipoend);
       $this->mo01_ender = ($this->mo01_ender == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_ender"]:$this->mo01_ender);
       $this->mo01_numero = ($this->mo01_numero==""?@$GLOBALS["HTTP_POST_VARS"]["mo01_numero"]:$this->mo01_numero);
       $this->mo01_bairro = ($this->mo01_bairro == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_bairro"]:$this->mo01_bairro);
       $this->mo01_cep = ($this->mo01_cep == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_cep"]:$this->mo01_cep);
       $this->mo01_uf = ($this->mo01_uf == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_uf"]:$this->mo01_uf);
       $this->mo01_municip = ($this->mo01_municip==""?@$GLOBALS["HTTP_POST_VARS"]["mo01_municip"]:$this->mo01_municip);
       $this->mo01_telef = ($this->mo01_telef==""?@$GLOBALS["HTTP_POST_VARS"]["mo01_telef"]:$this->mo01_telef);
       $this->mo01_telcel = ($this->mo01_telcel==""?@$GLOBALS["HTTP_POST_VARS"]["mo01_telcel"]:$this->mo01_telcel);
       $this->mo01_telcom = ($this->mo01_telcom==""?@$GLOBALS["HTTP_POST_VARS"]["mo01_telcom"]:$this->mo01_telcom);
       $this->mo01_email = ($this->mo01_email==""?@$GLOBALS["HTTP_POST_VARS"]["mo01_email"]:$this->mo01_email);
       $this->mo01_tiposangue = ($this->mo01_tiposangue==""?@$GLOBALS["HTTP_POST_VARS"]["mo01_tiposangue"]:$this->mo01_tiposangue);
       $this->mo01_fatorrh = ($this->mo01_fatorrh==""?@$GLOBALS["HTTP_POST_VARS"]["mo01_fatorrh"]:$this->mo01_fatorrh);
       $this->mo01_tipo = ($this->mo01_tipo==""?@$GLOBALS["HTTP_POST_VARS"]["mo01_tipo"]:$this->mo01_tipo);
       $this->mo01_fase = ($this->mo01_fase==""?@$GLOBALS["HTTP_POST_VARS"]["mo01_fase"]:$this->mo01_fase);
     }else{
       $this->mo01_codigo = ($this->mo01_codigo == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_codigo"]:$this->mo01_codigo);
     }
	 $this->mo01_gemeo = ($this->mo01_gemeo == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_gemeo"]:$this->mo01_gemeo);
	 $this->mo01_creche = ($this->mo01_creche == ""?@$GLOBALS["HTTP_POST_VARS"]["mo01_creche"]:$this->mo01_creche);
   }
  
   // funcao para inclusao
   function incluir ($mo01_codigo){
     //$this->atualizacampos();
     if($this->mo01_dtnasc == null ){ 
       $this->erro_sql = " Campo Data Nascimento nao Informado.";
       $this->erro_campo = "mo01_dtnasc";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_idade == null ){ 
       $this->erro_sql = " Campo Idade nao Informado.";
       $this->erro_campo = "mo01_idade";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_idadecorte == null ){ 
       $this->erro_sql = " Campo Idade na da corte nao Informado.";
       $this->erro_campo = "mo01_idadecorte";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_nome == null ){ 
       $this->erro_sql = " Campo Nome aluno nao Informado.";
       $this->erro_campo = "mo01_nome";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_sexo == null ){ 
       $this->erro_sql = " Campo Sexo nao Informado.";
       $this->erro_campo = "mo01_sexo";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_cor == null ){ 
       $this->erro_sql = " Campo Cor/Raça nao Informado.";
       $this->erro_campo = "mo01_cor";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_estciv == null ){ 
       $this->erro_sql = " Campo Estado Civil nao Informado.";
       $this->erro_campo = "mo01_estciv";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_nacion == null ){ 
       $this->erro_sql = " Campo Nacionalidade nao Informado.";
       $this->erro_campo = "mo01_nacion";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if ($this->mo01_nacion == "BRASILEIRA") {
        if($this->mo01_ufnasc == null ){ 
          $this->erro_sql = " Campo Uf Nascimento nao Informado.";
          $this->erro_campo = "mo01_ufnasc";
          $this->erro_banco = "";
          $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
          $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
          $this->erro_status = "0";
          return false;
        }
        if($this->mo01_munnasc == null ){ 
          $this->erro_sql = " Campo Municipio Nascimento nao Informado.";
          $this->erro_campo = "mo01_munnasc";
          $this->erro_banco = "";
          $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
          $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
          $this->erro_status = "0";
          return false;
        }
     } else {
        $this->mo01_munnasc = 0;
     }
     if($this->mo01_mae == null ){ 
       $this->erro_sql = " Campo Nome da mãe do aluno nao Informado.";
       $this->erro_campo = "mo01_mae";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     /*
     if($this->mo01_pai == null ){ 
       $this->erro_sql = " Campo Nome do pai do aluno nao Informado.";
       $this->erro_campo = "mo01_pai";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     */
     if($this->mo01_tiporesp == null ){ 
       $this->erro_sql = " Campo Tipo responsável nao Informado.";
       $this->erro_campo = "mo01_tiporesp";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_nomeresp == null ){ 
       $this->erro_sql = " Campo Nome do responsával do aluno nao Informado.";
       $this->erro_campo = "mo01_nomeresp";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_cpfresp == null ){ 
       $this->erro_sql = " Campo CPF do responsával do aluno nao Informado.";
       $this->erro_campo = "mo01_cpf";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_cartaosus == null ){ 
       $this->erro_sql = " Campo Cartão do SUS do aluno nao Informado.";
       $this->erro_campo = "mo01_cartaosus";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_necess == null ){ 
       $this->erro_sql = " Campo Necessidades Especiais nao Informado.";
       $this->erro_campo = "mo01_necess";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_necesstipo == null ){ 
       $this->erro_sql = " Campo Tipo Necessidade nao Informado.";
       $this->erro_campo = "mo01_necesstipo";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_bolsafamilia == null ){ 
       $this->erro_sql = " Campo Bolsa familia nao Informado.";
       $this->erro_campo = "mo01_bolsafamilia";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_nivel == null ){ 
       $this->erro_sql = " Campo Nivel/Escolaridade nao Informado.";
       $this->erro_campo = "mo01_nivel";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_ciclo == null ){ 
       $this->erro_sql = " Campo Etapa/Fase nao Informado.";
       $this->erro_campo = "mo01_ciclo";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_redeorigem == null ){ 
       $this->erro_sql = " Campo Rede de Origem nao Informado.";
       $this->erro_campo = "mo01_redeorigem";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if ($this->mo01_redeorigem != 8) {
     if($this->mo01_ufredeorigem == null ){ 
       $this->erro_sql = " Campo UF rede de origem nao Informado.";
       $this->erro_campo = "mo01_ufredeorigem";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;

     }
     if($this->mo01_munredeorigem == null ){ 
       $this->erro_sql = " Campo Municipio rede de origem nao Informado.";
       $this->erro_campo = "mo01_munredeorigem";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;      
     }
     } else {
        $this->mo01_munredeorigem = '0'; 
     }
     if ($this->mo01_redeorigem != 8) {
        if($this->mo01_ctbescredeorigem == null ){ 
          if($this->mo01_escredeorigem == null ){ 
            $this->erro_sql = " Campo Nome escola rede origem nao Informado.";
            $this->erro_campo = "mo01_escredeorigem";
            $this->erro_banco = "";
            $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
            $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
            $this->erro_status = "0";
            return false;
          } else {
            if($this->mo01_redeorigem == 3) {
              if($this->mo01_munredeorigem == 6491) {
                $this->erro_sql = "Campo Escola de origem nao Informado.";
                $this->erro_campo = "mo01_ctbescredeorigem";
                $this->erro_banco = "";
                $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
                $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
                $this->erro_status = "0";
                return false;
              }  
            } else {
               $this->mo01_ctbescredeorigem = 0; 
            }
          }
        } else {  
          $this->mo01_escredeorigem = ""; 
        }
     } else {
        $this->mo01_ctbescredeorigem = 0; 
//        $this->mo01_escredeorigem = ''; 
     }
     if($this->mo01_certidaotipo == null ){ 
       $this->erro_sql = " Campo certidao tipo nao Informado.";
       $this->erro_campo = "mo01_certidaotipo";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_certidaotipo != 0 ){ 
       if($this->mo01_certidaomod == null ){ 
         $this->erro_sql = " Campo modalidade certidão nao Informado.";
         $this->erro_campo = "mo01_certidaomod";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
       if($this->mo01_certidaomod == '1') {
         if($this->mo01_certidaolivro == null ){ 
           $this->erro_sql = " Campo Livro de Certidão nao Informado.";
           $this->erro_campo = "mo01_certidaolivro";
           $this->erro_banco = "";
           $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
           $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
           $this->erro_status = "0";
           return false;
         }
         if($this->mo01_certidaofolha == null ){ 
           $this->erro_sql = " Campo Folha do Livro nao Informado.";
           $this->erro_campo = "mo01_certidaofolha";
           $this->erro_banco = "";
           $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
           $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
           $this->erro_status = "0";
           return false;
         }
         if($this->mo01_certidaonum == null ){ 
           $this->erro_sql = " Campo Numero da certidão nao Informado.";
           $this->erro_campo = "mo01_certidaonum";
           $this->erro_banco = "";
           $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
           $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
           $this->erro_status = "0";
           return false;
         }
         $this->mo01_certidaomatricula = "";
       } else { 
          if($this->mo01_certidaomatricula == null ){ 
            $this->erro_sql = " Campo Matricula nao Informado.";
            $this->erro_campo = "mo01_certidaomatricula";
            $this->erro_banco = "";
            $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
            $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
            $this->erro_status = "0";
            return false;
          }
          $this->mo01_certidaolivro = "";
          $this->mo01_certidaofolha = "";
          $this->mo01_certidaonum   = "";
       }     
       if($this->mo01_ufcartcert == null ){ 
         $this->erro_sql = " Campo  nao Informado.";
         $this->erro_campo = "mo01_ufcartcert";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
       if($this->mo01_muncartcert == null ){ 
         $this->erro_sql = " Campo Municipio nao Informado.";
         $this->erro_campo = "mo01_muncartcert";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }else{
       $this->mo01_certidaonum       = "";
       $this->mo01_certidaollivro    = "";
       $this->mo01_certidaofolha     = "";
       $this->mo01_certidaomatricula = "";
       $this->mo01_ufcartcert        = "";
       $this->mo01_muncartcert       = 0;
     }
     if($this->mo01_tipoend == null ){ 
       $this->erro_sql = " Campo Tipo endereço nao Informado.";
       $this->erro_campo = "mo01_tipoend";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_ender == null ){ 
       $this->erro_sql = " Campo Endereço nao Informado.";
       $this->erro_campo = "mo01_ender";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_numero == null ){ 
       $this->mo01_numero = '0'; 
     }
     if($this->mo01_bairro == null ){ 
       $this->erro_sql = " Campo Bairro nao Informado.";
       $this->erro_campo = "mo01_bairro";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_cep == null ){ 
       $this->erro_sql = " Campo Cep nao Informado.";
       $this->erro_campo = "mo01_cep";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_uf == null ){ 
       $this->erro_sql = " Campo Estado nao Informado.";
       $this->erro_campo = "mo01_uf";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_municip == null ){ 
       $this->erro_sql = " Campo Municipio nao Informado.";
       $this->erro_campo = "mo01_municip";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo01_telcel == null ){ 
       $this->erro_sql = " Campo Telefone Celular nao Informado.";
       $this->erro_campo = "mo01_telcel";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }

     if($this->mo01_fase == null ){ 
       $this->erro_sql = " Campo Fase nao Informado.";
       $this->erro_campo = "mo01_fase";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }

     if($mo01_codigo == "" || $mo01_codigo == null ){
       $result = db_query("select nextval('mobase_mo01_codigo_seq')"); 
       if($result==false){
         $this->erro_banco = str_replace("\n","",@pg_last_error());
         $this->erro_sql   = "Verifique o cadastro da sequencia: mobase_mo01_codigo_seq do campo: mo01_codigo"; 
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false; 
       }
       $this->mo01_codigo = pg_result($result,0,0); 
     }else{
       $result = db_query("select last_value from mobase_mo01_codigo_seq");
       if(($result != false) && (pg_result($result,0,0) < $mo01_codigo)){
         $this->erro_sql = " Campo mo01_codigo maior que último número da sequencia.";
         $this->erro_banco = "Sequencia menor que este número.";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }else{
         $this->mo01_codigo = $mo01_codigo; 
       }
     }
     if(($this->mo01_codigo == null) || ($this->mo01_codigo == "") ){ 
       $this->erro_sql = " Campo mo01_codigo nao declarado.";
       $this->erro_banco = "Chave Primaria zerada.";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }

//====================================================
//rodrigodevolder@gmail.com
//if($this->mo01_cpfresp == '09538417747') {
	$arrsql = [
		'mo01_codigo' => 'int',
		'mo01_dtnasc' => 'date',
		'mo01_idade' => 'int',
		'mo01_idadecorte' => 'int',
		'mo01_nome' => 'char',
		'mo01_sexo' => 'char',
		'mo01_cor' => 'int',
		'mo01_estciv' => 'int',
		'mo01_nacion' => 'char',
		'mo01_ufnasc' => 'char',
		'mo01_munnasc' => 'int',
		'mo01_mae' => 'char',
		'mo01_pai' => 'char',
		'mo01_tiporesp' => 'int',
		'mo01_nomeresp' => 'char',
		'mo01_cpfresp' => 'char',
		'mo01_bolsafamilia' => 'bool',
		'mo01_necess' => 'int',
		'mo01_necesstipo' => 'int',
		'mo01_cartaosus' => 'int',
		'mo01_nis' => 'char',
		'mo01_nivel' => 'int',
		'mo01_ciclo' => 'int',
		'mo01_redeorigem' => 'int',
		'mo01_ufredeorigem' => 'char',
		'mo01_munredeorigem' => 'int',
		'mo01_escredeorigem' => 'char',
		'mo01_ctbescredeorigem' => 'int',
		'mo01_certidaotipo' => 'int',
		'mo01_certidaomod' => 'int',
		'mo01_certidaolivro' => 'char',
		'mo01_certidaofolha' => 'char',
		'mo01_certidaonum' => 'char',
		'mo01_certidaomatricula' => 'char',
		'mo01_cpf' => 'char',
		'mo01_ufcartcert' => 'char',
		'mo01_muncartcert' => 'int',
		'mo01_tipoender' => 'char',
		'mo01_ender' => 'char',
		'mo01_numero' => 'char',
		'mo01_bairro' => 'int',
		'mo01_cep' => 'char',
		'mo01_uf' => 'char',
		'mo01_municip' => 'char',
		'mo01_telef' => 'char',
		'mo01_telcel' => 'char',
		'mo01_telcom' => 'char',
		'mo01_email' => 'char',
		'mo01_datacad' => 'date',
		'mo01_tiposangue' => 'char',
		'mo01_fatorrh' => 'char',
		'mo01_tipo' => 'char',
		'mo01_fase' => 'int',
		'mo01_gemeo' => 'int',
		'mo01_creche' => 'int'
	];
	$sqlvalues = [];
	foreach($arrsql as $key => $value) {
		if(empty($this->$key)) {
			$val = 'NULL';
		} elseif(in_array($value, ['int', 'bool'])) {
			$val = $this->$key;
		} else {
			$val = "'{$this->$key}'";
		}
		$sqlvalues[] = $val;
	}
	$sql = "INSERT INTO plugins.mobase (". implode(',', array_keys($arrsql)) .") VALUES (". implode(',', $sqlvalues) .")";
//}
/*
     $sql = "insert into plugins.mobase(
                                  mo01_codigo 
                                 ,mo01_dtnasc 
                                 ,mo01_idade
                                 ,mo01_idadecorte
                                 ,mo01_nome
                                 ,mo01_sexo
                                 ,mo01_cor
                                 ,mo01_estciv
                                 ,mo01_nacion
                                 ,mo01_ufnasc
                                 ,mo01_munnasc
                                 ,mo01_mae
                                 ,mo01_pai
                                 ,mo01_tiporesp
                                 ,mo01_nomeresp
                                 ,mo01_cpfresp
                                 ,mo01_bolsafamilia
                                 ,mo01_necess
                                 ,mo01_necesstipo
                                 ,mo01_cartaosus
                                 ,mo01_nis
                                 ,mo01_nivel
                                 ,mo01_ciclo
                                 ,mo01_redeorigem
                                 ,mo01_ufredeorigem
                                 ,mo01_munredeorigem
                                 ,mo01_escredeorigem
                                 ,mo01_ctbescredeorigem
                                 ,mo01_certidaotipo
                                 ,mo01_certidaomod
                                 ,mo01_certidaolivro
                                 ,mo01_certidaofolha
                                 ,mo01_certidaonum
                                 ,mo01_certidaomatricula
                                 ,mo01_cpf
                                 ,mo01_ufcartcert
                                 ,mo01_muncartcert
                                 ,mo01_tipoender
                                 ,mo01_ender
                                 ,mo01_numero
                                 ,mo01_bairro
                                 ,mo01_cep
                                 ,mo01_uf
                                 ,mo01_municip
                                 ,mo01_telef
                                 ,mo01_telcel
                                 ,mo01_telcom
                                 ,mo01_email
                                 ,mo01_datacad
                                 ,mo01_tiposangue
                                 ,mo01_fatorrh
                                 ,mo01_tipo
                                 ,mo01_fase
                                 ,mo01_gemeo
                       )
                values (
                                  $this->mo01_codigo 
                                 ,".($this->mo01_dtnasc == "null" || $this->mo01_dtnasc == ""?"null":"'".$this->mo01_dtnasc."'")." 
                                 ,$this->mo01_idade
                                 ,$this->mo01_idadecorte
                                 ,'$this->mo01_nome'
                                 ,'$this->mo01_sexo'
                                 ,$this->mo01_cor
                                 ,$this->mo01_estciv
                                 ,'$this->mo01_nacion'
                                 ,'$this->mo01_ufnasc'
                                 ,$this->mo01_munnasc                            
                                 ,'$this->mo01_mae'
                                 ,'$this->mo01_pai'
                                 ,$this->mo01_tiporesp
                                 ,'$this->mo01_nomeresp'
                                 ,'$this->mo01_cpfresp'
                                 ,$this->mo01_bolsafamilia
                                 ,$this->mo01_necess
                                 ,$this->mo01_necesstipo
                                 ,$this->mo01_cartaosus
                                 ,'$this->mo01_nis'
                                 ,$this->mo01_nivel
                                 ,$this->mo01_ciclo
                                 ,$this->mo01_redeorigem
                                 ,'$this->mo01_ufredeorigem'
                                 ,$this->mo01_munredeorigem
                                 ,'$this->mo01_escredeorigem'
                                 ,$this->mo01_ctbescredeorigem
                                 ,$this->mo01_certidaotipo
                                 ,".($this->mo01_certidaomod == "null" || $this->mo01_certidaomod == ""?"null":"'".$this->mo01_certidaomod."'")." 
                                 ,".($this->mo01_certidaolivro == "null" || $this->mo01_certidaolivro == ""?"null":"'".$this->mo01_certidaolivro."'")." 
                                 ,".($this->mo01_certidaofolha == "null" || $this->mo01_certidaofolha == ""?"null":"'".$this->mo01_certidaofolha."'")." 
                                 ,".($this->mo01_certidaonum == "null" || $this->mo01_certidaonum == ""?"null":"'".$this->mo01_certidaonum."'")." 
                                 ,".($this->mo01_certidaomatricula == "null" || $this->mo01_certidaomatricula == ""?"null":"'".$this->mo01_certidaomatricula."'")." 
                                 ,".($this->mo01_cpf == "null" || $this->mo01_cpf == ""?"null":"'".$this->mo01_cpf."'")." 
                                 ,'$this->mo01_ufcartcert'
                                 ,$this->mo01_muncartcert
                                 ,'$this->mo01_tipoend'
                                 ,'$this->mo01_ender'
                                 ,'$this->mo01_numero'
                                 ,$this->mo01_bairro
                                 ,'$this->mo01_cep'
                                 ,'$this->mo01_uf'
                                 ,'$this->mo01_municip'
                                 ,".($this->mo01_telef == "null" || $this->mo01_telef == ""?"null":"'".$this->mo01_telef."'")." 
                                 ,'$this->mo01_telcel'
                                 ,".($this->mo01_telcom == "null" || $this->mo01_telcom == ""?"null":"'".$this->mo01_telcom."'")." 
                                 ,".($this->mo01_email == "null" || $this->mo01_email == ""?"null":"'".$this->mo01_email."'")." 
                                 ,".($this->mo01_datacad == "null" || $this->mo01_datacad == ""?"null":"'".$this->mo01_datacad."'")." 
                                 ,'$this->mo01_tiposangue'
                                 ,'$this->mo01_fatorrh'
                                 ,'$this->mo01_tipo'
                                 ,$this->mo01_fase
								 ,$this->mo01_gemeo
                      )";
*/
//====================================================
     $result = db_query($sql); 
     if($result==false){ 
       $this->erro_banco = str_replace("\n","",@pg_last_error());
       if( strpos(strtolower($this->erro_banco),"duplicate key") != 0 ){
         $this->erro_sql   = "mobase ($this->mo01_codigo) nao Incluído. Inclusao Abortada.";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_banco = "mobase já Cadastrado";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       }else{
         $this->erro_sql   = "mobase ($this->mo01_codigo) nao Incluído. Inclusao Abortada.";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$sql." \\n"));
       }
       $this->erro_status = "0";
       $this->numrows_incluir= 0;
       return false;
     }
     $this->erro_banco = "";
     $this->erro_sql = "Inclusao efetuada com Sucesso\\n";
     $this->erro_sql .= "Valores : ".$this->mo01_codigo;
     $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
     $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
     $this->erro_status = "1";

     return true;
  } 

  function alterar ($mo01_codigo=null) { 
     ///$this->atualizacampos();
     $sql = " update plugins.mobase set ";
     $virgula = "";
     if(trim($this->mo01_codigo)!=""){ 
       $sql  .= $virgula." mo01_codigo = $this->mo01_codigo ";
       $virgula = ",";
       if(trim($this->mo01_codigo) == null ){ 
         $this->erro_sql = " Campo Codigo nao Informado.";
         $this->erro_campo = "mo01_codigo";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     if(trim($this->mo01_protocol)!=""){ 
       $sql  .= $virgula." mo01_protocol = $this->mo01_protocol ";
       $virgula = ",";
       if(trim($this->mo01_protocol) == null ){ 
         $this->erro_sql = " Campo Protocolo. nao Informado.";
         $this->erro_campo = "mo01_protocol";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     $sql .= " where ";
     if($mo01_codigo!=null){
       $this->mo01_codigo = $mo01_codigo; 
       $sql .= " mo01_codigo = $this->mo01_codigo";
     }
     $result = db_query($sql);
     if($result==false){ 
       $this->erro_banco = str_replace("\n","",@pg_last_error());
       $this->erro_sql   = "mobase nao Alterado. Alteracao Abortada.\\n";
       $this->erro_sql .= "Valores : ".$this->mo01_codigo;
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       $this->numrows_alterar = 0;
       return false;
     }else{
       if(pg_affected_rows($result)==0){
         $this->erro_banco = "";
         $this->erro_sql = "mobase nao foi Alterado. Alteracao Executada.\\n";
         $this->erro_sql .= "Valores : ".$this->mo01_codigo;
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "1";
         $this->numrows_alterar = 0;
         return true;
       }else{
         $this->erro_banco = "";
         $this->erro_sql = "Alteração efetuada com Sucesso\\n";
         $this->erro_sql .= "Valores : ".$this->mo01_codigo;
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "1";
         $this->numrows_alterar = pg_affected_rows($result);
         return true;
       } 
     } 
  } 
  // funcao do recordset 
  function sql_record($sql) { 
     $result = db_query($sql);
     if($result==false){
       $this->numrows    = 0;
       $this->erro_banco = str_replace("\n","",@pg_last_error());
       $this->erro_sql   = "Erro ao selecionar os registros.";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     $this->numrows = pg_numrows($result);
      if($this->numrows==0){
        $this->erro_banco = "";
        $this->erro_sql   = "Record Vazio na Tabela:mobase";
        $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
        $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
        $this->erro_status = "0";
        return false;
      }
     return $result;
  }
  function sql_query_file ( $mo01_codigo=null,$campos="*",$ordem=null,$dbwhere=""){ 
     $sql = "select ";
     if($campos != "*" ){
       $campos_sql = split("#",$campos);
       $virgula = "";
       for($i=0;$i<sizeof($campos_sql);$i++){
         $sql .= $virgula.$campos_sql[$i];
         $virgula = ",";
       }
     }else{
       $sql .= $campos;
     }
     $sql .= " from plugins.mobase ";
     $sql2 = "";
     if($dbwhere==""){
       if($y100_sequencial!=null ){
         $sql2 .= " where mobase.mo01_codigo = $mo01_codigo "; 
       } 
     }else if($dbwhere != ""){
       $sql2 = " where $dbwhere";
     }
     $sql .= $sql2;
     if($ordem != null ){
       $sql .= " order by ";
       $campos_sql = split("#",$ordem);
       $virgula = "";
       for($i=0;$i<sizeof($campos_sql);$i++){
         $sql .= $virgula.$campos_sql[$i];
         $virgula = ",";
       }
     }
     return $sql;
  }
 
  public function sql_query_inscritos ($mo01_codigo = null, $campos = "*", $ordem = null, $dbwhere = "") {

    $sql  = " select {$campos} ";
    $sql .= "   from plugins.mobase    ";
    $sql .= "  inner join plugins.basefase     on mo12_base       = mo01_codigo  ";
    $sql .= "  inner join plugins.fase         on mo04_codigo     = mo12_fase    ";
    $sql .= "  inner join plugins.baseescola   on mo02_base       = mo01_codigo  ";
    $sql .= "  inner join plugins.baseescturno on mo03_baseescola = mo02_codigo  ";
    $sql .= "  inner join serie                on ed11_i_codigo   = mo01_serie   ";
    $sql .= "  inner join ensino               on ed10_i_codigo   = ed11_i_ensino";
    $sql .= "  inner join escola               on ed18_i_codigo   = mo02_escola  ";

    $sql2 = "";
    if (empty($dbwhere)) {
       if (!empty($mo01_codigo)) {
        $sql2 .= " where plugins.mobase.mo01_codigo = $mo01_codigo ";
       }
    } else if (!empty($dbwhere)) {
       $sql2 = " where $dbwhere";
    }
    $sql .= $sql2;
    if (!empty($ordem)) {
       $sql .= " order by {$ordem}";
    }
    return $sql;
  }

  public function sql_query_matricula ($mo01_codigo = null, $campos = "*", $ordem = null, $dbwhere = "") {
    $sql  = " select {$campos}                                                     ";
    $sql .= "  from plugins.mobase                                                 ";
    $sql .= "    inner join serie                on ed11_i_codigo   = mo01_serie   ";
    $sql .= "    inner join ensino               on ed10_i_codigo   = ed11_i_ensino";
    $sql .= "    inner join plugins.baseescola   on mo02_base       = mo01_codigo  ";
    $sql .= "    inner join escola               on ed18_i_codigo   = mo02_escola  ";

    $sql2 = "";
    if (empty($dbwhere)) {
       if (!empty($mo01_codigo)) {
        $sql2 .= " where plugins.mobase.mo01_codigo = $mo01_codigo ";
       }
    } else if (!empty($dbwhere)) {
       $sql2 = " where $dbwhere";
    }
    $sql .= $sql2;
    if (!empty($ordem)) {
       $sql .= " order by {$ordem}";
    }
    return $sql;
  }

  public function sql_query_consulta ($mo01_codigo = null, $campos = "*", $ordem = null, $dbwhere = "") {
    $sql  = " select {$campos}                                                     ";
    $sql .= "  from plugins.mobase                                                 ";
    $sql .= "    inner join plugins.baseescola   on mo02_base       = mo01_codigo  ";
    $sql .= "    inner join escola               on ed18_i_codigo   = mo02_escola  ";

    $sql2 = "";
    if (empty($dbwhere)) {
       if (!empty($mo01_codigo)) {
        $sql2 .= " where plugins.mobase.mo01_codigo = $mo01_codigo ";
       }
    } else if (!empty($dbwhere)) {
       $sql2 = " where $dbwhere";
    }
    $sql .= $sql2;
    if (!empty($ordem)) {
       $sql .= " order by {$ordem}";
    }
    return $sql;
  }

  function update($mo01_codigo=null) { 
     $sql = " update plugins.mobase set ";
     $virgula = "";
     if(trim($this->mo01_codigo)!=""){ 
       $sql  .= $virgula." mo01_codigo = $this->mo01_codigo ";
       $virgula = ",";
       if(trim($this->mo01_codigo) == null ){ 
         $this->erro_sql = " Campo Codigo Mobase nao Informado.";
         $this->erro_campo = "mo01_codigo";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }

     if(trim($this->mo01_dtnasc)!=""){ 
       $sql  .= $virgula." mo01_dtnasc = '$this->mo01_dtnasc' ";
       $virgula = ",";
       if($this->mo01_dtnasc == null ){ 
         $this->erro_sql = " Campo Data Nascimento nao Informado.";
         $this->erro_campo = "mo01_dtnasc";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     if(trim($this->mo01_idade)!=""){ 
       $sql  .= $virgula." mo01_idade = $this->mo01_idade ";
       $virgula = ",";
      if($this->mo01_idade == null ){ 
         $this->erro_sql = " Campo Idade nao Informado.";
         $this->erro_campo = "mo01_idade";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
       
     if(trim($this->mo01_idadecorte)!=""){ 
       $sql  .= $virgula." mo01_idadecorte = $this->mo01_idadecorte ";
       $virgula = ",";
       if($this->mo01_idadecorte == null){ 
         $this->erro_sql = " Campo Idade na da corte nao Informado.";
         $this->erro_campo = "mo01_idadecorte";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }

     if(trim($this->mo01_nome)!=""){ 
       $sql  .= $virgula." mo01_nome = '$this->mo01_nome' ";
       $virgula = ",";
       if($this->mo01_nome == null ){ 
         $this->erro_sql = " Campo Nome aluno nao Informado.";
         $this->erro_campo = "mo01_nome";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }

     if(trim($this->mo01_sexo)!=""){ 
       $sql  .= $virgula." mo01_sexo = '$this->mo01_sexo' ";
       $virgula = ",";
       if($this->mo01_sexo == null ){ 
         $this->erro_sql = " Campo Sexo nao Informado.";
         $this->erro_campo = "mo01_sexo";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     if(trim($this->mo01_cor)!=""){ 
       $sql  .= $virgula." mo01_cor = '$this->mo01_cor' ";
       $virgula = ",";
       if($this->mo01_cor == null ){ 
         $this->erro_sql = " Campo Cor/Raça nao Informado.";
         $this->erro_campo = "mo01_cor";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     if(trim($this->mo01_estciv)!=""){ 
       $sql  .= $virgula." mo01_estciv = '$this->mo01_estciv' ";
       $virgula = ",";
       if($this->mo01_estciv == null ){ 
         $this->erro_sql = " Campo Estado Civil nao Informado.";
         $this->erro_campo = "mo01_estciv";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }  

     if(trim($this->mo01_nacion)!=""){ 
       $sql  .= $virgula." mo01_nacion = '$this->mo01_nacion' ";
       $virgula = ",";
       if($this->mo01_nacion == null ){ 
         $this->erro_sql = " Campo Nacionalidade nao Informado.";
         $this->erro_campo = "mo01_nacion";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }

     if ($this->mo01_nacion == "BRASILEIRA") {
        if($this->mo01_ufnasc == null ){ 
          $this->erro_sql = " Campo Uf Nascimento nao Informado.";
          $this->erro_campo = "mo01_ufnasc";
          $this->erro_banco = "";
          $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
          $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
          $this->erro_status = "0";
          return false;
        }
        if($this->mo01_munnasc == null ){ 
          $this->erro_sql = " Campo Municipio Nascimento nao Informado.";
          $this->erro_campo = "mo01_munnasc";
          $this->erro_banco = "";
          $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
          $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
          $this->erro_status = "0";
          return false;
        }
     } else {
        $this->mo01_munnasc = 0;
     }

     if(trim($this->mo01_mae)!=""){ 
       $sql  .= $virgula." mo01_mae = '$this->mo01_mae' ";
       $virgula = ",";
       if($this->mo01_mae == null ){ 
         $this->erro_sql = " Campo Nome da mãe do aluno nao Informado.";
         $this->erro_campo = "mo01_mae";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }  
     if(trim($this->mo01_pai)!=""){ 
       $sql  .= $virgula." mo01_pai = '$this->mo01_pai' ";
       $virgula = ",";
       if($this->mo01_pai == null ){ 
         $this->erro_sql = " Campo Nome do pai do aluno nao Informado.";
         $this->erro_campo = "mo01_pai";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }  

     if(trim($this->mo01_tiporesp)!=""){ 
       $sql  .= $virgula." mo01_tiporesp = '$this->mo01_tiporesp' ";
       $virgula = ",";
       if($this->mo01_tiporesp == null ){ 
         $this->erro_sql = " Campo Tipo responsável nao Informado.";
         $this->erro_campo = "mo01_tiporesp";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }  

     if(trim($this->mo01_nomeresp)!=""){ 
       $sql  .= $virgula." mo01_nomeresp = '$this->mo01_nomeresp' ";
       $virgula = ",";
       if($this->mo01_nomeresp == null ){ 
         $this->erro_sql = " Campo Nome do responsával do aluno nao Informado.";
         $this->erro_campo = "mo01_nomeresp";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
       
     if(trim($this->mo01_cpfresp)!=""){ 
       $sql  .= $virgula." mo01_cpfresp = '$this->mo01_cpfresp' ";
       $virgula = ",";
       if($this->mo01_cpfresp == null ){ 
         $this->erro_sql = " Campo CPF do responsával do aluno nao Informado.";
         $this->erro_campo = "mo01_cpf";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
       
     if(trim($this->mo01_cartaosus)!=""){ 
       $sql  .= $virgula." mo01_cartaosus = '$this->mo01_cartaosus' ";
       $virgula = ",";
       if($this->mo01_cartaosus == null ){ 
         $this->erro_sql = " Campo Cartão do SUS do aluno nao Informado.";
         $this->erro_campo = "mo01_cartaosus";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }  
     if(trim($this->mo01_necess)!=""){ 
       $sql  .= $virgula." mo01_necess = '$this->mo01_necess' ";
       $virgula = ",";
       if($this->mo01_necess == null ){ 
         $this->erro_sql = " Campo Necessidades Especiais nao Informado.";
         $this->erro_campo = "mo01_necess";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }  
     if(trim($this->mo01_necesstipo)!=""){ 
       $sql  .= $virgula." mo01_necesstipo = '$this->mo01_necesstipo' ";
       $virgula = ",";    
       if($this->mo01_necesstipo == null ){ 
         $this->erro_sql = " Campo Tipo Necessidade nao Informado.";
         $this->erro_campo = "mo01_necesstipo";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }  
     
     if(trim($this->mo01_bolsafamilia)!=""){ 
       $sql  .= $virgula." mo01_bolsafamilia = '$this->mo01_bolsafamilia' ";
       $virgula = ",";    
       if($this->mo01_bolsafamilia == null ){ 
         $this->erro_sql = " Campo Bolsa familia nao Informado.";
         $this->erro_campo = "mo01_bolsafamilia";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
       
     if(trim($this->mo01_nis)!=""){ 
       $sql  .= $virgula." mo01_nis = '$this->mo01_nis' ";
       $virgula = ",";    
     } 

     if(trim($this->mo01_nivel)!=""){ 
       $sql  .= $virgula." mo01_nivel = '$this->mo01_nivel' ";
       $virgula = ",";    
       if($this->mo01_nivel == null ){ 
         $this->erro_sql = " Campo Nivel/Escolaridade nao Informado.";
         $this->erro_campo = "mo01_nivel";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }  

     if(trim($this->mo01_redeorigem)!=""){ 
       $sql  .= $virgula." mo01_redeorigem = '$this->mo01_redeorigem' ";
       $virgula = ",";    
       if($this->mo01_redeorigem == null ){ 
         $this->erro_sql = " Campo Rede de Origem nao Informado.";
         $this->erro_campo = "mo01_redeorigem";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
       
     if(trim($this->mo01_ufredeorigem)!=""){ 
       $sql  .= $virgula." mo01_ufredeorigem = '$this->mo01_ufredeorigem' ";
       $virgula = ",";    
       if($this->mo01_ufredeorigem == null ){ 
         $this->erro_sql = " Campo UF rede de origem nao Informado.";
         $this->erro_campo = "mo01_ufredeorigem";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }  

     if(trim($this->mo01_munredeorigem)!=""){ 
       $sql  .= $virgula." mo01_munredeorigem = '$this->mo01_munredeorigem' ";
       $virgula = ",";       
       if($this->mo01_munredeorigem == null ){ 
         $this->erro_sql = " Campo Municipio rede de origem nao Informado.";
         $this->erro_campo = "mo01_munredeorigem";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }  

     if ($this->mo01_redeorigem != 8) {
        if(trim($this->mo01_ctbescredeorigem)!=""){ 
          if($this->mo01_redeorigem == 3) {
            $sql  .= $virgula." mo01_ctbescredeorigem = '$this->mo01_ctbescredeorigem' ";
            $virgula = ",";              
            if($this->mo01_ctbescredeorigem == 6491) {
              $this->erro_sql = "Campo Escola de origem nao Informado.";
              $this->erro_campo = "mo01_ctbescredeorigem";
              $this->erro_banco = "";
              $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
              $this->erro_msg   .=  str_replace('"',"",str_replace("'","", "Administrador: \\n\\n ".$this->erro_banco." \\n"));
              $this->erro_status = "0";
              return false;
            }
          }
        }  
     }

     if(trim($this->mo01_certidaotipo)!=""){ 
       $sql  .= $virgula." mo01_certidaotipo = '$this->mo01_certidaotipo' ";
       $virgula = ",";       
       if($this->mo01_certidaotipo == null ){ 
         $this->erro_sql = " Campo certidao tipo nao Informado.";
         $this->erro_campo = "mo01_certidaotipo";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }  
     if($this->mo01_certidaotipo != 0 ){ 
       if(trim($this->mo01_certidaomod)!=""){ 
         $sql  .= $virgula." mo01_certidaomod = '$this->mo01_certidaomod' ";
         $virgula = ",";       
         if($this->mo01_certidaomod == null ){ 
           $this->erro_sql = " Campo modalidade certidão nao Informado.";
           $this->erro_campo = "mo01_certidaomod";
           $this->erro_banco = "";
           $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
           $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
           $this->erro_status = "0";
           return false;
         }
       }
         
       if($this->mo01_certidaomod == '1') {
         if(trim($this->mo01_certidaolivro)!=""){ 
           $sql  .= $virgula." mo01_certidaolivro = '$this->mo01_certidaolivro' ";
           $virgula = ",";       
           if($this->mo01_certidaolivro == null ){ 
             $this->erro_sql = " Campo Livro de Certidão nao Informado.";
             $this->erro_campo = "mo01_certidaolivro";
             $this->erro_banco = "";
             $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
             $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
             $this->erro_status = "0";
             return false;
           }
         }  

         if(trim($this->mo01_certidaofolha)!=""){ 
           $sql  .= $virgula." mo01_certidaofolha = '$this->mo01_certidaofolha' ";
           $virgula = ",";       
           if($this->mo01_certidaofolha == null ){ 
             $this->erro_sql = " Campo Folha do Livro nao Informado.";
             $this->erro_campo = "mo01_certidaofolha";
             $this->erro_banco = "";
             $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
             $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
             $this->erro_status = "0";
             return false;
           }
         }
           
         if(trim($this->mo01_certidaonum)!=""){ 
           $sql  .= $virgula." mo01_certidaonum = '$this->mo01_certidaonum' ";
           $virgula = ",";       
           if($this->mo01_certidaonum == null ){ 
             $this->erro_sql = " Campo Numero da certidão nao Informado.";
             $this->erro_campo = "mo01_certidaonum";
             $this->erro_banco = "";
             $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
             $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
             $this->erro_status = "0";
             return false;
           }
         }  
         $this->mo01_certidaomatricula = "";
       } else { 
         if(trim($this->mo01_certidaomatricula)!=""){ 
           $sql  .= $virgula." mo01_certidaomatricula = '$this->mo01_certidaomatricula' ";
           $virgula = ",";       
           if($this->mo01_certidaomatricula == null ){ 
              $this->erro_sql = " Campo Matricula nao Informado.";
              $this->erro_campo = "mo01_certidaomatricula";
              $this->erro_banco = "";
              $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
              $this->erro_msg  .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
              $this->erro_status = "0";
              return false;
           }
           $this->mo01_certidaolivro = "";
           $this->mo01_certidaofolha = "";
           $this->mo01_certidaonum   = "";
         }   
       }     

       if(trim($this->mo01_ufcartcert)!=""){ 
         $sql  .= $virgula." mo01_ufcartcert = '$this->mo01_ufcartcert' ";
         $virgula = ",";       
         if($this->mo01_ufcartcert == null ){ 
           $this->erro_sql = " Campo  nao Informado.";
           $this->erro_campo = "mo01_ufcartcert";
           $this->erro_banco = "";
           $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
           $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
           $this->erro_status = "0";
           return false;
         }
       }
       if(trim($this->mo01_muncartcert)!=""){ 
         $sql  .= $virgula." mo01_muncartcert = '$this->mo01_muncartcert' ";
         $virgula = ",";              
         if($this->mo01_muncartcert == null ){ 
           $this->erro_sql = " Campo Municipio nao Informado.";
           $this->erro_campo = "mo01_muncartcert";
           $this->erro_banco = "";
           $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
           $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
           $this->erro_status = "0";
           return false;
         }
       }  
     }else{
       $this->mo01_certidaonum       = "";
       $this->mo01_certidaollivro    = "";
       $this->mo01_certidaofolha     = "";
       $this->mo01_certidaomatricula = "";
       $this->mo01_ufcartcert        = "";
       $this->mo01_muncartcert       = 0;
     }

     if(trim($this->mo01_tipoend)!=""){ 
       $sql  .= $virgula." mo01_tipoender = '$this->mo01_tipoend' ";
       $virgula = ",";       
       if($this->mo01_tipoend == null ){ 
         $this->erro_sql   = " Campo Tipo endereço nao Informado.";
         $this->erro_campo = "mo01_tipoender";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg  .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     
     if(trim($this->mo01_ender)!=""){ 
       $sql  .= $virgula." mo01_ender = '$this->mo01_ender' ";
       $virgula = ",";       
       if($this->mo01_ender == null ){ 
         $this->erro_sql = " Campo Endereço nao Informado.";
         $this->erro_campo = "mo01_ender";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }  

     if($this->mo01_numero != ''){ 
       $sql  .= $virgula." mo01_numero = '$this->mo01_numero' ";
       $virgula = ",";       
     }

     if(trim($this->mo01_bairro)!=""){ 
       $sql  .= $virgula." mo01_bairro = '$this->mo01_bairro' ";
       $virgula = ",";       
       if($this->mo01_bairro == null ){ 
         $this->erro_sql = " Campo Bairro nao Informado.";
         $this->erro_campo = "mo01_bairro";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }  
     if(trim($this->mo01_cep)!=""){ 
       $sql  .= $virgula." mo01_cep = '$this->mo01_cep' ";
       $virgula = ",";       
       if($this->mo01_cep == null ){ 
         $this->erro_sql = " Campo Cep nao Informado.";
         $this->erro_campo = "mo01_cep";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
       
     if(trim($this->mo01_uf)!=""){ 
       $sql  .= $virgula." mo01_uf = '$this->mo01_uf' ";
       $virgula = ",";       
       if($this->mo01_uf == null ){ 
         $this->erro_sql = " Campo Estado nao Informado.";
         $this->erro_campo = "mo01_uf";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }

     if(trim($this->mo01_municip)!=""){ 
       $sql  .= $virgula." mo01_municip = '$this->mo01_municip' ";
       $virgula = ",";       
       if($this->mo01_municip == null ){ 
         $this->erro_sql = " Campo Municipio nao Informado.";
         $this->erro_campo = "mo01_municip";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
       
     if(trim($this->mo01_telcel)!=""){ 
       $sql  .= $virgula." mo01_telcel = '$this->mo01_telcel' ";
       $virgula = ",";       
       if($this->mo01_telcel == null ){ 
         $this->erro_sql = " Campo Telefone Celular nao Informado.";
         $this->erro_campo = "mo01_telcel";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }  
     $sql .= " where ";
     if($mo01_codigo!=null){
       $this->mo01_codigo = $mo01_codigo; 
       $sql .= " mo01_codigo = $this->mo01_codigo";
     }
     $result = db_query($sql);
     if($result==false){ 
       $this->erro_banco = str_replace("\n","",@pg_last_error());
       $this->erro_sql   = "mobase nao Alterado. Alteracao Abortada.\\n";
       $this->erro_sql .= "Valores : ".$this->mo01_codigo;
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       $this->numrows_alterar = 0;
       return false;
     }else{
       if(pg_affected_rows($result)==0){
         $this->erro_banco = "";
         $this->erro_sql = "mobase nao foi Alterado. Alteracao Executada.\\n";
         $this->erro_sql .= "Valores : ".$this->mo01_codigo;
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "1";
         $this->numrows_alterar = 0;
         return true;
       }else{
         $this->erro_banco = "";
         $this->erro_sql = "Alteração efetuada com Sucesso\\n";
         $this->erro_sql .= "Valores : ".$this->mo01_codigo;
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "1";
         $this->numrows_alterar = pg_affected_rows($result);
         return true;
       } 
     } 
  }

  function alterar_protocolo ($mo01_codigo=null) { 
     ///$this->atualizacampos();
     $sql = " update plugins.mobase set ";
     $virgula = "";
     if(trim($this->mo01_codigo)!=""){ 
       $sql  .= $virgula." mo01_codigo = $this->mo01_codigo ";
       $virgula = ",";
       if(trim($this->mo01_codigo) == null ){ 
         $this->erro_sql = " Campo Codigo nao Informado.";
         $this->erro_campo = "mo01_codigo";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     if(trim($this->mo01_protocol)!=""){ 
       $sql  .= $virgula." mo01_protocol = $this->mo01_protocol ";
       $virgula = ",";
       if(trim($this->mo01_protocol) == null ){ 
         $this->erro_sql = " Campo Protocolo. nao Informado.";
         $this->erro_campo = "mo01_protocol";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     $sql .= " where ";
     if($mo01_codigo!=null){
       $this->mo01_codigo = $mo01_codigo; 
       $sql .= " mo01_codigo = $this->mo01_codigo";
     }
     $result = db_query($sql);
     if($result==false){ 
       $this->erro_banco = str_replace("\n","",@pg_last_error());
       $this->erro_sql   = "mobase nao Alterado. Alteracao Abortada.\\n";
       $this->erro_sql .= "Valores : ".$this->mo01_codigo;
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       $this->numrows_alterar = 0;
       return false;
     }else{
       if(pg_affected_rows($result)==0){
         $this->erro_banco = "";
         $this->erro_sql = "mobase nao foi Alterado. Alteracao Executada.\\n";
         $this->erro_sql .= "Valores : ".$this->mo01_codigo;
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "1";
         $this->numrows_alterar = 0;
         return true;
       }else{
         $this->erro_banco = "";
         $this->erro_sql = "Alteração efetuada com Sucesso\\n";
         $this->erro_sql .= "Valores : ".$this->mo01_codigo;
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "1";
         $this->numrows_alterar = pg_affected_rows($result);
         return true;
       } 
     } 
  } 
 
}
