<?php
/*
 *     E-cidade Software Publico para Gestao Municipal
 *  Copyright (C) 2014  DBSeller Servicos de Informatica
 *                            www.dbseller.com.br
 *                         e-cidade@dbseller.com.br
 *
 *  Este programa e software livre; voce pode redistribui-lo e/ou
 *  modifica-lo sob os termos da Licenca Publica Geral GNU, conforme
 *  publicada pela Free Software Foundation; tanto a versao 2 da
 *  Licenca como (a seu criterio) qualquer versao mais nova.
 *
 *  Este programa e distribuido na expectativa de ser util, mas SEM
 *  QUALQUER GARANTIA; sem mesmo a garantia implicita de
 *  COMERCIALIZACAO ou de ADEQUACAO A QUALQUER PROPOSITO EM
 *  PARTICULAR. Consulte a Licenca Publica Geral GNU para obter mais
 *  detalhes.
 *
 *  Voce deve ter recebido uma copia da Licenca Publica Geral GNU
 *  junto com este programa; se nao, escreva para a Free Software
 *  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
 *  02111-1307, USA.
 *
 *  Copia da licenca no diretorio licenca/licenca_en.txt
 *                                licenca/licenca_pt.txt
 */

$sPath = 'libs/';

if (!isset($_SESSION)) {
   session_start();
}

/*
if (!session_is_registered("DB_login") || !session_is_registered("DB_id_usuario")) {
  session_destroy();
  echo "Sessão Inválida!(12)<br>Feche seu navegador e faça login novamente.\n";
  exit;
}
*/
require_once("{$sPath}db_conn.php");
//require_once("{$sPath}db_autoload.php");

if (!isset($_SESSION["DB_instit"])) {
   $_SESSION["DB_instit"] = $DB_INSTITUICAO;  
}

if (isset($_SESSION["DB_servidor"]) && isset($_SESSION["DB_base"]) && isset($_SESSION["DB_user"]) && isset($_SESSION["DB_porta"]) &&
   isset($_SESSION["DB_senha"])) {

   $DB_SERVIDOR = db_getsession("DB_servidor");
   $DB_BASE     = db_getsession("DB_base");
   $DB_PORTA    = db_getsession("DB_porta");
   $DB_USUARIO  = db_getsession("DB_user");
   $DB_SENHA    = db_getsession("DB_senha");
}

/**
 * Nome do programa atual
 */
$sProgramaAtual = basename($_SERVER["SCRIPT_NAME"]);

if (isset($_SESSION["DB_NBASE"])) {
   $DB_BASE = $_SESSION["DB_NBASE"];
}

if (isset($_SESSION["DB_servidor"])) {
   $DB_SERVIDOR = $_SESSION["DB_servidor"];
}

if (!($conn = @pg_connect("host=$DB_SERVIDOR dbname=$DB_BASE port=$DB_PORTA user=$DB_USUARIO password=$DB_SENHA"))) {
   echo "Contate com Administrador do Sistema! (Conexão Inválida.)   <br>Sessão terminada, feche seu navegador!\n";
   session_destroy();
   exit;
}

/**
 * Verifica configuracoes customizadas do PostgreSQL para o sProgramaAtual
 */
$sPgVersion = pg_result(pg_query($conn, "select substr(current_setting('server_version_num'),1,3)"), 0, 0);

if (isset($DB_CUSTOM_PG_CONF[$sPgVersion][$sProgramaAtual])) {
   $sSqlSetConfig = "";
   foreach ($DB_CUSTOM_PG_CONF[$sPgVersion][$sProgramaAtual] as $sSetting => $sValue) {

      if (substr($sSetting, 0, 3) <> "SQL") {
         $sSqlSetConfig .= "SET $sSetting TO $sValue;";
      } else {
         $sSqlSetConfig .= $sValue;
      }
   }

   pg_query($conn, $sSqlSetConfig);
}

/**
 * Salva sessao php, variavel $_SESSION, na base de dados
 */
require_once("{$sPath}db_libsession.php");

db_savesession($conn, $_SESSION);
db_logs();

?>