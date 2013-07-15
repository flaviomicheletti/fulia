<?php
/**
 * 4.3.2 Table Module
 * 
 * Uma única instância controla a lógica de negócios de todos os registros.
 * 
 * Composta pelos dados (db) e pelas regras de negócio (lógica de negócios).
 * 
 * Indicado no caso da aplicação ser baseada em uma estrutura orientada a tabelas
 * onde não temos a necessidade de complexos relacionamentos para 
 * representar o modelo conceitual da aplicação.
 *
 * Esse pattern normalmente é utilizado com o pattern table data gateway (../modelo-de-dados/01-table-gateway.php).
 *
 * (Oglio, Pablo Dall')
 *
 */

/**
 * Essa classe representa uma coleção de registros(?).
 * Se sim, deve-se chamar "Produtos", no plural.
 * 
 */


/**
 * Classe Produtos, representa um Produto a ser vendido.
 */
final class Produtos
{
    //static $recordset = array();
    
    public function adicionar($id, $descricao, $estoque, $preco_custo)
    {
		$gateway = new ProdutoGateway;
		$gateway->insert($id, $descricao, $estoque, $preco_custo);
    }
    
    public function registraCompra($id, $unidades, $preco_custo)
    {
		$gateway = new ProdutoGateway;
        $produto = $gateway->getObject($id);

        $produto['estoque']     += $unidades;
        $produto['preco_custo']  = $preco_custo;
        
		$gateway->update($produto['id'], $produto['descricao'], $produto['estoque'], $produto['preco_custo']);
    }
    
    public function registraVenda($id, $unidades)
    {
		$gateway = new ProdutoGateway;
        $produto = $gateway->getObject($id);

        $produto['estoque']     -= $unidades;
        
		$gateway->update($produto['id'], $produto['descricao'], $produto['estoque'], $produto['preco_custo']);       
    }
    
    public function getEstoque($id)
    {
		$gateway = new ProdutoGateway;
		$arr_assoc = $gateway->getObject($id);
        
		return $arr_assoc['estoque'];
    }
    
    public function calculaPrecoVenda($id)
    {
		$gateway = new ProdutoGateway;
		$arr_assoc = $gateway->getObject($id);
        
		return $arr_assoc['preco_custo'] * 1.3;        
    }
}

/**
 * Implementação
 */
$produtos = new Produtos;
$produtos->adicionar(1, 'Vinho', 10, 15);
$produtos->adicionar(2, 'Salame', 20, 20);

echo "estoques: <br>\n";
echo $produtos->getEstoque(1) . "<br>\n";
echo $produtos->getEstoque(2) . "<br>\n";

// exibe os preços de venda
echo "preços de venda : <br>\n";
echo $produtos->calculaPrecoVenda(1) . "<br>\n";
echo $produtos->calculaPrecoVenda(2) . "<br>\n";

// vende algumas unidades
$produtos->registraVenda(1, 5);
$produtos->registraVenda(2, 10);

// repõe o estoque
$produtos->registraCompra(1, 5, 16);
$produtos->registraCompra(2, 10, 22);

// exibe os preços de venda atuais
echo "preços de venda : <br>\n";
echo $produtos->calculaPrecoVenda(1) . "<br>\n";
echo $produtos->calculaPrecoVenda(2) . "<br>\n";
?>

