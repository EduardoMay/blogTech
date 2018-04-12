<title>Pruebas</title>
<?php

	require 'services/config.php';
	require 'services/funciones.php';
	$conexion = conexion($bd_config);

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
	function rango($rango, $iduser, $idcom, $conexion) {
		$statement = $conexion->prepare("SELECT * FROM rango_com WHERE id_user = :iduser AND id_com = :idcom");
		$statement->execute([
			':iduser'=>$iduser,
			':idcom'=>$idcom
		]);
		$resultado = $statement->fetch();

		if ($resultado == true) {
			echo 'Ya has calificado';
		} else{
			$stm = $conexion->prepare("INSERT INTO rango_com(id_user, id_com, calif) VALUES(:iduser, :idcom, :calif)");
			$stm->execute([
				':iduser'=>$iduser,
				':idcom'=>$idcom,
				':calif'=>$rango
			]);
			echo 'OK';
		}
	}
	if (isset($_POST['1'])) {
		$res = rango('1', '1', '12', $conexion);
		echo $res;
	} elseif (isset($_POST["2"])) {
		$res = rango('2', '1', '12', $conexion);
		echo $res;		
	} elseif (isset($_POST["3"])) {
		$res = rango('3', '10', '12', $conexion);
		echo $res;		
	} elseif (isset($_POST["4"])) {
		$res = rango('3', '10', '12', $conexion);
		echo $res;		
	} elseif (isset($_POST["5"])) {
		$res = rango('5', '1', '12', $conexion);
		echo $res;		
	}

	$statement = $conexion->prepare("SELECT * FROM rango_com WHERE id_com = 12");
	$statement->execute();
	$rango = 0;
	foreach ($statement as $calif) {
		$rango = $rango + $calif['calif'];
	}

	switch ($rango) {
		case $rango >= 10 AND $rango <= 20:
			for ($i=0; $i < 1; $i++) { 
				echo '<span class="icon-star-full"></span>';
			}
			break;
		case $rango > 20 AND $rango <= 40:
			for ($i=0; $i < 2; $i++) { 
				echo '<span class="icon-star-full"></span>';
			}
			break;
		case $rango > 40 && $rango <= 60:
			for ($i=0; $i < 2; $i++) { 
				echo '<span class="icon-star-full"></span>';
			}
			break;
		case $rango > 60 && $rango <= 80:
			for ($i=0; $i < 2; $i++) { 
				echo '<span class="icon-star-full"></span>';
			}
			break;
		case $rango > 80 && $rango <= 100:
			for ($i=0; $i < 2; $i++) { 
				echo '<span class="icon-star-full"></span>';
			}
			break;
		default:
			# code...
			break;
	}

	echo $rango;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="./assets/fonts.css">
	<title>Document</title>
	<style>
		input{
			height: 30px;
    		width: 30px;
    		border-radius: 10px;
    		background: gold;
    		clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
    		font-size: .7em;
    		cursor: pointer;
			transition: all .3s;
		}
		input:hover{
			background: orange;
		}
	</style>
</head>
<body>
	<form action="pruebas.php" method=post>
		<input type=submit value=1 name=1>
		<input type=submit value=2 name=2>
		<input type=submit value=3 name=3>
		<input type=submit value=4 name=4>
		<input type=submit value=5 name=5>
	</form>
</body>
</html>