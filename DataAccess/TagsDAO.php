<?php

require_once('DAO.php');
require_once('../Modelos/TagEntity.php');

class TagDAO extends DAO{


    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'tags';
    }

    public function getOne($id){
        $sql = "SELECT id,fechaCreacion,fechaModificacion,nombre FROM $this->table WHERE id = $id";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'TagEntity')->fetch();
        return $resultado;

    }

    public function getAll($where = array()){

        $sql = "SELECT id,fechaCreacion,fechaModificacion,nombre FROM $this->table";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'TagEntity')->fetchAll();
        return $resultado;

    }

    
}

?>