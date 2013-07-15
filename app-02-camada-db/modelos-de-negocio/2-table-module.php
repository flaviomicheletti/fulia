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
    static $recordset = array();		   // representa nossa estrutura de dados
    
    /*
     * método adicionar
     * adiciona um produto ao registro
     * @param $descricao   = descriçao do produto
     * @param $estoque     = estoque atual
     * @param $preco_custo = preco de custo
     */
    public function adicionar($id, $descricao, $estoque, $preco_custo)
    {
        self::$recordset[$id]['descricao']   = $descricao;
        self::$recordset[$id]['estoque']     = $estoque;
        self::$recordset[$id]['preco_custo'] = $preco_custo;
    }
    
    /*
     * método registraCompra
     * registra uma compra, atualiza custo e incrementa o estoque atual do produto
     * @param $unidades    = unidades adquiridas
     * @param $preco_custo = novo preco de custo
     */
    public function registraCompra($id, $unidades, $preco_custo)
    {
        self::$recordset[$id]['preco_custo'] = $preco_custo;
        self::$recordset[$id]['estoque']    += $unidades;
    }
    
    /*
     * método registraVenda
     * registra uma venda e decrementa o estoque
     * @param $unidades = unidades vendidas
     */
    public function registraVenda($id, $unidades)
    {
        self::$recordset[$id]['estoque'] -= $unidades;
    }
    
    /*
     * método getEstoque
     * retorna a quantidade em estoque
     */
    public function getEstoque($id)
    {
        return self::$recordset[$id]['estoque'];
    }
    
    /*
     * método calculaPrecoVenda
     * retorna o preco de venda, baseado em uma margem de 30% sobre o custo
     */
    public function calculaPrecoVenda($id)
    {
        return self::$recordset[$id]['preco_custo'] * 1.3;
    }
}

// instancia objeto Produtos
$produtos = new Produtos;

// adiciona alguns Produtos
$produtos->adicionar(1, 'Vinho', 10, 15);
$produtos->adicionar(2, 'Salame', 20, 20);

// exibe os estoques atuais
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

