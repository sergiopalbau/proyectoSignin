<?php
	$data = array();
	$instalacion = array();
	$operarios = array();
	$salida = array();

	//var_dump ($_GET);
	require "config/database.php";
	$db= new database;
	$con = $db->conectar();
	$usr = $_GET['explotacion'];
	$pwd = $_GET['password'];
	$sql = " SELECT * from acceso WHERE nombre = '{$usr}' AND password = '{$pwd}'";
	//echo $sql . "<br>";
	$resultado = $con->query($sql);
	
	
	if ($resultado->num_rows == 1)
	{
		$data = $resultado->fetch_assoc();
		
		//recuperar instalaciones.
		$sql = " SELECT * from instalacion WHERE id_explotacion2 = '{$data['id_explotacion3']}'";
		//echo $sql;
		$resultado = $con->query($sql);
		//var_dump($resultado);
		if ($resultado->num_rows > 0)
		{
			while ($tmp = $resultado->fetch_assoc()){
				$instalacion[] = $tmp;
			}
		}

		//recuperar operarios.
		$sql = " SELECT * from usuario WHERE id_explotacion2 = '{$data['id_explotacion3']}'";
		//echo $sql;
		$resultado = $con->query($sql);
		//var_dump($resultado);
		if ($resultado->num_rows > 0)
		{
			
			while ($tmp = $resultado->fetch_assoc()){
				$operarios[] = $tmp;
			}
		}

		foreach ($instalacion as $ins){
			$salida ['instalacion'][] = [$ins['id_instalacion'],$ins['nombre']];
			//$salida ['instalacion'][] = $ins['nombre'];
		}

		foreach ($operarios as $ope){
			$salida ['operario'][] =[$ope['id_usuario'], $ope['nombre']];
		}
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
	$resultado->free();

	//$salida = array_merge($operarios, $instalacion);
	//echo "<br><hr><br> salida";
	//var_dump($salida);
		
	echo json_encode($salida);

	

	
	?>