<?php require_once("header.php"); require_once("session.php");
$datos= file_get_contents('../datos/comentarios.json');
$datosJson = json_decode($datos, true);

if(isset($_GET['del'])){
    unset($datosJson[$_GET['del']]);
    $fp = fopen('../datos/comentarios.json', 'w');
    $datosString = json_encode($datosJson);
    fwrite($fp,$datosString);
    fclose($fp);
    redirect('comentarios.php');
}

?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row data">
                    <div class="col-lg-10">
                     <h2>LA CORBATERIA COMENTARIOS</h2>   
                    </div>
                    <select onchange="location = this.value;">
                    <option value="" disabled selected>Filtrar Producto</option>
                    <option value="comentarios.php">Todos</option>
                    <?php $productos= file_get_contents('../datos/productos.json');
                    $productosJson = json_decode($productos, true);
                    foreach($productosJson as $p){ ?>
                    <option value="comentarios.php?id=<?php echo $p['id']?>"><?php echo $p['nombre']?> <a href=""></a> </option>
                    <?php } ?>
                    </select>
                    <div class="col-lg-2">  
                    <button class="btn btn-primary"><a style="color: white;" href="crearMarca.php">Crear Marca</a></button>
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Comentario</th>
                                    <th>Puntaje</th>
                                    <th>Mail</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($datosJson as $c){
                                $imprimir = true;
                                if(!empty($_GET['id'])){
                                    if($c['productComment'] != $_GET['id']){
                                        $imprimir = false;
                                    }
                                }
                                if($imprimir){
                            ?>
                                <tr>
                                    <td><?php echo $c['id']?></td>
                                    <td><?php echo $c['nombre']?></td>
                                    <td><?php echo $c['descripcion']?></td>
                                    <td><?php echo $c['puntuacion']?></td>
                                    <td><?php echo $c['mail']?></td>
                                    <td><a href="comentarios.php?del=<?php echo $c['id']?>">Eliminar</a> </td>
                                </tr>
                                <?php
                            } }
                            ?>
                            </tbody>
                        </table>


                </div>              
                  <hr/>      
            </div>
        </div>
<?php require_once("footer.php"); ?>