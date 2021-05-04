<?php

class BaseEntity
{

    protected $id;
    protected $fechaCreacion;
    protected $fechaModificacion; 

    public function __construct()
    { 
    }
    
    public function getId()
    {
        return $this->id;
    }
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }
    public function getFechaModificacion()
    {
        return $this->fechaModificacion;
    }
  
    
    /**
     * Defino los Setters
     * 
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
    }
    public function setFechaModificacion($fechaModificacion)
    {
        $this->fechaModificacion = $fechaModificacion;
    }
   
}  