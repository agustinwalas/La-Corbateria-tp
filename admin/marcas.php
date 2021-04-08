<?php require_once("header.php"); require_once("session.php");
$datos= file_get_contents('../datos/marcas.json');
$datosJson = json_decode($datos, true);

if(isset($_GET['del'])){
    unset($datosJson[$_GET['del']]);
    $fp = fopen('../datos/marcas.json', 'w');
    $datosString = json_encode($datosJson);
    fwrite($fp,$datosString);
    fclose($fp);
    redirect('marcas.php');
}



?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row data">
                    <div class="col-lg-10">
                     <h2>LA CORBATERIA MARCAS</h2>   
                    </div>
                    <div class="col-lg-2">  
                    <button class="btn btn-primary"><a style="color: white;" href="crearMarca.php">Crear Marca</a></button>
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($datosJson as $m){
                            ?>
                                <tr>
                                    <td><?php echo $m['id']?></td>
                                    <td><?php echo $m['nombre']?></td>
                                    <td><a href="crearMarca.php?edit=<?php echo $m['id']?>">Editar</a> 
                                    <a href="marcas.php?del=<?php echo $m['id']?>">Eliminar</a> </td>
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