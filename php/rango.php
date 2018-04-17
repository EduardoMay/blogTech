<?php session_start();
	include '../services/config.php';
	include '../services/funciones.php';

	if (!isset($_SESSION['usuario'])) {
		header ('Location: '.RUTA.'index.php');
	}

	$conexion	= conexion($bd_config);
	$com 		= $_GET['com'];
	$idPub		= $_GET['pub'];

	function rango($rango, $idper, $idcom, $conexion, $idPub) {
		$statement = $conexion->prepare("SELECT * FROM rango_com WHERE id_per = :idper AND id_com = :idcom LIMIT 1");
		$statement->execute([
			':idper'=>$idper,
			':idcom'=>$idcom
		]);
		$resultado = $statement->fetch();

		if ($resultado == true) {
			return header('Location: '.RUTA.'publicacion.php?var1='.$idPub.'#comentarios');
		} else{
			$stm = $conexion->prepare("INSERT INTO rango_com(id_per, id_com, calif) VALUES(:idper, :idcom, :calif)");
			$stm->execute([
				':idper'=>$idper,
				':idcom'=>$idcom,
				':calif'=>$rango
			]);
			return header('Location: '.RUTA.'publicacion.php?var1='.$idPub.'#comentarios');
		}
	}
	if (isset($_POST['1'])) {
		$res = rango('1', $_SESSION['id_per'], $com, $conexion, $idPub);
	} elseif (isset($_POST["2"])) {
		$res = rango('2', $_SESSION['id_per'], $com, $conexion, $idPub);
	} elseif (isset($_POST["3"])) {
		$res = rango('3', $_SESSION['id_per'], $com, $conexion, $idPub);
	} elseif (isset($_POST["4"])) {
		$res = rango('4', $_SESSION['id_per'], $com, $conexion, $idPub);
	} elseif (isset($_POST["5"])) {
		$res = rango('5', $_SESSION['id_per'], $com, $conexion, $idPub);
	}
?>