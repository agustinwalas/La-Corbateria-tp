<?php

abstract class DAO{

    protected $con;
    protected $table;

    public abstract function getOne($id);
    public abstract function getAll($where = array());

    public function __construct($con)
    {
        $this->con = $con;
        
    }
    
    public function save($datos = array()){

        $sql = "INSERT INTO users(nombre,email) VALUES ('".$datos['nombre']."','".$datos['email']."')";
        return $this->con->exec($sql);

    }

    public function modify($id, $datos = array()){
        $sql = "UPDATE users SET nombre = '".$datos['nombre']."', email ='".$datos['email']."', fechaModificacion = NOW() WHERE id = ".$id;
        echo $sql;
        return $this->con->exec($sql);

    }

    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE id = $id";
        return $this->con->exec($sql);

    }

}

?>