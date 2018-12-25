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
	<section id="wrapper" class="login-register login-sidebar" style="background-image:url(assets/images/fondo2.jpg);">
    <div class="login-box card">
        <div class="card-body">
            <form action="index.php/?controller=login&action=comprueba" method="POST" class="form-horizontal form-material text-center">
                <a href="index.php" class="text-center db "><br/><img  id="logo_login" class="m-5" src="assets/images/logo.svg" alt="Home" /></a>
                <div class="form-group mt-4">
                    <div class="col-xs-12">
                        <input type="text" name="usuario" class="form-control" id ="usuario" required placeholder="usuario">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12 mt-2">
                        <input class="form-control" type="password" required placeholder="password" name="pass">
                    </div>
                </div>
                <div class="form-group text-center mt-2">
                    <div class="col-xs-12">
                        <input class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit" name="acceder" id="acceder" value="acceder">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
	
</body>
</html>
