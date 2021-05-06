<?php

require_once ('BaseEntity.php');

class UserEntity extends BaseEntity
{
 
    private $nombre;
    private $email; 

    public function __construct()
    { 
        parent::__construct();
    }
    /**
     * Defino los Getters
     * 
     */
   
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Defino los Setters
     * 
     */
   
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
}  