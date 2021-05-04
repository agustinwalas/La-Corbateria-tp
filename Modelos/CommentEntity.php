<?php

require_once ('BaseEntity.php');

class PostEntity extends BaseEntity
{
 
    private $comentario;
    private $puntuacion;
    private $ip;
    private $email; 
    private $product;

    public function __construct()
    {
        parent::__construct(); 
    }
    /**
     * Defino los Getters
     * 
     */
     
    public function getComentario()
    {
        return $this->comentario;
    }
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }
    public function getPost()
    {
        return $this->post;
    }
    public function getIp()
    {
        return $this->ip;
    }
    public function getEmail()
    {
        return $this->email;
    } 
    public function getProduct()
    {
        return $this->product;
    }
    /**
     * Defino los Setters
     * 
     */
    
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }
    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;
    }
    public function setProduct($product)
    {
        $this->product = $product;
    }
    public function setIp($ip)
    {
        $this->ip = $ip;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
}
