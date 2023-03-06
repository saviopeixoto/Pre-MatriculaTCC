<?php

class cl_escbairro {
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

   //funcao construtor da classe 
   function cl_escbairro() { 
     $this->pagina_retorno =  basename($GLOBALS["HTTP_SERVER_VARS"]["PHP_SELF"]);
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
        $this->erro_sql   = "Record Vazio na Tabela:procfiscalai";
        $this->erro_msg   = "Usuário: \\n\\n ".$this->erro_sql." \\n\\n";
        $this->erro_msg   .=  str_replace('"',"",str_replace("'","",  "Administrador: \\n\\n ".$this->erro_banco." \\n"));
        $this->erro_status = "0";
        return false;
      }
     return $result;
  }


  public function sql_query_escola_bairro( $sCampos = "*", $sOrdem = null, $sWhere = "" ) {

    $sSql  = "select mo08_bairro,ed18_c_nome,ed18_i_rua,j88_descricao,j14_nome,ed18_i_numero,ed18_c_compl,j13_descr ";
    $sSql  = "select {$sCampos} ";
    $sSql .= " from plugins.escbairro                                                                               ";  
    $sSql .= "   inner join escola on ed18_i_codigo = mo08_escola                                                   ";
    $sSql .= "   inner join bairro on j13_codi      = mo08_bairro                                                   ";
    $sSql .= "   inner join ruas on j14_codigo      = ed18_i_rua                                                    ";
    $sSql .= "   inner join ruastipo on j88_codigo  = j14_tipo                                                      "; 

    if (!empty($sWhere)) {
       $sSql .= " where $sWhere";
    }

    if (!empty($sOrdem)) {
       $sSql .= " order by {$sOrdem}";
    } else {
       $sSql .= "  order by mo08_bairro";
    }

    return $sSql;
  }
}