<?php

require_once('DAO.php');
require_once('CategoryDAO.php');
require_once('UserDAO.php');
require_once('../Modelos/productEntity.php');

class ProductDAO extends DAO{

    protected $UserDao;
    protected $CategoryDao;

    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'product';
        $this->UserDao = new UserDAO($con);
        $this->CategoryDao = new CategoryDAO($con);
    }

    public function getOne($id){
        $sql = "SELECT id,fechaCreacion,fechaModificacion,titulo,entrada,autor,categoria FROM $this->table WHERE id = $id";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'productEntity')->fetch();
        
        $resultado->setAutor($this->UserDao->getOne($resultado->getAutor()));
        $resultado->setCategoria($this->CategoryDao->getOne($resultado->getCategoria()));
        
        return $resultado;

    }

    public function getAll($where = array()){

        $sqlWhereStr = ' WHERE 1=1 ';

        if(!empty($where['autor'])){
            $sqlWhereStr.= ' AND autor = '.$where['autor'];
        }
        if(!empty($where['cat'])){
            $sqlWhereStr .= ' AND categoria = '.$where['cat'];
        }
 
/*
        $sqlWhere = array();

        if(!empty($where['autor'])){
            $sqlWhere[] = ' AND autor = '.$where['autor'];
        }
        if(!empty($where['cat'])){
            $sqlWhere[]= ' AND categoria = '.$where['cat'];
        }
        $sqlWhereStr = '';
        if(!empty($sqlWhere)) $sqlWhereStr = ' WHERE 1=1 '.implode('',$sqlWhere);
*/
        $sql = "SELECT  id,
                        fechaCreacion,
                        fechaModificacion,
                        titulo,
                        entrada,
                        autor,
                        categoria 
                FROM $this->table".$sqlWhereStr;

        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'productEntity')->fetchAll();

        foreach($resultado as $index=>$res){
            $resultado[$index]->setMarca($this->MarcaDao->getOne($res->getMarca()));
            $resultado[$index]->setCategoria($this->CategoryDao->getOne($res->getCategoria()));
        }

        return $resultado;

    }

    
}

?>
