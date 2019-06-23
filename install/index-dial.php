<?php


require __DIR__  . "/../api/includes/Db.php";

#
# Mude o usuário e senha!
#
$pdo = Db::getConexao();

#
# Mostar tabelas
#
//$sth = $pdo->query("SHOW TABLES");
//echo "<pre><code>";
//var_dump($sth->fetchAll(PDO::FETCH_OBJ));

#
# Deletar tabela
#
//$pdo->query("DROP TABLE artigos");

#
# Criar tabelas
#
//$sql = file_get_contents('tabelas.sql');
//$pdo->query($sql);

#
# Criar dados
#
$pdo->query("TRUNCATE TABLE fuliaArtigos");
$sql = file_get_contents('dados.sql');
$pdo->query($sql);
?>

<p>Ok</p>