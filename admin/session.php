<?php 
require_once("funcs.php");

session_start();

if(isset($_POST['login'])){
    if($_POST['pass'] == '0000' && $_POST['user'] == 'admin'){
        $_SESSION['usuario_logueado'] = true;
    }
}

if(isset($_GET['logout'])){
    unset($_SESSION['usuario_logueado']);
}

if(!isset($_SESSION['usuario_logueado'])){
    redirect('login.php');
}

?>