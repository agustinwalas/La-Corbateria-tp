<?php

require_once('DAO.php');
require_once('../Modelos/CommentEntity.php');

class CommentDAO extends DAO{


    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'comments';
    }

    public function getOne($id){
        $sql = "SELECT id,fechaCreacion,fechaModificacion,comentario,puntuacion,ip,email FROM $this->table WHERE id = $id";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'CommentEntity')->fetch();
        return $resultado;

    }

    public function getAll($where = array()){

        $sql = "SELECT id,fechaCreacion,fechaModificacion,comentario,puntuacion,ip,email  FROM $this->table";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'CommentEntity')->fetchAll();
        return $resultado;

    }

    
}

?>