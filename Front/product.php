<!DOCTYPE html>
<html lang="en">
<?php 
  require_once("funcs.php");
  $productos= file_get_contents('datos/productos.json');
  $productosJson = json_decode($productos, true);
  foreach($productosJson as $p){
  if($p['id'] == $_GET['id']){
  break;
  }
}

$datos= file_get_contents('datos/comentarios.json');
$datosJson = json_decode($datos, true);

if(isset($_POST['add'])){
  $productComment =  $p['id'];
  $id = date('ymdis');        
  $datosJson[$id] = array('id' => $id, 'productComment' => $productComment, 'nombre' =>$_POST['nombre'],'mail' =>$_POST['mail'], 'descripcion' =>$_POST['descripcion'], 'puntuacion' =>$_POST['puntuacion']);
  $fp = fopen('datos/comentarios.json', 'w');
  $datosString = json_encode($datosJson);
  fwrite($fp,$datosString);
  fclose($fp);
}

?>
<head>
  <title><?php echo $p['nombre']?></title>
</head>

<body>

<?php require_once("header.php");

?>

  <!-- Page Content -->
  <div class="container">
        <div class="card mt-4">
          <img class="card-img-top img-fluid" src="<?php echo $p['imagen']?>" alt="">
          <div class="card-body">
            <h3 class="card-title"> <?php echo $p['nombre']?> </h3>
            <h4><?php echo $p['precio']?>$</h4>
            <p class="card-text"><?php echo $p['descripcion']?></p>
            <span class="text-warning"><?php 
                require_once("funcs.php");
                $puntuacion = $p['id'];
                promedioPuntaje($puntuacion)
                ?></span>
          </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Comentarios
          </div>
          <div class="card-body">
          <?php 
         
          foreach($datosJson as $c){    
              if($c['productComment'] == $p['id']){
            ?>
            <p><?php echo $c['descripcion']?></p>
            <small class="text-muted">Comentario de <?php echo $c['nombre']?> ---- <?php echo toStar($c['puntuacion'])?> </small>
            <hr>
            <?php }}
             
               
            ?>
            
            <form action="" method="post">
            
            <div class="form-group">
              <label>Nombre:</label>
              <input required type="text" name="nombre" class="form-control">
            </div>
            <div class="form-group">
              <label >Ingrese su comentario:</label>
              <textarea required name="descripcion" class="form-control" rows="3"></textarea>
              <label>Ingrese su mail:</label>
              <input type="email" name="mail" required class="form-control">
            </div>
            <select required name="puntuacion" id="">
            <option value="" disabled selected>Puntaje</option>
            <option value="1">1 Estrella</option>
            <option value="2">2 Estrellas</option>
            <option value="3">3 Estrellas</option>
            <option value="4">4 Estrellas</option>
            <option value="5">5 Estrellas</option>
            </select>
            <input type="submit" name="add" style="margin: 0 !important; margin-left: 50vw !important;" class="btn btn-primary">
            </form>
          </div>
        </div>
        <!-- /.card -->


    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php require_once("footer.php"); ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
