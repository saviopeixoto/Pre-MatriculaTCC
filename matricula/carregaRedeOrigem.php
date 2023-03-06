<?php
echo '1.ok<br/>';
require_once('libs/db_conecta.php');


$sSqlRedeOrigem = 'Select * from redeorigem order by mo05_codigo';
$rsRedeOrigem   = db_query($sSqlRedeOrigem);
$registro = pg_num_rows($rsRedeOrigem);

for($cont=0;$cont<$registro;$cont++) {
  db_fieldsmemory($rsRedeOrigem,$cont);
  $redeOrigem[] = '{"mo05_codigo": $mo05_codigo, "mo05_descr": $mo05_descr}';	 
}

echo json_encode($redeorigem);

?>