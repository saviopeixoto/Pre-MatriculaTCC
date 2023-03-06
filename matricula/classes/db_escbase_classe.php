<?php
//MODULO: matriculaonline
//CLASSE DA ENTIDADE ciclosensino
class cl_escbase { 
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
   var $mo15_sequencial = 0; 
   var $mo15_mobase = 0; 
   var $mo15_escola = 0; 
   var $mo15_irmao = 0; 
   // cria propriedade com as variaveis do arquivo 
   var $campos = "
                 mo15_sequencial = int4 = Código 
                 mo15_mobase = int4 = Ciclo 
                 mo15_escola = int4 = Ensino 
                 mo15_irmao = int4 = Ensino 
                 ";
   //funcao construtor da classe 
   function cl_escbase() { 
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
       $this->mo15_sequencial = ($this->mo15_sequencial == ""?@$GLOBALS["HTTP_POST_VARS"]["mo15_sequencial"]:$this->mo15_sequencial);
       $this->mo15_mobase = ($this->mo15_mobase == ""?@$GLOBALS["HTTP_POST_VARS"]["mo15_mobase"]:$this->mo15_mobase);
       $this->mo15_escola = ($this->mo15_escola == ""?@$GLOBALS["HTTP_POST_VARS"]["mo15_escola"]:$this->mo15_escola);
       $this->mo15_irmao = ($this->mo15_irmao == ""?@$GLOBALS["HTTP_POST_VARS"]["mo15_irmao"]:$this->mo15_irmao);
     }else{
       $this->mo15_sequencial = ($this->mo15_sequencial == ""?@$GLOBALS["HTTP_POST_VARS"]["mo15_sequencial"]:$this->mo15_sequencial);
     }
   }
   // funcao para Inclusão
   function incluir ($mo15_sequencial){ 
     //$this->atualizacampos();
     if($this->mo15_mobase == null ){ 
       $this->erro_sql = " Campo Codigo pré matricula não informado.";
       $this->erro_campo = "mo15_mobase";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo15_escola == null ){ 
       $this->erro_sql = " Campo Escola não informado.";
       $this->erro_campo = "mo15_escola";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($this->mo15_parent == null ){ 
       $this->erro_sql = " Campo Parente não informado.";
       $this->erro_campo = "mo15_parent";
       $this->erro_banco = "";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     if($mo15_sequencial == "" || $mo15_sequencial == null ){
       $result = db_query("select nextval('plugins.escbase_mo15_sequencial_seq')"); 
       if($result==false){
         $this->erro_banco = str_replace("\n","",@pg_last_error());
         $this->erro_sql   = "Verifique o cadastro da sequencia: escbase_mo15_sequencial_seq do campo: mo15_sequencial"; 
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false; 
       }
       $this->mo15_sequencial = pg_result($result,0,0); 
     }else{
       $result = db_query("select last_value from plugins.escbase_mo15_sequencial_seq");
       if(($result != false) && (pg_result($result,0,0) < $mo15_sequencial)){
         $this->erro_sql = " Campo mo15_sequencial maior que último número da sequencia.";
         $this->erro_banco = "Sequencia menor que este número.";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }else{
         $this->mo15_sequencial = $mo15_sequencial; 
       }
     }
     if(($this->mo15_sequencial == null) || ($this->mo15_sequencial == "") ){ 
       $this->erro_sql = " Campo mo15_sequencial não declarado.";
       $this->erro_banco = "Chave Primaria zerada.";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     $sql = "insert into plugins.escbase(
                                       mo15_sequencial 
                                      ,mo15_mobase 
                                      ,mo15_escola 
                                      ,mo15_parent
                       )
                values (
                                $this->mo15_sequencial 
                               ,$this->mo15_mobase 
                               ,$this->mo15_escola 
                               ,$this->mo15_parent 
                      )";
     $result = db_query($sql); 
     if($result==false){ 
       $this->erro_banco = str_replace("\n","",@pg_last_error());
       if( strpos(strtolower($this->erro_banco),"duplicate key") != 0 ){
         $this->erro_sql   = "Escolas ($this->mo15_sequencial) não Incluído. Inclusão Abortada.";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_banco = "Escolas já Cadastrado";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       }else{
         $this->erro_sql   = "Escolas ($this->mo15_sequencial) não Incluído. Inclusão Abortada.";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       }
       $this->erro_status = "0";
       $this->numrows_incluir= 0;
       return false;
     }
     $this->erro_banco = "";
     $this->erro_sql = "Inclusão efetuada com Sucesso\\n";
     $this->erro_sql .= "Valores : ".$this->mo15_sequencial;
     $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
     $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
     $this->erro_status = "1";
     /*
     $this->numrows_incluir= pg_affected_rows($result);
     $lSessaoDesativarAccount = db_getsession("DB_desativar_account", false);
     if (!isset($lSessaoDesativarAccount) || (isset($lSessaoDesativarAccount) && ($lSessaoDesativarAccount === false))) {
       $resaco = $this->sql_record($this->sql_query_file($this->mo15_sequencial  ));
       if(($resaco!=false)||($this->numrows!=0)){
         $resac = db_query("select nextval('db_acount_id_acount_seq') as acount");
         $acount = pg_result($resac,0,0);
         $resac = db_query("insert into db_acountacesso values($acount,".db_getsession("DB_acessado").")");
         $resac = db_query("insert into db_acountkey values($acount,21246,'$this->mo15_sequencial','I')");
         $resac = db_query("insert into db_acount values($acount,3829,21246,'','".AddSlashes(pg_result($resaco,0,'mo15_sequencial'))."',".db_getsession('DB_datausu').",".db_getsession('DB_id_usuario').")");
         $resac = db_query("insert into db_acount values($acount,3829,21247,'','".AddSlashes(pg_result($resaco,0,'mo15_mobase'))."',".db_getsession('DB_datausu').",".db_getsession('DB_id_usuario').")");
         $resac = db_query("insert into db_acount values($acount,3829,21249,'','".AddSlashes(pg_result($resaco,0,'mo15_escola'))."',".db_getsession('DB_datausu').",".db_getsession('DB_id_usuario').")");
       }
     }
     */
     return true;
   } 
   // funcao para alteracao
   public function alterar ($mo15_sequencial=null) { 
     $this->atualizacampos();
     $sql = " update escbase set ";
     $virgula = "";
     if(trim($this->mo15_sequencial)!="" || isset($GLOBALS["HTTP_POST_VARS"]["mo15_sequencial"])){ 
       $sql  .= $virgula." mo15_sequencial = $this->mo15_sequencial ";
       $virgula = ",";
       if(trim($this->mo15_sequencial) == null ){ 
         $this->erro_sql = " Campo Código não informado.";
         $this->erro_campo = "mo15_sequencial";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     if(trim($this->mo15_mobase)!="" || isset($GLOBALS["HTTP_POST_VARS"]["mo15_base"])){ 
       $sql  .= $virgula." mo15_base = $this->mo15_base ";
       $virgula = ",";
       if(trim($this->mo15_base) == null ){ 
         $this->erro_sql = " Campo Codigo pre matricula não informado.";
         $this->erro_campo = "mo15_mobase";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     if(trim($this->mo15_escola)!="" || isset($GLOBALS["HTTP_POST_VARS"]["mo15_escola"])){ 
       $sql  .= $virgula." mo15_escola = '$this->mo15_escola' ";
       $virgula = ",";
       if(trim($this->mo15_escola) == null ){ 
         $this->erro_sql = " Campo Escola não informado.";
         $this->erro_campo = "mo15_escola";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     if(trim($this->mo15_parent)!="" || isset($GLOBALS["HTTP_POST_VARS"]["mo15_parent"])){ 
       $sql  .= $virgula." mo15_parent = $this->mo15_parent ";
       $virgula = ",";
       if(trim($this->mo15_escola) == null ){ 
         $this->erro_sql = " Campo Escola não informado.";
         $this->erro_campo = "mo15_escola";
         $this->erro_banco = "";
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "0";
         return false;
       }
     }
     $sql .= " where ";
     if($mo15_sequencial!=null){
       $sql .= " mo15_sequencial = $this->mo15_sequencial";
     }
     $lSessaoDesativarAccount = db_getsession("DB_desativar_account", false);
     if (!isset($lSessaoDesativarAccount) || (isset($lSessaoDesativarAccount) && ($lSessaoDesativarAccount === false))) {
       $resaco = $this->sql_record($this->sql_query_file($this->mo15_sequencial));
       if ($this->numrows > 0) {
         for ($conresaco = 0; $conresaco < $this->numrows; $conresaco++) {
           $resac = db_query("select nextval('db_acount_id_acount_seq') as acount");
           $acount = pg_result($resac,0,0);
           $resac = db_query("insert into db_acountacesso values($acount,".db_getsession("DB_acessado").")");
           $resac = db_query("insert into db_acountkey values($acount,21246,'$this->mo15_sequencial','A')");
           if (isset($GLOBALS["HTTP_POST_VARS"]["mo15_sequencial"]) || $this->mo15_sequencial != "")
             $resac = db_query("insert into db_acount values($acount,3829,21246,'".AddSlashes(pg_result($resaco,$conresaco,'mo15_sequencial'))."','$this->mo15_sequencial',".db_getsession('DB_datausu').",".db_getsession('DB_id_usuario').")");
           if (isset($GLOBALS["HTTP_POST_VARS"]["mo15_base"]) || $this->mo15_base != "")
             $resac = db_query("insert into db_acount values($acount,3829,21247,'".AddSlashes(pg_result($resaco,$conresaco,'mo15_mobase'))."','$this->mo15_ciclo',".db_getsession('DB_datausu').",".db_getsession('DB_id_usuario').")");
           if (isset($GLOBALS["HTTP_POST_VARS"]["mo15_escola"]) || $this->mo15_escola != "")
             $resac = db_query("insert into db_acount values($acount,3829,21249,'".AddSlashes(pg_result($resaco,$conresaco,'mo15_escola'))."','$this->mo15_escola',".db_getsession('DB_datausu').",".db_getsession('DB_id_usuario').")");
         }
       }
     }
     $result = db_query($sql);
     if (!$result) { 
       $this->erro_banco = str_replace("\n","",@pg_last_error());
       $this->erro_sql   = "Escola não Alterado. Alteração Abortada.\\n";
       $this->erro_sql .= "Valores : ".$this->mo15_sequencial;
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       $this->numrows_alterar = 0;
       return false;
     } else {
       if (pg_affected_rows($result) == 0) {
         $this->erro_banco = "";
         $this->erro_sql = "Escola não foi Alterado. Alteração Executada.\\n";
         $this->erro_sql .= "Valores : ".$this->mo15_sequencial;
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "1";
         $this->numrows_alterar = 0;
         return true;
       } else {
         $this->erro_banco = "";
         $this->erro_sql = "Alteração efetuada com Sucesso\\n";
         $this->erro_sql .= "Valores : ".$this->mo15_sequencial;
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "1";
         $this->numrows_alterar = pg_affected_rows($result);
         return true;
       } 
     } 
   } 
   // funcao para exclusao 
   public function excluir ($mo15_sequencial=null,$dbwhere=null) { 
     $lSessaoDesativarAccount = db_getsession("DB_desativar_account", false);
     if (!isset($lSessaoDesativarAccount) || (isset($lSessaoDesativarAccount) && ($lSessaoDesativarAccount === false))) {
       if (empty($dbwhere)) {
         $resaco = $this->sql_record($this->sql_query_file($mo15_sequencial));
       } else { 
         $resaco = $this->sql_record($this->sql_query_file(null,"*",null,$dbwhere));
       }
       if (($resaco != false) || ($this->numrows!=0)) {
         for ($iresaco = 0; $iresaco < $this->numrows; $iresaco++) {
           $resac  = db_query("select nextval('db_acount_id_acount_seq') as acount");
           $acount = pg_result($resac,0,0);
           $resac  = db_query("insert into db_acountacesso values($acount,".db_getsession("DB_acessado").")");
           $resac  = db_query("insert into db_acountkey values($acount,21246,'$mo15_sequencial','E')");
           $resac  = db_query("insert into db_acount values($acount,3829,21246,'','".AddSlashes(pg_result($resaco,$iresaco,'mo15_sequencial'))."',".db_getsession('DB_datausu').",".db_getsession('DB_id_usuario').")");
           $resac  = db_query("insert into db_acount values($acount,3829,21247,'','".AddSlashes(pg_result($resaco,$iresaco,'mo15_mobase'))."',".db_getsession('DB_datausu').",".db_getsession('DB_id_usuario').")");
           $resac  = db_query("insert into db_acount values($acount,3829,21249,'','".AddSlashes(pg_result($resaco,$iresaco,'mo15_escola'))."',".db_getsession('DB_datausu').",".db_getsession('DB_id_usuario').")");
         }
       }
     }
     $sql = " delete from escbase
                    where ";
     $sql2 = "";
     if (empty($dbwhere)) {
        if (!empty($mo15_sequencial)){
          if (!empty($sql2)) {
            $sql2 .= " and ";
          }
          $sql2 .= " mo15_sequencial = $mo15_sequencial ";
        }
     } else {
       $sql2 = $dbwhere;
     }
     $result = db_query($sql.$sql2);
     if ($result == false) { 
       $this->erro_banco = str_replace("\n","",@pg_last_error());
       $this->erro_sql   = "Ensinos de um Ciclo não Excluído. Exclusão Abortada.\\n";
       $this->erro_sql .= "Valores : ".$mo15_sequencial;
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       $this->numrows_excluir = 0;
       return false;
     } else {
       if (pg_affected_rows($result) == 0) {
         $this->erro_banco = "";
         $this->erro_sql = "Ensinos de um Ciclo não Encontrado. Exclusão não Efetuada.\\n";
         $this->erro_sql .= "Valores : ".$mo15_sequencial;
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "1";
         $this->numrows_excluir = 0;
         return true;
       } else {
         $this->erro_banco = "";
         $this->erro_sql = "Exclusão efetuada com Sucesso\\n";
         $this->erro_sql .= "Valores : ".$mo15_sequencial;
         $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
         $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
         $this->erro_status = "1";
         $this->numrows_excluir = pg_affected_rows($result);
         return true;
       } 
     } 
   } 
   // funcao do recordset 
   public function sql_record($sql) { 
     $result = db_query($sql);
     if (!$result) {
       $this->numrows    = 0;
       $this->erro_banco = str_replace("\n","",@pg_last_error());
       $this->erro_sql   = "Erro ao selecionar os registros.";
       $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
       $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
       $this->erro_status = "0";
       return false;
     }
     $this->numrows = pg_num_rows($result);
      if ($this->numrows == 0) {
        $this->erro_banco = "";
        $this->erro_sql   = "Record Vazio na Tabela:ciclosensino";
        $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
        $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
        $this->erro_status = "0";
        return false;
      }
     return $result;
   }
   // funcao do sql 
   public function sql_query ($mo15_sequencial = null,$campos = "*", $ordem = null, $dbwhere = "") { 
     $sql  = "select {$campos}";
     $sql .= "  from plugins.ciclosensino ";
     $sql .= "      inner join ciclos  on  ciclos.mo09_codigo = ciclosensino.mo15_ciclo";
     $sql .= "      inner join ensino  on  ensino.ed10_i_codigo = ciclosensino.mo15_ensino";
     $sql .= "      inner join mediacaodidaticopedagogica  on  mediacaodidaticopedagogica.ed130_codigo = ensino.ed10_mediacaodidaticopedagogica";
     $sql .= "      inner join tipoensino  on  tipoensino.ed36_i_codigo = ensino.ed10_i_tipoensino";
     $sql2 = "";
     if (empty($dbwhere)) {
       if (!empty($mo15_sequencial)) {
         $sql2 .= " where ciclosensino.mo15_sequencial = $mo15_sequencial "; 
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
   public function sql_query_file ($mo15_sequencial = null, $campos = "*", $ordem = null, $dbwhere = "") {
     $sql  = "select {$campos} ";
     $sql .= "  from plugins.escbase ";
     $sql2 = "";
     if (empty($dbwhere)) {
       if (!empty($mo15_sequencial)){
         $sql2 .= " where plugins.escbase.mo15_sequencial = $mo15_sequencial "; 
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
