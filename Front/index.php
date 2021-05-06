<body>

  <?php require_once("header.php"); ?>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <h1 class="my-4">Categorias</h1>
        <div class="list-group">
          <?php
          include_once('../LogicaNegocio/CategoryBusiness.php');
          $Cat = new CategoryBusiness($con);
          foreach($Cat->getCategories() as $cat){
          ?>
          <a href="products.php?cat=<?php echo $Cat->GetId()?>&marca=<?php echo isset($_GET['marca'])?$_GET['marca']:'' ?>" class="list-group-item"><?php echo $cat['nombre']?></a>
         <?php } ?> 
          <a href="products.php?cat=&marca=<?php echo isset($_GET['marca'])?$_GET['marca']:'' ?>" class="list-group-item">Todas</a>
        </div>

        <h1 class="my-4">Marcas</h1>
        <div class="list-group">
          <?php
          include_once('../LogicaNegocio/MarcaBusiness.php');
          $Mar = new CategoryBusiness($con);
           foreach($mar->getMarca() as $m){
          ?>
          <a href="products.php?marca=<?php echo $m->GetId()?>&cat=<?php echo isset($_GET['cat'])?$_GET['cat']:'' ?>" class="list-group-item"><?php echo $m['nombre']?></a>
         <?php } ?> 
         <a href="products.php?marca=&cat=<?php echo isset($_GET['cat'])?$_GET['cat']:'' ?>" class="list-group-item">Todas</a>
        </div>


      </div>
      
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="row mt-5">

          <?php
          $i=0;
          $prod = new ProductBusiness($con);
          foreach($p->getProducts() as $p){
             if($p->getActivo() == true){
          ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="product.php?id=<?php echo $p->GetId()?>"><img class="card-img-top" src="<?php echo $p->GetImagen()?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="product.php?id=<?php echo $p->GetId()?>"><?php echo $p->GetNombre()?></a>
                </h4>
                <h5><?php echo $p->GetPrecio()?>$</h5>
                <p class="card-text"><?php echo $p->GetDescripcion()?></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">
                <?php 
                require_once("funcs.php");
                $puntuacion = $p['id'];
                promedioPuntaje($puntuacion)
                ?></small>
              </div>
            </div>
          </div>
          <?php
          $i++;
          if($i == 10) {
               break; 
              } 
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


</body>

</html>
