<!DOCTYPE html>
<html lang="en">
<?php 
  require_once("funcs.php");
  include_once('../LogicaNegocio/ProductBusiness.php');
  $prod = new ProductBusiness($con);
  foreach($prod->getProducts() as $p){
  if($p->getId() == $_GET['id']){
  break;
  }
}

?>
<head>
  <title><?php echo $p->getNombre()?></title>
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
            <h4><?php echo $p->getPrecio()?>$</h4>
            <p class="card-text"><?php echo $p->getDescripcion()?></p>
            <span class="text-warning"><?php 
                require_once("funcs.php");
                $puntuacion = $p->getId();
                promedioPuntaje($puntuacion)
                ?></span>
          </div>
        </div>
        <!-- /.card -->

        
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
