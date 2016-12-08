<?php

require __DIR__  . "/../boot.php";

$pdo = Db::conectar();
$pdo->query('CREATE DATABASE IF NOT EXISTS fulia;');


?>

<p>CREATE DATABASE IF NOT EXISTS fulia;</p>
<p>-- fim do script --</p>