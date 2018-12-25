<?php $usuario = "sadmin"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>SignIn .. Registra tus visitas</title>
	
	<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/estilo.css">

</head>
<body>
<div class="container-fluid">
   <div class="row text-right"> 
		<div class="col m-1 pr-5">
			<span> Logueado como <?php echo $usuario ?> </span>
			<!-- <a href="../controllers/login/logout.php" class="btn btn-danger btn-sm ml-2"> Cerrar</a> -->
			<a href="#" class="btn btn-danger btn-sm ml-2"> Cerrar</a>
		</div>
	</div>
	<div class="row">
	<div class="col">
		<ul class="nav nav-tabs">
		  <li class="nav-item">
		    <a class="nav-link active" href="#!">Inicio</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="#!">Explotaciones</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="#!">Acceso web</a>
		  </li>
		   <li class="nav-item">
		    <a class="nav-link" href="#!">Registro Visitas</a>
		  </li>
		   <li class="nav-item dropdown">
			    <a class="nav-link dropdown-toggle" data-toggle="dropdown"
			       href="#!" role="button" aria-haspopup="true" aria-expanded="false">
			       Dropdown</a>
			    <div class="dropdown-menu">
			      <a class="dropdown-item" href="#!">Action</a>
			      <a class="dropdown-item" href="#!">Another action</a>
			    </div>
		  </li>
		</ul>
	</div>
	</div>
</div>