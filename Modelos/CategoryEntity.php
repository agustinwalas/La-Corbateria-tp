<?php

require_once ('BaseEntity.php');

class CategoryEntity extends BaseEntity
{
    private $nombre;

    public function __construct()
    {
        parent::__construct();

    }
     
    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}
