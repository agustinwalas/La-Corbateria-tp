<?php

require_once('DAO.php');
require_once('../Modelos/SubCategoryEntity.php');

class SubCategoryDAO extends DAO{


    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'subCategories';
    }

    public function getOne($id){
        $sql = "SELECT id,nombre,category FROM $this->table WHERE id = $id";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'SubCategoryEntity')->fetch();
        return $resultado;

    }

    public function getAll($where = array()){

        $sql = "SELECT id,nombre,category FROM $this->table";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'SubCategoryEntity')->fetchAll();
        return $resultado;

    }

    
}

?>