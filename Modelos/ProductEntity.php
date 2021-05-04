<?php

require_once ('BaseEntity.php');

class PostEntity extends BaseEntity
{
 
    private $nombre;
    private $imagen;
    private $precio;
    private $descripcion;
    private $activo;
    private $categoria;
    private $marca;

    public function __construct()
    {
        parent::__construct();

        $this->comentarios = array();
    }
    /**
     * Defino los Getters
     * 
     */
     
    public function getNombre()
    {
        return $this->Nombre;
    }
    public function getImagen()
    {
        return $this->Imagen;
    }
    public function getPrecio()
    {
        return $this->Precio;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function getComentarios()
    {
        return $this->comentarios;
    }
    public function getMarca()
    {
        return $this->Marca;
    }
    /**
     * Defino los Setters
     * 
     */
    
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }
    public function setImagen($Imagen)
    {
        $this->Imagen = $Imagen;
    }
    public function setPrecio($Precio)
    {
        $this->Precio = $Precio;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;
    }
    public function setMarca($Marca)
    {
        $this->Marca = $Marca;
    }
}
