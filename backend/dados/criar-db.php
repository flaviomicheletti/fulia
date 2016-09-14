<?php

require "../../backend/includes/Db.php";

$pdo = Db::conectar();
$pdo->query('CREATE DATABASE IF NOT EXISTS fulia;');


?>

<p>CREATE DATABASE IF NOT EXISTS fulia;</p>
<p>-- fim do script --</p>