<?php require_once("header.php"); require_once("session.php");
$datos= file_get_contents('../datos/categorias.json');
$datosJson = json_decode($datos, true);

if(isset($_GET['del'])){
    unset($datosJson[$_GET['del']]);
    $fp = fopen('../datos/categorias.json', 'w');
    $datosString = json_encode($datosJson);
    fwrite($fp,$datosString);
    fclose($fp);
    redirect('categorias.php');
}



?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row data">
                    <div class="col-lg-10">
                     <h2>LA CORBATERIA CATEGORIAS</h2>
                    </div>
                    <div class="col-lg-2">  
                    <button class="btn btn-primary"><a style="color: white;" href="crearCategoria.php">Crear Categoria</a></button>
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
                            foreach($datosJson as $c){
                            ?>
                                <tr>
                                    <td><?php echo $c['id']?></td>
                                    <td><?php echo $c['nombre']?></td>
                                    <td><a href="crearCategoria.php?edit=<?php echo $c['id']?>">Editar</a>
                                     <a href="categorias.php?del=<?php echo $c['id']?>">Eliminar</a> </td>
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