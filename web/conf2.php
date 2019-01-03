<?php 
$salida= array();
$salida ['msg']= "ok";
$salida ['get']=$_GET;
$json = json_encode($salida);


$nombre = "cadena.txt";
if(file_exists($nombre))
    {
        $mensaje = "El Archivo $nombre se ha modificado";
    }
 
    else
    {
        $mensaje = "El Archivo $nombre se ha creado";
    }


    if($archivo = fopen($nombre, "a"))
    {
        fwrite($archivo, date("d/m/Y H:i:s"). " ". $json. "\n\n");
    	fclose($archivo);
    }

		require "config/database.php";
			$db= new database;
			$con = $db->conectar();
			$usr = $_GET['exp'];
			$pwd = $_GET['pwd'];
			$sql = " SELECT * from acceso WHERE nombre = '{$usr}' AND password = '{$pwd}'";
			//echo $sql . "<br>";
			$resultado = $con->query($sql);
			
			
			if ($resultado->num_rows == 1)
			{
				// de la anterior consulta sacamos el id de explotacion.
				$data = $resultado->fetch_assoc();

				$explotacion = $data['id_explotacion3'];
				$nombre= $_GET['nombre'];
				$dni = $_GET['dni'];
				$operario2 = $_GET['operario2'];
				@$condiciones = $_GET['condiciones'];
				@$prl = $_GET['prl'];
				$observaciones = $_GET['observaciones'];
				$instalacion = $_GET['instalacion'];
				$fecha = $_GET['fecha'];
				$horaEnt = $_GET['horaEnt'];
				$horaSal = $_GET['horaSal'];
				$firma = $_GET['firma'];
				$exp = $_GET['exp'];
				$pwd = $_GET['pwd'];
				$sql = "INSERT INTO registro (id_registro, id_explotacion3, id_instalacion2, fecha, hora_inicio, hora_fin, nombre_visita, dni_visita, id_usuario, observaciones, firma, condiciones, prl) VALUES (NULL, '{$explotacion}', '{$instalacion}', '{$fecha}', '{$horaEnt}','{$horaSal}', '{$nombre}', '{$dni}', '{$operario2}', '{$observaciones}', '{$firma}', '1', '1')";
				

				$resultado = $con->query($sql);
				//var_dump($resultado);
				$salida ['msg']= "ok";
			/*	var_dump($instalacion);
				echo "<br><hr><br> ";
				var_dump($data);*/
			}else {
				$salida ['msg']= "Fallo Credenciales.";
			}

			//echo "<br><hr><br> operarios";
			//var_dump($operarios);
			//echo "<br><hr><br> instalacion";*/
			//var_dump ($instalacion);


			$con->close();
			//$resultado->free();

	//$salida = array_merge($operarios, $instalacion);
	//echo "<br><hr><br> salida";
	//var_dump($salida);
		
	echo json_encode($salida);



 ?>