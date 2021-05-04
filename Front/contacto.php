<head>
  <title>Contacto</title>
</head>

<?php require_once("header.php"); ?>

<body>
<h1 class="titulo">Contacto</h1>
	
<div class="col-md-6 seccion mx-auto">
	<form>
		<div class="form-group">
		  <label>Nombre completo</label>
		  <input type="text"  required class="form-control" >
		</div>
		  <div class="form-group">
		    <label>Email</label>
		    <input type="email"  required class="form-control">

		  </div>
		  <div class="form-group">
		    <label>Teléfono</label>
		    <input type="tel" required class="form-control">
		  </div>
      <label>Area</label>
      <select class="form-control">
        <option disabled selected>Area de consulta</option>
        <option>consulta</option>
        <option>propuesta</option>
      </select>
		  <div class="form-group">
			  <label>Mensaje</label>
		    <textarea class="form-control" required rows="3"></textarea>
		  </div>
		  <small class="form-text text-muted">No compartiremos tus datos con nadie.</small>
		  <div class="text-center">
			  <button type="submit" class="btn btn-primary">Enviar</button>
		  </div>
	</form>
</div>







<?php require_once("footer.php"); ?>

    <!-- JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
