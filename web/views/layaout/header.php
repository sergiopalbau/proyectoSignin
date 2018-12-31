<?php 
    $usuario = isset($_SESSION['nombre'])? $_SESSION['nombre'] : "DESCONOCIDO";
    
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>SignIn .. Registra tus visitas</title>
	
	<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../assets/js/popper.min.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/tabla.js"></script>
	
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/estilo.css">
        
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

</head>
<body>
<div class="container-fluid">
   <div class="row text-right"> 
		<div class="col m-1 pr-5">
			<span> Logueado como <?php echo $usuario ?> </span>
			<!-- <a href="../controllers/login/logout.php" class="btn btn-danger btn-sm ml-2"> Cerrar</a> -->
			<a href="<?php echo base_url."sadmin.php/?controller=Logout&action=logout" ?>" class="btn btn-danger btn-sm ml-2"> Cerrar</a>
                       
		</div>
	</div>
	<div class="row">
	<div class="col">
		<ul class="nav nav-tabs">
		  <li class="nav-item">
		    <a class="nav-link <?php echo $menu['inicio'] ?>" href="<?php echo base_url."sadmin.php/?controller=Login&action=index"?>">Inicio</a>
		  </li>
		 <li class="nav-item">
		    <a class="nav-link <?php echo $menu['explotaciones'] ?>" href="<?php echo base_url."sadmin.php/?controller=Explotacion&action=index"?>">Explotaciones</a>
		  </li> 
		  <li class="nav-item">
		    <a class="nav-link <?php echo $menu['acceso'] ?>" href="<?php echo base_url."sadmin.php/?controller=Acceso&action=index"?>">Acceso web</a>
		  </li>
		   <li class="nav-item">
		    <a class="nav-link <?php echo $menu['registro'] ?>" href="<?php echo base_url."sadmin.php/?controller=Registro&action=index"?>">Registro Visitas</a>
		  </li>
        </ul>
	</div>
	</div>
</div>