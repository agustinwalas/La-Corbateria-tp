<?php

require_once('../DataAccess/PostDAO.php');

class PostBusiness{

    protected $ProductDao;

    function __construct($con){
        $this->ProductDao = new ProductDAO($con);
    }
}