<?php
/**
 * 
 */

/**
 * 
 */
class MateriaTableGateway {


    /**
     *
     * @throws Exception
     */
    function adicionar(MateriaDataTransfer $materia){

        $sql = "INSERT INTO materias"
                ."(id, url, titulo, resumo, keywords, nivel, secao, autor, dt_atualizacao, dt_criacao, ordem)"
                ." VALUES( "
                ."'null', "
                ."'".$materia->url."', "
                ."'".$materia->titulo."' ,"
                ."'".$materia->resumo."' ,"
                ."'".$materia->keywords."', "
                ."'".$materia->nivel."', "
                ."'".$materia->secao."', "
                ."'".$materia->autor."', "
                ."'".$materia->dt_atualizacao."', "
                ."'".$materia->dt_criacao."', "
                .$materia->ordem.")";
        $result = Conn::getConexao()->query($sql);
        
        if(!$result){
            $err = Conn::getConexao()->errorInfo();
            throw new Exception($err[2], $err[1]);
        }

        $materia->id = Conn::getConexao()->lastInsertId();

    }

    
    /**
     * Atualizar registro
     * 
     * @param MateriaDataTransfer $materia
     * @throws Exception
     */
    function update(MateriaDataTransfer $materia){
        
        $sql = "UPDATE materias "
                ."SET "
//                ."id = '".$materia->id."', "
                ."url = '".$materia->url."', "
                ."titulo = '".$materia->titulo."' ,"
                ."resumo = '".$materia->resumo."' ,"
                ."keywords = '".$materia->keywords."', "
                ."nivel = '".$materia->nivel."', "
                ."secao = '".$materia->secao."', "
                ."autor = '".$materia->autor."', "
                ."dt_atualizacao = '".$materia->dt_atualizacao."', "
                ."dt_criacao = '".$materia->dt_criacao."', "
                ."ordem = ".$materia->ordem
                ." WHERE id = ".$materia->id;

        $result = Conn::getConexao()->query($sql);
        
        if(!$result){
            $err = Conn::getConexao()->errorInfo();
            throw new Exception($err[2], $err[1]);
        }
    }


    /**
     * Deletar registro
     * 
     * @param type $id
     * @throws Exception
     */
    function delete($id){

        $sql    = "DELETE FROM materias WHERE id = {$id} LIMIT 1";
        $result = Conn::getConexao()->query($sql);

        if(!$result){
            $err = Conn::getConexao()->errorInfo();
            throw new Exception($err[2], $err[1]);
        }
    }
    
    
    /**
     *
     * Retorna um único objeto
     * 
     * @param type $id
     * @return type
     */
    function getObject($id) {

        $sql = "SELECT * FROM materias WHERE id = {$id}";
        $obj = Conn::getConexao()->query($sql)->fetch(PDO::FETCH_OBJ);
        
        return $obj;
        
    }

    
    /**
     * Retorna uma coleção de registros
     *
     * @param type $where
     * @param type $order
     * @return type
     */
    static function getObjects($where=null, $order=null) {

        $materias = array();

        $orderby = $order ? $order : "ORDER BY ordem ASC";

        $sql  = "SELECT * FROM materias $where $orderby";

        $stmt = Conn::getConexao()->query($sql);
        while( $materia = $stmt->fetch(PDO::FETCH_OBJ)  ){
            $materias[] = $materia;
        }

        return $materias;

    }
    
}
?>