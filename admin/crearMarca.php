<?php 
require_once("header.php"); require_once("session.php");
$datos= file_get_contents('../datos/marcas.json');
$datosJson = json_decode($datos, true);

if(isset($_POST['add'])){
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
    } else {
        $id = date('ymdis');
    }
    
    $datosJson[$id] = array('id' => $id, 'nombre' =>$_POST['nombre']);
    $fp = fopen('../datos/marcas.json', 'w');
    $datosString = json_encode($datosJson);
    fwrite($fp,$datosString);
    fclose($fp);
    redirect('marcas.php');
}

if(isset($_GET['edit'])){
    $dato = $datosJson[$_GET['edit']];
    var_dump($dato);
}
?>



<div id="page-wrapper">
    <div id="page-inner">
        <div class="row data">
            <div class="col-lg-12">
                <h2><?php echo isset($dato)?'MODIFICAR MARCA':'NUEVA MARCA'?></h2>
            </div>                     
            <form action="" method="post">
                <span>Nombre:</span> <input required class="form-control" type="text" name="nombre" value="<?php echo isset($dato)?$dato['nombre']:''?>">
                <input type="submit" style="margin-top:10px" class="btn btn-info" name="add">
            </form>
        </div>                   
    </div>
</div>


