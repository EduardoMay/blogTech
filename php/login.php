<?php session_start();
	include '../services/config.php';
	include '../services/funciones.php';

	$conexion   = conexion($bd_config);
	$error		= '';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$user	= $_POST['user'];
		$pass	= $_POST['pass'];

		$statement = $conexion->prepare('SELECT * FROM users WHERE nom_user = :user AND pas_user = :pas');
		$statement->execute([
			':user'=>$user,
			':pas'=>$pass
		]);
		$resultado = $statement->FETCH();

		if ($resultado['nom_user'] === $user && $resultado['pas_user'] === $pass) {
			if ($resultado !== false) {
				$_SESSION['usuario']	= $user;
				$_SESSION['id_per']		= $resultado['id_per'];
				$_SESSION['tipo_user']	= $resultado['tipo_user'];
				header('Location: '.RUTA.'index.php');
			}else {
				$error = '<li class=error>Tu usuario y/o contraseña son incorrectos</li>';
			}
		}else {
			$error = '<li class=error>Tu usuario y/o contraseña son incorrectos</li>';
		}
	}

	require '../views/login.view.php';