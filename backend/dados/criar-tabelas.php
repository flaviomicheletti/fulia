<?php

require "../../backend/includes/Db.php";

$pdo = Db::getConexao();
$sql = file_get_contents('tabelas.sql');
$pdo->query($sql);

?>

<p>
    <pre><?php echo $sql; ?></pre>
</p>
<p>-- fim do script --</p>