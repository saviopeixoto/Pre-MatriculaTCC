<?php
//MODULO: matriculaonline
//CLASSE DA ENTIDADE ciclosensino
class cl_baseescturno { 
   // cria variaveis de erro 
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
   var $mo03_codigo = 0; 
   var $mo03_baseescola = 0; 
   var $mo03_turno = 0; 
   var $mo03_dtcad = null; 
   var $mo03_status = null; 
   var $mo03_opcao = 0; 
   // cria propriedade com as variaveis do arquivo 
   var $campos = "
                 mo03_codigo = int4 = Código 
                 mo03_baseescola = int4 = baseescola 
                 mo03_turno = int4 = Turno 
                 mo03_dtcad = date = Data cad
                 mo03_status = boolean = Status 
                 mo03_opcao = int4 = opcao 
                 ";
   //funcao construtor da classe 
   function cl_baseescturno() { 
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
   // funcao para Inclusão
   function incluir ($mo03_codigo){ 
     if($this->mo03_baseescola == null ){ 
       $this->erro_sql = " Campo Codigo baseescola não informado.";
       $this->erro_campo = "mo03_baseescola";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo03_baseescola == null ){ 
       $this->erro_sql = " Campo Escola não informado.";
       $this->erro_campo = "mo03_baseescola";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo03_turno == null ){ 
       $this->erro_sql = " Campo Turno não informado.";
       $this->erro_campo = "mo03_turno";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo03_dtcad == null ){ 
       $this->erro_sql = " Campo Data cadastrada não informado.";
       $this->erro_campo = "mo03_dtcad";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo03_status == null ){ 
       $this->erro_sql = " Campo Status não informado.";
       $this->erro_campo = "mo03_status";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo03_opcao == null ){ 
       $this->erro_sql = " Campo Opção não informado.";
       $this->erro_campo = "mo03_opcao";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($mo03_codigo == "" || $mo03_codigo == null ){
       $result = db_query("select nextval('plugins.baseescturno_mo03_codigo_seq')"); 
       if($result==false){
         $this->erro_banco = str_replace("\n","",@pg_last_error());
         $this->erro_sql   = "Verifique o cadastro da sequencia: baseescturno_mo03_codigo_seq do campo: mo03_sequencial"; 
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false; 
       }
       $this->mo03_codigo = pg_result($result,0,0); 
     }else{
       $result = db_query("select last_value from plugins.baseescturno_mo03_codigo_seq");
       if(($result != false) && (pg_result($result,0,0) < $mo03_codigo)){
         $this->erro_sql = " Campo mo03_codigo maior que último número da sequencia.";
         $this->erro_banco = "Sequencia menor que este número.";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }else{
         $this->mo03_codigo = $mo03_codigo; 
       }
     }
     if(($this->mo03_codigo == null) || ($this->mo03_codigo == "") ){ 
       $this->erro_sql = " Campo mo03_codigo não declarado.";
       $this->erro_banco = "Chave Primaria zerada.";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     $sql = "insert into plugins.baseescturno(
                                       mo03_codigo 
                                      ,mo03_baseescola 
                                      ,mo03_turno 
                                      ,mo03_dtcad
                                      ,mo03_status
                                      ,mo03_opcao
                       )
                values (
                                $this->mo03_codigo 
                               ,$this->mo03_baseescola 
                               ,$this->mo03_turno 
                               ,".($this->mo03_dtcad == "null" || $this->mo03_dtcad == ""?"null":"'".$this->mo03_dtcad."'")." 
                               ,$this->mo03_status 
                               ,$this->mo03_opcao 
                      )";
     $result = db_query($sql); 
     if($result==false){ 
       $this->erro_banco = str_replace("\n","",@pg_last_error());
       if( strpos(strtolower($this->erro_banco),"duplicate key") != 0 ){
         $this->erro_sql   = "Escola/Turno ($this->mo03_codigo) não Incluído. Inclusão Abortada.";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_banco = "Escolas já Cadastrado";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       }else{
         $this->erro_sql   = "Escola/Turno ($this->mo03_codigo) não Incluído. Inclusão Abortada.";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       }
       $this->erro_status = "0";
       $this->numrows_incluir= 0;
       return false;
     }
     $this->erro_banco = "";
     $this->erro_sql = "Inclusão efetuada com Sucesso\\n";
     $this->erro_sql .= "Valores : ".$this->mo03_codigo;
     $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
     $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
     $this->erro_status = "1";
     return true;
   } 
   // funcao do sql 
   public function sql_query ($mo03_codigo = null,$campos = "*", $ordem = null, $dbwhere = "") { 
     $sql  = "select {$campos}";
     $sql .= "  from plugins.baseescturno ";
//     $sql .= "      inner join ciclos  on  ciclos.mo09_codigo = ciclosensino.mo03_ciclo";
//     $sql .= "      inner join ensino  on  ensino.ed10_i_codigo = ciclosensino.mo03_ensino";
//     $sql .= "      inner join mediacaodidaticopedagogica  on  mediacaodidaticopedagogica.ed130_codigo = ensino.ed10_mediacaodidaticopedagogica";
//     $sql .= "      inner join tipoensino  on  tipoensino.ed36_i_codigo = ensino.ed10_i_tipoensino";
     $sql2 = "";
     if (empty($dbwhere)) {
       if (!empty($mo03_sequencial)) {
         $sql2 .= " where baseescturno.mo03_codigo = $mo03_codigo "; 
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
   // funcao do sql 
   public function sql_query_file ($mo03_codigo = null, $campos = "*", $ordem = null, $dbwhere = "") {
     $sql  = "select {$campos} ";
     $sql .= "  from plugins.baseescturno ";
     $sql2 = "";
     if (empty($dbwhere)) {
       if (!empty($mo03_codigo)){
         $sql2 .= " where plugins.baseescturno.mo03_codigo = $mo03_codigo "; 
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

}
