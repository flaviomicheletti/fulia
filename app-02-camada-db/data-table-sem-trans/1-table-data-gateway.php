<?php
/**
 * 4.4.1 - Table Data Gateway
 *
 * Interface de comunicação com o banco de dados que permite as operações do CRUD.
 *
 * Esse pattern determina que uma clase manipule uma única tabela do banco de dados e
 * que uma instância menipule todos os registros da tabela.
 *
 * Diz-se de natureza stateless.
 *
 * Esse pattern normalmente é utilizado com o pattern table Module (../modelo-de-negocios/02-table-module.php).
 *
 * (Oglio, Pablo Dall')
 */

/**
 * Classe ProdutoGateway, implementa Table Data Gateway.
 */
class ProdutoGateway
{

    function insert($id, $descricao, $estoque, $preco_custo)
    {
        $sql = "INSERT INTO Produtos (id, descricao, estoque, preco_custo)" .
               " VALUES ('$object->id', '$object->descricao', ".
               "'$object->estoque', '$object->preco_custo')";
    }
   

    function update($id, $descricao, $estoque, $preco_custo)
    {
        $sql = "UPDATE produtos set ".
               "   descricao    = '$object->descricao', " .
               "   estoque      = '$object->estoque', ".
               "   preco_custo = '$object->preco_custo' ".
               "   WHERE id     = '$object->id'";
    }

    function delete($id)
    {
        $sql = "DELETE FROM produtos where id='$id'";
    }   
    
    function getObject($id)
    {
        $sql = "SELECT * FROM produtos where id='$id'";
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    
    function getObjects($criterios)
    {
        $sql = "SELECT * FROM produtos WHERE $criterios";
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }    
    
    
}



/** 
 * Implementação
 */
$vinho = new Produto;
$vinho->id           = 4;
$vinho->descricao    = 'Vinho';
$vinho->estoque      = 10;
$vinho->preco_custo  = 15;


$gateway = new ProdutoGateway;		// instancia objeto ProdutoGateway
$gateway->insert($vinho);			// insere o objeto no banco de dados
print_r($gateway->getObject(4));	// exibe o objeto de código 4

$vinho->descricao = 'Vinho Cabernet';
$gateway->update($vinho);			// atualiza o objeto no banco de dados
print_r($gateway->getObject(4));	// exibe o objeto de código 4
?>

