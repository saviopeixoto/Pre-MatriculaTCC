<?php
//MODULO: matriculaonline
//CLASSE DA ENTIDADE ciclosensino
class cl_basefase { 
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
   var $mo12_codigo = 0; 
   var $mo12_base = 0; 
   var $mo12_fase = 0; 
   var $mo12_status = null; 
   // cria propriedade com as variaveis do arquivo 
   var $campos = "
                 mo12_codigo = int4 = Código 
                 mo12_base = int4 = Ciclo 
                 mo12_fase = int4 = Ensino 
                 mo12_status = boolean = Ensino 
                 ";
   //funcao construtor da classe 
   function cl_basefase() { 
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
   function incluir ($mo12_codigo){ 
     if($this->mo12_base == null ){ 
       $this->erro_sql = " Campo Codigo pré matricula não informado.";
       $this->erro_campo = "mo12_base";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo12_fase == null ){ 
       $this->erro_sql = " Campo Fase não informado.";
       $this->erro_campo = "mo12_fase";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo12_status == null ){ 
       $this->erro_sql = " Campo Status não informado.";
       $this->erro_campo = "mo12_status";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($mo12_codigo == "" || $mo12_codigo == null ){
       $result = db_query("select nextval('plugins.basefase_mo12_codigo_seq')"); 
       if($result==false){
         $this->erro_banco = str_replace("\n","",@pg_last_error());
         $this->erro_sql   = "Verifique o cadastro da sequencia: baseescola_mo12_codigo_seq do campo: mo12_sequencial"; 
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false; 
       }
       $this->mo12_codigo = pg_result($result,0,0); 
     }else{
       $result = db_query("select last_value from plugins.baseescola_mo12_codigo_seq");
       if(($result != false) && (pg_result($result,0,0) < $mo12_codigo)){
         $this->erro_sql = " Campo mo12_codigo maior que último número da sequencia.";
         $this->erro_banco = "Sequencia menor que este número.";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }else{
         $this->mo12_codigo = $mo12_codigo; 
       }
     }
     if(($this->mo12_codigo == null) || ($this->mo12_codigo == "") ){ 
       $this->erro_sql = " Campo mo12_codigo não declarado.";
       $this->erro_banco = "Chave Primaria zerada.";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     $sql = "insert into plugins.basefase(
                                       mo12_codigo 
                                      ,mo12_base 
                                      ,mo12_fase
                                      ,mo12_status
                       )
                values (
                                $this->mo12_codigo 
                               ,$this->mo12_base 
                               ,$this->mo12_fase
                               ,$this->mo12_status 
                      )";
     $result = db_query($sql); 
     if($result==false){ 
       $this->erro_banco = str_replace("\n","",@pg_last_error());
       if( strpos(strtolower($this->erro_banco),"duplicate key") != 0 ){
         $this->erro_sql   = "Escola/Fase ($this->mo12_codigo) não Incluído. Inclusão Abortada.";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_banco = "Escolas já Cadastrado";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       }else{
         $this->erro_sql   = "Escola/Fase ($this->mo12_codigo) não Incluído. Inclusão Abortada.";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$sql." \\n"));
       }
       $this->erro_status = "0";
       $this->numrows_incluir= 0;
       return false;
     }
     $this->erro_banco = "";
     $this->erro_sql = "Inclusão efetuada com Sucesso\\n";
     $this->erro_sql .= "Valores : ".$this->mo12_codigo;
     $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
     $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
     $this->erro_status = "1";
     return true;
   } 
   // funcao do sql 
   public function sql_query ($mo12_codigo = null,$campos = "*", $ordem = null, $dbwhere = "") { 
     $sql  = "select {$campos}";
     $sql .= "  from plugins.basefase ";
//     $sql .= "      inner join ciclos  on  ciclos.mo09_codigo = ciclosensino.mo12_ciclo";
//     $sql .= "      inner join ensino  on  ensino.ed10_i_codigo = ciclosensino.mo12_ensino";
//     $sql .= "      inner join mediacaodidaticopedagogica  on  mediacaodidaticopedagogica.ed130_codigo = ensino.ed10_mediacaodidaticopedagogica";
//     $sql .= "      inner join tipoensino  on  tipoensino.ed36_i_codigo = ensino.ed10_i_tipoensino";
     $sql2 = "";
     if (empty($dbwhere)) {
       if (!empty($mo12_sequencial)) {
         $sql2 .= " where basefase.mo12_codigo = $mo12_codigo "; 
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
   public function sql_query_file ($mo12_codigo = null, $campos = "*", $ordem = null, $dbwhere = "") {
     $sql  = "select {$campos} ";
     $sql .= "  from plugins.basefase ";
     $sql2 = "";
     if (empty($dbwhere)) {
       if (!empty($mo12_codigo)){
         $sql2 .= " where plugins.basefase.mo12_codigo = $mo12_codigo "; 
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

  public function excluir($mo12_base) {
    $sql  = "delete from plugins.basefase ";
    if (!empty($mo02_base)) {
       $sql .= " where plugins.basefase.mo12_base = $mo12_base ";
    }
    $result = db_query($sql);
    if($result==false){ 
       $this->erro_banco = str_replace("\n","",@pg_last_error());
       $this->erro_sql   = "BaseFase nao Excluído. Exclusão Abortada.\\n";
       $this->erro_sql .= "Valores : ".$mo12_base;
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       $this->numrows_excluir = 0;
       return false;
     }else{
       if(pg_affected_rows($result)==0){
         $this->erro_banco = "";
         $this->erro_sql = "BaseFase nao Encontrado. Exclusão não Efetuada.\\n";
         $this->erro_sql .= "Valores : ".$mo12_base;
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "1";
         $this->numrows_excluir = 0;
         return true;
       }else{
         $this->erro_banco = "";
         $this->erro_sql = "Exclusão efetuada com Sucesso\\n";
         $this->erro_sql .= "Valores : ".$mo12_base;
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "1";
         $this->numrows_excluir = pg_affected_rows($result);
         return true;
       } 
    } 
  }
}
