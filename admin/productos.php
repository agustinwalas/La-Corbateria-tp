<?php require_once("header.php"); require_once("session.php");
$datos= file_get_contents('../datos/productos.json');
$datosJson = json_decode($datos, true);

if(isset($_GET['del'])){
    unset($datosJson[$_GET['del']]);
    $fp = fopen('../datos/productos.json', 'w');
    $datosString = json_encode($datosJson);
    fwrite($fp,$datosString);
    fclose($fp);
    redirect('productos.php');
}



?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row data">
                    <div class="col-lg-10">
                     <h2>LA CORBATERIA PRODUCTOS</h2>   
                    </div>
                    <div class="col-lg-2">  
                     <button class="btn btn-primary"><a style="color: white;" href="crearProducto.php">Crear Producto</a></button>
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>descripcion</th>
                                    <th>precio</th>
                                    <th>imagen</th>
                                    <th>visible</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($datosJson as $p){
                            ?>
                                <tr>
                                    <td><?php echo $p['id']?></td>
                                    <td><?php echo $p['nombre']?></td>
                                    <td><?php echo $p['descripcion']?></td>
                                    <td><?php echo $p['precio']?></td>
                                    <td><?php echo $p['imagen']?></td>
                                    <td><?php echo $p['activo']?'Si':'No'?></td>
                                    <td><a href="crearProducto.php?edit=<?php echo $p['id']?>">Editar</a> <a href="productos.php?del=<?php echo $p['id']?>">Eliminar</a> </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>


                </div>              
                  <hr/>      
            </div>
        </div>
<?php require_once("footer.php"); ?>