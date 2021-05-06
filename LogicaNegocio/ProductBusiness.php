<?php

require_once('../DataAccess/ProductDAO.php');

class ProductBusiness{

    protected $ProductDao;

    function __construct($con){
        $this->ProductDao = new ProductDAO($con);
    }

    public function getProducts(){
        $products = $this->ProductDao->getAll(); 

        return $products;
    }



}