<?php

require __DIR__  . "/../api/includes/Db.php";

#
# Nome da base de dados
#
$base = "fulia";

#
# Criar a base
#
$pdo = Db::conectar();
$pdo->query("DROP DATABASE  $base;");
$pdo->query("CREATE DATABASE  $base;");
$pdo->query("use $base");

#
# Criar as tabelas
#
$sql = file_get_contents('tabelas.sql');
$pdo->query($sql);

#
# Inserir dados (para teste)
#
$sql = file_get_contents('dados.sql');
$pdo->query($sql);
?>

<p>Instalação concluída com sucesso!</p>