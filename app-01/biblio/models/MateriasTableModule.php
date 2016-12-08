<?php
/**
 * 
 */

/**
 *
 */
class MateriasTableModule {


    /**
     * Inserir MAtéria
     * 
     * @param MateriaDataTransfer $materia
     */
    function adicionar(MateriaDataTransfer $materia){

		$gateway = new MateriaTableGateway;
		$gateway->insert($materia);

    }


    /**
     * Atualizar matéria
     * 
     * @param MateriaDataTransfer $materia
     */
    function atualizar(MateriaDataTransfer $materia){

		$gateway = new MateriaTableGateway;
		$gateway->update($materia);

    }

    /**
     * Exlcuir matéria
     * 
     * @param MateriaDataTransfer $materia
     */
    function excluir(MateriaDataTransfer $materia){

		$gateway = new MateriaTableGateway;
		$gateway->deletar($materia->id);

    }

    
    /**
     * Retorna uma matéria
     * 
     * @param type $id
     * @return \MateriaDataTransfer
     */
    function getObject($id) {

		$gateway = new MateriaTableGateway;
		$obj = $gateway->getObject($id);

        $materia = new MateriaDataTransfer();
        $materia->id             = $obj->id;
        $materia->url            = $obj->url;
        $materia->titulo         = $obj->titulo;
        $materia->resumo         = $obj->resumo;
        $materia->keywords       = $obj->keywords;
        $materia->nivel          = $obj->nivel;
        $materia->secao          = $obj->secao;
        $materia->autor          = $obj->autor;
        $materia->dt_atualizacao = $obj->dt_atualizacao;
        $materia->dt_criacao     = $obj->dt_criacao;
        $materia->ordem          = $obj->ordem;

        return  $materia;

    }
    
    
    /**
     * Listar matérias
     * 
     * @param null $where
     * @param null $order
     * @return type
     */
    static function getObjects($where=null, $order=null) {

        $materias = array();
        
		$gateway = new MateriaTableGateway;
		$materias = $gateway->getObjects($where=null, $order=null);
        
        return  $materias;

    }
    
    
    /**
     * Draft (favor ignorar)
     * 
     * Esse método não está sendo usado planamente.
     * Ele ainda é um rascunho.
     * 
     * Pretendo utilizá-lo nas novas versões.
     * 
     * @throws Exception
     */
    function validar(){
//        if(!$this->id) throw new Exception("faltou-id");
//        if(!$this->url) throw new Exception("faltou-url");
//        if(!$this->titulo) throw new Exception("faltou-titulo");
//        if(!$this->resumo) throw new Exception("faltou-resumo");
//        if(!$this->keywords) throw new Exception("faltou-keywords");
//        if(!$this->nivel) throw new Exception("faltou-nivel");
//        if(!$this->secao) throw new Exception("faltou-seção");
//        if(!$this->autor) throw new Exception("faltou-autor");
//        if(!$this->dt_atualizacao) throw new Exception("faltou-dt_atualizacao");
//        if(!$this->dt_criacao) throw new Exception("faltou-dt_criacao");
        if(!$this->ordem) throw new Exception("faltou-ordem");
    }    
    
}
?>