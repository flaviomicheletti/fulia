<?php

/**
 * 4.4.3 Active Record
 *
 * Parecido com o row data gateway só que esse pattern implementa métodos do modelo conceitual (lógica de negócios)
 *
 */
/*
 * Classe Produto, implementa Active Record.
 */
class Produto {

    private $data;

    function __get($prop) {
        return $this->data[$prop];
    }

    function __set($prop, $value) {
        $this->data[$prop] = $value;
    }

    function insert() {
        $sql = "INSERT INTO Produtos (id, descricao, estoque, preco_custo)" .
                " VALUES ('{$this->id}',       '{$this->descricao}', " .
                "         '{$this->estoque}', '{$this->preco_custo}')";
        echo $sql . "<br>\n";
                
    }

    function update() {
        $sql = "UPDATE produtos set " .
                "   descricao    = '{$this->descricao}', " .
                "   estoque      = '{$this->estoque}', " .
                "   preco_custo = '{$this->preco_custo}' " .
                "   WHERE id     = '{$this->id}'";
        echo $sql . "<br>\n";
                
    }

    function delete() {
        $sql = "DELETE FROM produtos where id='{$this->id}'";
        echo $sql . "<br>\n";
        
    }

    public function registraCompra($unidades, $preco_custo) {
        $this->preco_custo = $preco_custo;
        $this->estoque += $unidades;
    }

    public function registraVenda($unidades) {
        $this->estoque -= $unidades;
    }

    public function calculaPrecoVenda() {
        return $this->preco_custo * 1.3;
    }

}

/**
 * Implementação
 */
$vinho = new Produto;
$vinho->id = 7;
$vinho->descricao = 'Vinho Cabernet';
$vinho->estoque = 10;
$vinho->preco_custo = 10;
$vinho->insert();
$vinho->registraVenda(5);

echo 'estoque:     ' . $vinho->estoque . "<br>\n";
echo 'preco_custo: ' . $vinho->preco_custo . "<br>\n";
echo 'preco_venda: ' . $vinho->calculaPrecoVenda() . "<br>\n";

$vinho->registraCompra(10, 20);
$vinho->update();

echo 'estoque:     ' . $vinho->estoque . "<br>\n";
echo 'preco_custo: ' . $vinho->preco_custo . "<br>\n";
echo 'preco_venda: ' . $vinho->calculaPrecoVenda() . "<br>\n";
?>
