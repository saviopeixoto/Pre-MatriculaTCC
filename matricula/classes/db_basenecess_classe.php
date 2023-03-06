<?php
//MODULO: matriculaonline
//CLASSE DA ENTIDADE ciclosensino
class cl_basenecess { 
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
   var $mo11_codigo = 0; 
   var $mo11_base = 0; 
   var $mo11_necess = 0; 
   var $mo11_status = null; 

   // cria propriedade com as variaveis do arquivo 
   var $campos = "
                 mo11_codigo = int4 = Código 
                 mo11_base = int4 = Ciclo 
                 mo11_necess = int4 = Ensino 
                 mo11_status = bool = Ensino 
                 ";
   //funcao construtor da classe 
   function cl_basenecess() { 
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
   function incluir ($mo11_codigo){ 
     if($this->mo11_base == null ){ 
       $this->erro_sql = " Campo Codigo pré matricula não informado.";
       $this->erro_campo = "mo11_base";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo11_necess == null ){ 
       $this->erro_sql = " Campo Necessidade não informado.";
       $this->erro_campo = "mo11_necess";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo11_status == null ){ 
       $this->erro_sql = " Campo Status não informado.";
       $this->erro_campo = "mo11_status";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($mo11_codigo == "" || $mo11_codigo == null ){
       $result = db_query("select nextval('plugins.basenecess_mo11_codigo_seq')"); 
       if($result==false){
         $this->erro_banco = str_replace("\n","",@pg_last_error());
         $this->erro_sql   = "Verifique o cadastro da sequencia: basenecess_mo11_codigo_seq do campo: mo11_sequencial"; 
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false; 
       }
       $this->mo11_codigo = pg_result($result,0,0); 
     }else{
       $result = db_query("select last_value from plugins.basenecess_mo11_codigo_seq");
       if(($result != false) && (pg_result($result,0,0) < $mo11_codigo)){
         $this->erro_sql = " Campo mo11_codigo maior que último número da sequencia.";
         $this->erro_banco = "Sequencia menor que este número.";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }else{
         $this->mo11_codigo = $mo11_codigo; 
       }
     }
     if(($this->mo11_codigo == null) || ($this->mo11_codigo == "") ){ 
       $this->erro_sql = " Campo mo11_codigo não declarado.";
       $this->erro_banco = "Chave Primaria zerada.";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     $sql = "insert into plugins.basenecess(
                                       mo11_codigo 
                                      ,mo11_base 
                                      ,mo11_necess
                                      ,mo11_status
                       )
                values (
                                $this->mo11_codigo 
                               ,$this->mo11_base 
                               ,$this->mo11_necess 
                               ,$this->mo11_status 
                      )";
     $result = db_query($sql); 
     if($result==false){ 
       $this->erro_banco = str_replace("\n","",@pg_last_error());
       if( strpos(strtolower($this->erro_banco),"duplicate key") != 0 ){
         $this->erro_sql   = "Necessidade ($this->mo11_codigo) não Incluído. Inclusão Abortada.";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_banco = "Necessidade já Cadastrado";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       }else{
         $this->erro_sql   = "Necessidade ($this->mo11_codigo) não Incluído. Inclusão Abortada.";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
//         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$sql." \\n"));
       }
       $this->erro_status = "0";
       $this->numrows_incluir= 0;
       return false;
     }
     $this->erro_banco = "";
     $this->erro_sql = "Inclusão efetuada com Sucesso\\n";
     $this->erro_sql .= "Valores : ".$this->mo11_codigo;
     $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
     $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
     $this->erro_status = "1";
     return true;
   } 
   // funcao do sql 
   public function sql_query ($mo11_codigo = null,$campos = "*", $ordem = null, $dbwhere = "") { 
     $sql  = "select {$campos}";
     $sql .= "  from plugins.basenecess ";
//     $sql .= "      inner join ciclos  on  ciclos.mo09_codigo = ciclosensino.mo11_ciclo";
//     $sql .= "      inner join ensino  on  ensino.ed10_i_codigo = ciclosensino.mo11_ensino";
 //    $sql .= "      inner join mediacaodidaticopedagogica  on  mediacaodidaticopedagogica.ed130_codigo = ensino.ed10_mediacaodidaticopedagogica";
 //    $sql .= "      inner join tipoensino  on  tipoensino.ed36_i_codigo = ensino.ed10_i_tipoensino";
     $sql2 = "";
     if (empty($dbwhere)) {
       if (!empty($mo11_sequencial)) {
         $sql2 .= " where basenecess.mo11_codigo = $mo11_codigo "; 
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
   public function sql_query_file ($mo11_codigo = null, $campos = "*", $ordem = null, $dbwhere = "") {
     $sql  = "select {$campos} ";
     $sql .= "  from plugins.basenecess ";
     $sql2 = "";
     if (empty($dbwhere)) {
       if (!empty($mo11_codigo)){
         $sql2 .= " where plugins.basenecess.mo11_codigo = $mo11_codigo "; 
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

  function alterar($mo11_codigo=null,$dbwhere) { 
     $sql = " update plugins.basenecess set ";
     $virgula = "";
     if(trim($this->mo11_codigo)!=""){ 
       $sql  .= $virgula." mo11_codigo = $this->mo11_codigo ";
       $virgula = ",";
       if(trim($this->mo11_codigo) == null ){ 
         $this->erro_sql = " Campo Codigo nao Informado.";
         $this->erro_campo = "mo11_codigo";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }      
     if(trim($this->mo11_base)!=""){ 
       $sql  .= $virgula." mo11_base = $this->mo11_base ";
       $virgula = ",";
       if($this->mo11_base == null){ 
         $this->erro_sql = " Campo Base nao Informado.";
         $this->erro_campo = "mo11_base";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     if(trim($this->mo11_necess)!=""){ 
       $sql  .= $virgula." mo11_necess = '$this->mo11_necess' ";
       $virgula = ",";
       if($this->mo11_necess == null ){ 
         $this->erro_sql = " Campo Necessidade nao Informado.";
         $this->erro_campo = "mo11_necess";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     if(trim($this->mo11_status)!=""){ 
       $sql  .= $virgula." mo11_status = '$this->mo11_status' ";
       $virgula = ",";
       if($this->mo11_status == null ){ 
         $this->erro_sql = " Campo Status nao Informado.";
         $this->erro_campo = "mo11_status";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     $sql .= " where ";
     if (empty($dbwhere)) {
        if($mo11_codigo!=null) {
          $this->mo11_codigo = $mo11_codigo; 
          $sql .= " mo11_codigo = $this->mo11_codigo";
        }
     } else if (!empty($dbwhere)) {
        $sql .= " $dbwhere";
     }
     $result = db_query($sql);
     if($result==false){ 
       $this->erro_banco = str_replace("\n","",@pg_last_error());
       $this->erro_sql   = "basenecess nao Alterado. Alteracao Abortada.\\n";
       $this->erro_sql .= "Valores : ".$this->mo11_codigo;
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n")).$sql;
       $this->erro_status = "0";
       $this->numrows_alterar = 0;
       return false;
     }else{
       if(pg_affected_rows($result)==0){
         $this->erro_banco = "";
         $this->erro_sql = "basenecess nao foi Alterado. Alteracao Executada.\\n";
         $this->erro_sql .= "Valores : ".$this->mo11_codigo;
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n")).$sql;
         $this->erro_status = "1";
         $this->numrows_alterar = 0;
         return true;
       }else{
         $this->erro_banco = "";
         $this->erro_sql = "Alteração efetuada com Sucesso\\n";
         $this->erro_sql .= "Valores : ".$this->mo11_codigo;
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "1";
         $this->numrows_alterar = pg_affected_rows($result);
         return true;
       } 
     } 
  } 
}
