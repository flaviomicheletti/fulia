<?php

require __DIR__  . "/../api/Db.php";

#
# Criar a base
#
$pdo = Db::conectar();
$pdo->query('CREATE DATABASE IF NOT EXISTS fulia;');

#
# Cirar as tabelas
#
$sql = file_get_contents('tabelas.sql');
$pdo->query($sql);

#
# Inserir dados (para teste)
#
$sql = file_get_contents('dados.sql');
$pdo->query($sql);
