<?php

class cl_alocados {
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

  public function cl_alocados() { 
     $this->pagina_retorno =  basename($_SERVER["SCRIPT_NAME"]);
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
        $this->erro_sql   = "Record Vazio na Tabela:alocados";
        $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
        $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
        $this->erro_status = "0";
        return false;
      }
     return $result;
  }

  /**
   * Dados dos alunos alocados
   * @param  integer $mo13_codigo pk
   * @param  string  $campos
   * @param  string  $ordem
   * @param  string  $dbwhere
   * @return string               sql
   */
  public function sql_query_dadosaluno ($mo13_base = null, $campos = "*", $ordem = null, $dbwhere = "") {

    $sql  = " select {$campos} ";
    $sql .= "   from plugins.alocados ";
    $sql .= "    inner join plugins.mobase    on plugins.mobase.mo01_codigo  = plugins.alocados.mo13_base       ";
    $sql .= "    inner join escola            on escola.ed18_i_codigo        = plugins.alocados.mo13_baseescola ";
    $sql .= "    inner join bairro            on bairro.j13_codi             = plugins.mobase.mo01_bairro       ";
//    $sql .= "    inner join serie             on serie.ed11_i_codigo         = plugins.mobase.mo01_serie        ";

    $sql2 = "";
    if (empty($dbwhere)) {
      if (!empty($mo13_codigo)){
        $sql2 .= " where alocados.mo13_base = $mo13_base ";
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
