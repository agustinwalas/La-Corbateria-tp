<?php 
require_once("header.php"); require_once("session.php");
$datos= file_get_contents('../datos/productos.json');
$datos2= file_get_contents('../datos/categorias.json');
$datos3= file_get_contents('../datos/marcas.json');
$datosJson = json_decode($datos, true);



if(isset($_POST['add'])){
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
    } else {
        $id = date('ymdis');
    }

    if(isset($_FILES['imagen'])){
        move_uploaded_file($_FILES['imagen']['tmp_name'],'../img/'.$_FILES['imagen']['name']);
    }
    
    $datosJson[$id] = array('id' => $id, 'nombre' =>$_POST['nombre'], 'imagen' =>'img/'.$_FILES['imagen']['name'], 'precio' =>$_POST['precio'], 'descripcion' =>$_POST['descripcion'], 'activo' =>$_POST['activo'], 'categoria' =>$_POST['categoria'], 'marca' =>$_POST['marca'],'puntuacion' => $puntuacion);
    $fp = fopen('../datos/productos.json', 'w');
    $datosString = json_encode($datosJson);
    fwrite($fp,$datosString);
    fclose($fp);
    redirect('productos.php');
}

if(isset($_GET['edit'])){
    $dato = $datosJson[$_GET['edit']];
}


?>



<div id="page-wrapper">
    <div id="page-inner">
        <div class="row data">
            <div class="col-lg-12">
                <h2><?php echo isset($dato)?'MODIFICAR PRODUCTO':'NUEVO PRODUCTO'?></h2>
            </div>                     
            <form action="" method="post" enctype="multipart/form-data">
                <span>Nombre:</span> <input required class="form-control" type="text" name="nombre" value="<?php echo isset($dato)?$dato['nombre']:''?>"> <br>
                <span>Descripcion:</span> <input required class="form-control" type="text" name="descripcion" value="<?php echo isset($dato)?$dato['descripcion']:''?>"> <br>
                <span>Precio:</span> <input required class="form-control" type="text" name="precio" value="<?php echo isset($dato)?$dato['precio']:''?>"> <br>
                <span>Categoria:</span> <select required class="form-control" name="categoria"> 
                <option value="" disabled selected>Seleccione Categoria</option>
                <?php foreach(json_decode($datos2, true) as $cat){?>
                <option value="<?php echo $cat['id']?>"><?php echo $cat['nombre']?></option>  <?php }?>
                </select> <br>
                <span>Marca:</span> <select required class="form-control" name="marca"> 
                <option value="" disabled selected>Seleccione Marca</option>
                <?php foreach(json_decode($datos3, true) as $mar){?>
                <option value="<?php echo $mar['id']?>"><?php echo $mar['nombre']?></option>  <?php }?>
                </select> <br>
                <span>Imagen:</span> <input required class="form-control" type="file" name="imagen"> <br>
                <span>visible:</span> <input class="form-check-label" type="checkbox" name="activo" <?php echo isset($dato) && $dato['activo']? 'checked' :''?>> <br>
                <input type="submit" class="btn btn-info" name="add"> 
            </form>
        </div>                   
    </div>
</div>


