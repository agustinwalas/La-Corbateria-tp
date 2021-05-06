<?php

require_once('DAO.php');
require_once('../Modelos/MarcaEntity.php');

class MarcaDAO extends DAO{


    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'marca';
    }

    public function getOne($id){
        $sql = "SELECT id,nombre,activo FROM $this->table WHERE id = $id";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'MarcaEntity')->fetch();
        return $resultado;
    }

    public function getAll($where = array()){

        $sql = "SELECT id,nombre,activo FROM $this->table";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'MarcaEntity')->fetchAll();
        return $resultado;

    }

    
}

?>