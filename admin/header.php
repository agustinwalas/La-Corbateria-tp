<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>La corbateria- Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <h1>Admin</h1>
                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="index.php?logout" style="color:#fff;"><?php echo isset($_SESSION['usuario_logueado'])?'Deslogear':'Desloguear'?></a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="active-link">
                        <a href="index.php" ><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="productos.php"><i class="fa fa-table "></i>Productos</a>
                    </li>
                    <li>
                        <a href="marcas.php"><i class="fa fa-edit "></i>Marcas </a>
                    </li>
                    <li>
                        <a href="categorias.php"><i class="fa fa-qrcode "></i>Categorias</a>
                    </li>     
                    <li>
                        <a href="comentarios.php"><i class="fa fa-code "></i>Comentarios</a>
                    </li>     
                </ul>
            </div>
        </nav>