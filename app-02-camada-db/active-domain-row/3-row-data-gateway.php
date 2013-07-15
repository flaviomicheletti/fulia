<?php

/**
 * 4.4.2 - Row Data Gateway
 *
 * Um Row Data Gateway deve prover métodos que permitam construir um objeto e posteriormente
 * armazená-lo no banco de dados, além de métodos estáticos que permitem carregar um objeto ou
 * conjutno de objetos do banco de dados.
 *
 * Cada instância representa um registro diferente no banco de dados.
 *
 * Diz-se de natureza statefull.
 *
 * (Oglio, Pablo Dall')
 *
 */

/**
 * classe ProdutoGateway
 * implementa Row Data Gateway
 * 
 * Representa cada registro da tabela (cada linha)
 * Não possue regras de negócio
 * StateFull
 */
class ProdutoGateway {

    private $data;

    function __get($prop) {
        return $this->data[$prop];
    }

    function __set($prop, $value) {
        $this->data[$prop] = $value;
    }

    function insert() {
        $sql = "INSERT INTO Produtos (id, descricao, estoque, preco_custo)" .
                " VALUES ('{$this->id}',      '{$this->descricao}', " .
                "         '{$this->estoque}', '{$this->preco_custo}')";
        echo $sql . "<br>\n";
    }

    function update() {
        $sql = "UPDATE produtos set " .
                "   descricao   = '{$this->descricao}', " .
                "   estoque     = '{$this->estoque}', " .
                "   preco_custo = '{$this->preco_custo}' " .
                "   WHERE id    = '{$this->id}'";
        echo $sql . "<br>\n";
    }

    function delete() {
        $sql = "DELETE FROM produtos where id='{$this->id}'";
        echo $sql . "<br>\n";
    }

    function getObject($id) {
        $sql = "SELECT * FROM produtos where id='{$id}'";
        echo $sql . "<br>\n";
    }

}

/**
 * Implementação
 */
// insere produtos na base de dados
$vinho = new ProdutoGateway;
$vinho->id = 5;
$vinho->descricao = 'Vinho Cabernet';
$vinho->estoque = 10;
$vinho->preco_custo = 10;
$vinho->insert();

$salame = new ProdutoGateway;
$salame->id = 6;
$salame->descricao = 'Salame';
$salame->estoque = 20;
$salame->preco_custo = 20;
$salame->insert();

// recupera um objeto e realiza alteração
$objeto = new ProdutoGateway;
$objeto->getObject(6);
$objeto->estoque = $objeto->estoque * 2;
$objeto->descricao = 'Salaminho Italiano';
$objeto->update();

// exclui o produto vinho da tabela
$vinho->delete();
?>
