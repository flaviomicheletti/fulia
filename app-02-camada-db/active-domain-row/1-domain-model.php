<?php

/**
 * 4.3.1 Domain Model Pattern
 * 
 * ...captura as idéias e expressa os conceitos envolvidos na aplicação, bem como
 * os relacionamentos por meio de um conjunto de objetos relacionados.
 *
 * São responsáveis por manipular os dados e conter as regras de negócios, geralmente
 * tem semelhânça com o modelo de banco de dados.
 *
 * Lembrando:
 * 1. modelo de negócios trabalha com dados e regras.
 * 2. modelo de dados trabalha apenas com dados.
 *
 * Permite a utilização de relacionamento complexos como a herança.
 *
 * O Domain Model pode ser simples a ponto de ter um objeto para cada tabela do modelo de dados ou
 * pode ter complexas represnetações com herânças, agregações. composições, etc... Dificultando
 * dessa forma o mapeamento para o banco de dados.
 *
 * (Oglio, Pablo Dall')
 *
 */

/**
 * class Produto
 * representa um Produto a ser vendido
 */
final class Produto {

    private $descricao;      // descrição do produto
    private $estoque;        // estoque atual
    private $preco_custo;    // preço de custo

    public function __construct($descricao, $estoque, $preco_custo) {
        $this->descricao = $descricao;
        $this->estoque = $estoque;
        $this->preco_custo = $preco_custo;
    }

    public function registraCompra($unidades, $preco_custo) {
        $this->preco_custo = $preco_custo;
        $this->estoque += $unidades;
    }

    public function registraVenda($unidades) {
        $this->estoque -= $unidades;
    }

    public function getEstoque() {
        return $this->estoque;
    }

    public function calculaPrecoVenda() {
        return $this->preco_custo * 1.3;
    }

}

/*
 * classe Venda
 * representa uma Venda de Produtos
 */

final class Venda {

    private $itens;    // itens da cesta

    public function addItem($quantidade, Produto $produto) {
        $this->itens[] = array($quantidade, $produto);
    }

    public function getItens() {
        return $this->itens;
    }

    public function finalizaVenda() {
        $total = 0;
        foreach ($this->itens as $item) {
            $quantidade = $item[0];
            $produto = $item[1];

            // soma o total
            $total+= $produto->calculaPrecoVenda() * $quantidade;

            // diminui estoque
            $produto->registraVenda($quantidade);
        }
        return $total;
    }

}

/**
 * Implementação
 */
// instancia objeto Venda
$venda = new Venda;

// adiciona alguns produtos
$venda->addItem(3, new Produto('Vinho', 10, 15));
$venda->addItem(2, new Produto('Salame', 20, 20));
$venda->addItem(1, new Produto('Queijo', 30, 10));

// finaliza a venda
echo $venda->finalizaVenda();
?>

