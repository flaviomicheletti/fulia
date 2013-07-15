<?php
/**
 * 4.4.1 - Table Data Gateway com Data Transfer Object
 * 
 * É um objeto simples, sem relacionamentos como associações, agregações ou heranças,
 * utilizado apenas como estrutura para o transporte entre uma camada de método e outra.
 *
 * (Oglio, Pablo Dall')
 *
 */


/**
 * Esse é o Data Transfer Object
 */
class Produto
{
    public $id;
    public $descricao;
    public $estoque;
    public $preco_custo;
}


/*
 * Classe ProdutoGateway, implementa Table Data Gateway com Data Transfer Object.
 */
class ProdutoGateway
{
    /*
     * método insert
     * insere dados na tabela de Produtos
     * @param $object = objeto a ser inserido
     */
    function insert(Produto $object)
    {
        // cria instrução SQL de insert
        $sql = "INSERT INTO Produtos (id, descricao, estoque, preco_custo)" .
               " VALUES ('$object->id', '$object->descricao', ".
               "'$object->estoque', '$object->preco_custo')";
               
        // instancia objeto PDO
        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        
        // executa instrução SQL
        $conn->exec($sql);
        unset($conn);
    }
    
    /*
     * método update
     * altera os dados na tabela de Produtos
     * @param $object = objeto a ser alterado
     */
    function update(Produto $object)
    {
        // cria instrução SQL de UPDATE
        $sql = "UPDATE produtos set ".
               "   descricao    = '$object->descricao', " .
               "   estoque      = '$object->estoque', ".
               "   preco_custo = '$object->preco_custo' ".
               "   WHERE id     = '$object->id'";
        
        // instancia objeto PDO
        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        
        // executa instrução SQL
        $conn->exec($sql);
        unset($conn);
    }
    
    /*
     * método getObject
     * busca um registro da tabela de produtos
     * @param $id = ID do produto
     */
    function getObject($id)
    {
        // cria instrução SQL de SELECT
        $sql = "SELECT * FROM produtos where id='$id'";
        
        // instancia objeto PDO
        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        
        // executa consulta SQL
        $result = $conn->query($sql);
        $data = $result->fetch(PDO::FETCH_ASSOC);
        unset($conn);
        return $data;
    }
}



$vinho = new Produto;
$vinho->id           = 4;
$vinho->descricao    = 'Vinho';
$vinho->estoque      = 10;
$vinho->preco_custo  = 15;


$gateway = new ProdutoGateway;		// instancia objeto ProdutoGateway
$gateway->insert($vinho);		// insere o objeto no banco de dados
print_r($gateway->getObject(4));	// exibe o objeto de código 4

$vinho->descricao = 'Vinho Cabernet';

$gateway->update($vinho);		// atualiza o objeto no banco de dados
print_r($gateway->getObject(4));	// exibe o objeto de código 4
?>

