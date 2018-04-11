<title>Pruebas</title>
<?php

	require 'services/config.php';
	require 'services/funciones.php';
	$conexion = conexion($bd_config);

	// CONSULTAR PERFILES
	// $correo = 'lalo@gmail.com';
	// $perfil = getPerfiles($correo, $conexion);
	// echo $perfil['nom_per'].' '.$perfil['ape_per'].' '.$perfil['cro_per'];

	// INNER JOIN
	// $statement = $conexion->prepare("SELECT perfiles.nom_per, users.nom_user from users inner join perfiles on users.id_per = perfiles.id_per");
	// $statement->execute();
	// $statement->setFetchMode(PDO::FETCH_ASSOC);
	// $result = $statement->fetchAll();
	// foreach ($result as $key) {
	//     echo $key['nom_per'].' '.$key['nom_user'].'<br>';
	// }

// echo $_SERVER['HTTP_HOST'];
	// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// echo $_POST['boton'];
	// }

	if (isset($_POST['buscar'])) {
		$statement = $conexion->prepare("SELECT * FROM etiquetas WHERE etiqueta = :etiqueta");
		$statement->execute([':etiqueta'=>$_POST["buscar"]]);
		$etiqueta = $statement->fetch();
		if ($etiqueta != false) {
			echo 'ok<br>';
			echo $etiqueta['etiqueta'];
		}else {
			echo 'error';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
		input{
			border: solid 1px red;
			border-radius: 10px;
			outline: 0px;
			transition: all .3s;
		}

		input:focus{
			padding: 1px 10px;
		}
	</style>
</head>
<body>
	<form action="pruebas.php" method=post>
		<input type="search" name="buscar">
	</form>
</body>
</html>