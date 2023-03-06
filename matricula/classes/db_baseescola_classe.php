<?php
//MODULO: matriculaonline
//CLASSE DA ENTIDADE ciclosensino
class cl_baseescola { 
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
   var $mo02_codigo = 0; 
   var $mo02_base = 0; 
   var $mo02_escola = 0; 
   var $mo02_dtcad = null; 
   var $mo02_status = null; 
   var $mo02_parent = 0; 
   var $mo02_seq    = 0; 
   var $mo02_etapa  = 0; 

   // cria propriedade com as variaveis do arquivo 
   var $campos = "
                 mo02_codigo = int4 = Código 
                 mo02_base = int4 = Ciclo 
                 mo02_escola = int4 = Escola
                 mo02_dtcad = date = data cadastro
                 mo02_status = int4 = status 
                 mo02_parent = int4 = Irmao 
                 mo02_seq = int4 = Irmao 
                 mo02_etapa = int4 = Etapa 
                 ";
   //funcao construtor da classe 
   function cl_baseescola() { 
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
   function incluir ($mo02_codigo){ 
     if($this->mo02_base == null ){ 
       $this->erro_sql = " Campo Codigo pré matricula não informado.";
       $this->erro_campo = "mo02_base";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo02_escola == null ){ 
       $this->erro_sql = " Campo Escola não informado.";
       $this->erro_campo = "mo02_escola";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo02_dtcad == null ){ 
       $this->erro_sql = " Campo Data cadastrada não informado.";
       $this->erro_campo = "mo02_dtcad";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo02_status == null ){ 
       $this->erro_sql = " Campo Status não informado.";
       $this->erro_campo = "mo02_status";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo02_parent == null ){ 
       $this->erro_sql = " Campo Irmão não informado.";
       $this->erro_campo = "mo02_parent";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo02_etapa == null ){
       $this->mo02_etapa = "0";
     } 

     if($this->mo02_seq == null ){
       $this->mo02_seq = "1";
     }

     if($mo02_codigo == "" || $mo02_codigo == null ){
       $result = db_query("select nextval('plugins.baseescola_mo02_codigo_seq')"); 
       if($result==false){
         $this->erro_banco = str_replace("\n","",@pg_last_error());
         $this->erro_sql   = "Verifique o cadastro da sequencia: baseescola_mo02_codigo_seq do campo: mo02_sequencial"; 
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false; 
       }
       $this->mo02_codigo = pg_result($result,0,0); 
     }else{
       $result = db_query("select last_value from plugins.baseescola_mo02_codigo_seq");
       if(($result != false) && (pg_result($result,0,0) < $mo02_codigo)){
         $this->erro_sql = " Campo mo02_codigo maior que último número da sequencia.";
         $this->erro_banco = "Sequencia menor que este número.";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }else{
         $this->mo02_codigo = $mo02_codigo; 
       }
     }
     if(($this->mo02_codigo == null) || ($this->mo02_codigo == "") ){ 
       $this->erro_sql = " Campo mo02_codigo não declarado.";
       $this->erro_banco = "Chave Primaria zerada.";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     $sql = "insert into plugins.baseescola(
                                       mo02_codigo 
                                      ,mo02_base 
                                      ,mo02_escola 
                                      ,mo02_dtcad
                                      ,mo02_status
                                      ,mo02_parent
                                      ,mo02_seq
                                      ,mo02_etapa
                       )
                values (
                                $this->mo02_codigo 
                               ,$this->mo02_base 
                               ,$this->mo02_escola 
                               ,".($this->mo02_dtcad == "null" || $this->mo02_dtcad == ""?"null":"'".$this->mo02_dtcad."'")." 
                               ,$this->mo02_status 
                               ,$this->mo02_parent 
                               ,$this->mo02_seq 
                               ,$this->mo02_etapa 
                      )";
     $result = db_query($sql); 
     if($result==false){ 
       $this->erro_banco = str_replace("\n","",@pg_last_error());
       if( strpos(strtolower($this->erro_banco),"duplicate key") != 0 ){
         $this->erro_sql   = "Escolas ($this->mo02_codigo) não Incluído. Inclusão Abortada.";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_banco = "Escolas já Cadastrado";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       }else{
         $this->erro_sql   = "Escolas ($this->mo02_codigo) não Incluído. Inclusão Abortada.";
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
     $this->erro_sql .= "Valores : ".$this->mo02_codigo;
     $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
     $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
     $this->erro_status = "1";
     return true;
   } 

  public function excluir($mo02_base) {
    $sql  = "delete from plugins.baseescola ";
    if (!empty($mo02_base)) {
       $sql .= " where plugins.baseescola.mo02_base = $mo02_base ";
    }
    $result = db_query($sql);
    if($result==false){ 
       $this->erro_banco = str_replace("\n","",@pg_last_error());
       $this->erro_sql   = "BaseEscola nao Excluído. Exclusão Abortada.\\n";
       $this->erro_sql .= "Valores : ".$mo02_base;
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       $this->numrows_excluir = 0;
       return false;
     }else{
       if(pg_affected_rows($result)==0){
         $this->erro_banco = "";
         $this->erro_sql = "BaseEscola nao Encontrado. Exclusão não Efetuada.\\n";
         $this->erro_sql .= "Valores : ".$mo02_base;
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "1";
         $this->numrows_excluir = 0;
         return true;
       }else{
         $this->erro_banco = "";
         $this->erro_sql = "Exclusão efetuada com Sucesso\\n";
         $this->erro_sql .= "Valores : ".$mo02_base;
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "1";
         $this->numrows_excluir = pg_affected_rows($result);
         return true;
       } 
     }
  }  
   // funcao do sql 
  public function sql_query ($mo02_codigo = null,$campos = "*", $ordem = null, $dbwhere = "") { 
     $sql  = "select {$campos}";
     $sql .= "  from plugins.baseescola ";
//     $sql .= "      inner join ciclos  on  ciclos.mo09_codigo = ciclosensino.mo02_ciclo";
//     $sql .= "      inner join ensino  on  ensino.ed10_i_codigo = ciclosensino.mo02_ensino";
 //    $sql .= "      inner join mediacaodidaticopedagogica  on  mediacaodidaticopedagogica.ed130_codigo = ensino.ed10_mediacaodidaticopedagogica";
 //    $sql .= "      inner join tipoensino  on  tipoensino.ed36_i_codigo = ensino.ed10_i_tipoensino";
     $sql2 = "";
     if (empty($dbwhere)) {
       if (!empty($mo02_sequencial)) {
         $sql2 .= " where baseescola.mo02_codigo = $mo02_codigo "; 
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
   public function sql_query_file ($mo02_codigo = null, $campos = "*", $ordem = null, $dbwhere = "") {
     $sql  = "select {$campos} ";
     $sql .= "  from plugins.baseescola ";
     $sql2 = "";
     if (empty($dbwhere)) {
       if (!empty($mo02_codigo)){
         $sql2 .= " where plugins.baseescola.mo02_codigo = $mo02_codigo "; 
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

  function alterar($mo02_codigo=null,$mo02_seq=null, $dbwhere) { 
     $sql = " update plugins.baseescola set ";
     $virgula = "";
     if(trim($this->mo02_codigo)!=""){ 
       $sql  .= $virgula." mo02_codigo = $this->mo02_codigo ";
       $virgula = ",";
       if(trim($this->mo02_codigo) == null ){ 
         $this->erro_sql = " Campo Codigo nao Informado.";
         $this->erro_campo = "mo02_codigo";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }  
     if(trim($this->mo02_base)!=""){ 
       $sql  .= $virgula." mo02_base = $this->mo02_base ";
       $virgula = ",";
       if($this->mo02_base == null){ 
         $this->erro_sql = " Campo Base nao Informado.";
         $this->erro_campo = "mo02_base";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     if(trim($this->mo02_escola)!=""){ 
       $sql  .= $virgula." mo02_escola = '$this->mo02_escola' ";
       $virgula = ",";
       if($this->mo02_escola == null ){ 
         $this->erro_sql = " Campo Escola nao Informado.";
         $this->erro_campo = "mo02_escola";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     if(trim($this->mo02_status)!=""){ 
       $sql  .= $virgula." mo02_status = '$this->mo02_status' ";
       $virgula = ",";
     } 
     if(trim($this->mo02_dtcad)!="" || isset($GLOBALS["HTTP_POST_VARS"]["mo02_dtcad"]) &&  ($GLOBALS["HTTP_POST_VARS"]["mo02__dtcad"] !="") ){ 
       $sql  .= $virgula." mo02_dtcad = '$this->mo02_dtcad' ";
       $virgula = ",";
     }else{ 
       if(isset($GLOBALS["HTTP_POST_VARS"]["mo02_dtcad"])){ 
         $sql  .= $virgula." mo02_dtcad = null ";
         $virgula = ",";
       }
     }
     if(trim($this->mo02_parent)!=""){ 
       $sql  .= $virgula." mo02_parent = '$this->mo02_parent' ";
       $virgula = ",";
       if($this->mo02_parent == null ){ 
         $this->erro_sql = " Campo Irmao nao Informado.";
         $this->erro_campo = "mo02_parent";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     if(trim($this->mo02_seq)!=""){ 
       $sql  .= $virgula." mo02_seq = $this->mo02_seq ";
       $virgula = ",";
       if(trim($this->mo02_seq) == null ){ 
         $this->erro_sql = " Campo Sequencia nao Informado.";
         $this->erro_campo = "mo92_seq";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }  
     if(trim($this->mo02_etapa)!=""){ 
       $sql  .= $virgula." mo02_etapa = '$this->mo02_etapa' ";
       $virgula = ",";
       if($this->mo02_parent == null ){ 
         $this->erro_sql = " Campo Etapa nao Informado.";
         $this->erro_campo = "mo02_etapa";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     $sql .= " where ";
     if (empty($dbwhere)) {
        if($mo02_codigo!=null){
          $sql .= " mo02_codigo = $this->mo02_codigo";
        }
        if($mo02_seq!=null){
          $sql .= " and  mo02_seq = $this->mo02_seq";
        }
     } else if (!empty($dbwhere)) {
        $sql .= " $dbwhere";
     }
     $result = db_query($sql);
     if($result==false){ 
       $this->erro_banco = str_replace("\n","",@pg_last_error());
       $this->erro_sql   = "baseescola nao Alterado. Alteracao Abortada.\\n";
       $this->erro_sql .= "Valores : ".$this->mo11_codigo;
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n")).$sql;
       $this->erro_status = "0";
       $this->numrows_alterar = 0;
       return false;
     }else{
       if(pg_affected_rows($result)==0){
         $this->erro_banco = "";
         $this->erro_sql = "baseescola nao foi Alterado. Alteracao Executada.\\n";
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
