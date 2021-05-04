<!DOCTYPE html>
<html lang="en">

<head>
  <title>Productos</title>
</head>

<body>

  <?php require_once("header.php"); ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-6">
        <h1 class="my-4">Categorias</h1>
        <div class="list-group filters">
          <?php
           $categorias= file_get_contents('datos/categorias.json');
           $categoriasJson = json_decode($categorias, true);
           foreach($categoriasJson as $cat){
          ?>
          <a href="products.php?cat=<?php echo $cat['id']?>&marca=<?php echo isset($_GET['marca'])?$_GET['marca']:'' ?>" class="list-group-item"><?php echo $cat['nombre']?></a>
         <?php } ?> 
         <a href="products.php?cat=&marca=<?php echo isset($_GET['marca'])?$_GET['marca']:'' ?>" class="list-group-item">Todas</a>
        </div>
      </div>

      <div class="col-lg-6">
        <h1 class="my-4">Marcas</h1>
        <div class="list-group filters">
          <?php
           $marcas= file_get_contents('datos/marcas.json');
           $marcasJson = json_decode($marcas, true);
           foreach($marcasJson as $m){
          ?>
          <a href="products.php?marca=<?php echo $m['id']?>&cat=<?php echo isset($_GET['cat'])?$_GET['cat']:'' ?>" class="list-group-item"><?php echo $m['nombre']?></a>
         <?php } ?> 
         <a href="products.php?marca=&cat=<?php echo isset($_GET['cat'])?$_GET['cat']:'' ?>" class="list-group-item">Todas</a>
        </div>
      </div>
      
      <div class="col-lg-12">
        <div class="row">

        <?php
           $productos= file_get_contents('datos/productos.json');
           $productosJson = json_decode($productos, true);
           foreach($productosJson as $p){
              $imprimir= false;
            if($p['activo'] == true){
              $imprimir = true;
              if(!empty($_GET['cat'])){
                if($p['categoria'] != $_GET['cat']){
                  $imprimir= false;
                }
              }
              if($imprimir && !empty($_GET['marca'])){
                if($p['marca'] != $_GET['marca']){
                  $imprimir= false;
                }
              }
            }
            if($imprimir){
          ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="product.php?id=<?php echo $p['id']?>"><img class="card-img-top" src="<?php echo $p['imagen']?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="product.php?id=<?php echo $p['id']?>"><?php echo $p['nombre']?></a>
                </h4>
                <h5><?php echo $p['precio']?>$</h5>
                <p class="card-text"><?php echo $p['descripcion']?></p>
              </div>
              <div class="card-footer">
                <small class="text-muted"><?php 
                require_once("funcs.php");
                $puntuacion = $p['id'];
                promedioPuntaje($puntuacion)
                ?></small>
              </div>
            </div>
          </div>
          <?php
              }
          }
           ?>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <?php require_once("footer.php"); ?>

    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
