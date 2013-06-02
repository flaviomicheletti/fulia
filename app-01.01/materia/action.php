<?php
/**
 * Este arquivo recebe as requisições ajax adivinda do módulo matéria
 * 
 * Recebemos a ação através da variável 'ac' e
 * a matéria através da variável "materia"
 * 
 * A variável matéria sempre será um Json.
 * 
 */

/*
 * requires
 */
require "../biblio/classes/Conn.class.php";
require "../biblio/models/Materia.model.php";


/*
 * Ação
 */
$acao = isset($_POST['ac']) ? $_POST['ac'] : null ;


/**
 * Executa a ação
 */
switch ($acao) {

    /**
     * Nâo estou utilizando esta ação
     */
    case "select":
        $materias = MateriaModel::getObjects($where=null, $order="ORDER BY id");
        echo json_encode($materias);
        break;

    /**
     * Insert do formulário
     */
    case "insert":
        try {
            $materia_request = isset($_POST['materia']) ? $_POST['materia'] : null ;
            $materia_request = stripslashes($materia_request);
            $materia_request = json_decode($materia_request);

            $materia = new MateriaModel();
            $materia->id             = $materia_request->id;
            $materia->url            = $materia_request->url;
            $materia->titulo         = $materia_request->titulo;
            $materia->resumo         = $materia_request->resumo;
            $materia->keywords       = $materia_request->keywords;
            $materia->nivel          = $materia_request->nivel;
            $materia->secao          = $materia_request->secao;
            $materia->autor          = $materia_request->autor;
            $materia->dt_atualizacao = $materia_request->dt_atualizacao;
            $materia->dt_criacao     = $materia_request->dt_criacao;
            $materia->ordem          = $materia_request->ordem;
            $materia->insert();

        } catch (Exception $exc) {
            echo json_encode(array("erro" => $exc->getMessage()));
        }
        break;

    /**
     * Update do formulário
     */
    case "update":
        try {
            $materia_request = isset($_POST['materia']) ? $_POST['materia'] : null ;
            $materia_request = stripslashes($materia_request);
            $materia_request = json_decode($materia_request);

            $materia = new MateriaModel();
            $materia->id             = $materia_request->id;
            $materia->url            = $materia_request->url;
            $materia->titulo         = $materia_request->titulo;
            $materia->resumo         = $materia_request->resumo;
            $materia->keywords       = $materia_request->keywords;
            $materia->nivel          = $materia_request->nivel;
            $materia->secao          = $materia_request->secao;
            $materia->autor          = $materia_request->autor;
            $materia->dt_atualizacao = $materia_request->dt_atualizacao;
            $materia->dt_criacao     = $materia_request->dt_criacao;
            $materia->ordem          = $materia_request->ordem;
            $materia->update();

        } catch (Exception $exc) {
            echo json_encode(array("erro" => $exc->getMessage()));
        }        
        break;

    /**
     * Deleta da lista
     */
    case "delete":
        $materia_request = isset($_POST['materia']) ? $_POST['materia'] : null ;
        $materia_request = stripslashes($materia_request);
        $materia_request = json_decode($materia_request);        
        
        $materia = new MateriaModel();
        $materia->id = $materia_request->id;
        $materia->delete();
        break;

}
?>