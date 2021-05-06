<?php

require_once('../DataAccess/MarcaDAO.php');

class MarcaBusiness{

    protected $MarcaDao;

    function __construct($con){
        $this->MarcaDao = new MarcaDAO($con);
    }

    public function getMarca(){
        $marca = $this->MarcaDao->getAll(); 

        return $marca;
    }

}