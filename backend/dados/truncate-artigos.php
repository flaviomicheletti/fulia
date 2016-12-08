<?php

require __DIR__  . "/../boot.php";

$pdo = Db::getConexao();
$sql = "TRUNCATE artigos;";
$pdo->query($sql);

?>

<p>
    <pre><?php echo $sql; ?></pre>
</p>
<p>-- fim do script --</p>