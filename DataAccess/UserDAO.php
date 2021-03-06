<?php

require_once('DAO.php');
require_once('../Modelos/UserEntity.php');

class UserDAO extends DAO{


    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'users';
    }

    public function getOne($id){
        $sql = "SELECT id,fechaCreacion,fechaModificacion,nombre,email FROM $this->table WHERE id = $id";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'UserEntity')->fetch();
        return $resultado;

    }

    public function getAll($where = array()){

        $sql = "SELECT id,fechaCreacion,fechaModificacion,nombre,email FROM $this->table";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'UserEntity')->fetchAll();
        return $resultado;

    }

    
}

?>