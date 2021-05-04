<?php

require_once('../DataAccess/CategoryDAO.php');

class CategoryBusiness{

    protected $CategoryDao;

    function __construct($con){
        $this->CategoryDao = new CategoryDAO($con);
    }

    public function getCategories(){
        $categorias = $this->CategoryDao->getAll(); 

        return $categorias;
    }

}