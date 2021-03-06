<?php session_start();

	include '../services/config.php';
	include '../services/funciones.php';

	$conexion	= conexion($bd_config);
	$usuario	= iniciarSesion('users', $conexion);

	if (!isset($_SESSION['usuario'])) {
		header ('Location: '.RUTA.'index.php');
	}
	
	if ($conexion == true) {
		// OBTENER EL AVATAR
		$avatar	= avatar($conexion);
		
		switch ($usuario['tipo_user']) {
			case 1:
				$perfil	= getPerfil($usuario['id_per'], $conexion);
				$nombre = $perfil['nom_per'];
				$ape	= $perfil['ape_per'];
				$userN	= $usuario['nom_user'];
				$email	= $perfil['cro_per'];
				$rango	= $usuario['tipo_user'];
				break;
			case 2:
				$perfil = getPerfil($usuario['id_per'], $conexion);
				$nombre = $perfil['nom_per'];
				$ape	= $perfil['ape_per'];
				$userN	= $usuario['nom_user'];
				$email	= $perfil['cro_per'];
				$rango	= $usuario['tipo_user'];
				break;
			case 3:
				$perfil = getPerfil($usuario['id_per'], $conexion);
				$nombre = $perfil['nom_per'];
				$ape 	= $perfil['ape_per'];
				$userN	= $usuario['nom_user'];
				$email	= $perfil['cro_per'];
				$rango 	= $usuario['tipo_user'];
				break;
			default: header ('Location: '.RUTA.'index.php');
		}    
	} else {
		echo 'ERROR AL CONECTAR A LA BASE DE DATOS';
	}

	if (!empty($_POST['datos'])) {
		if (!empty($_POST['nombre']) || !empty($_POST['ape']) || !empty($_POST['user']) || !empty($_POST['email']) || !empty($_POST['pass'])) {
			$id			= $usuario['id_per'];
			$newNombre	= $_POST['nombre'];
			$newApe		= $_POST['ape'];
			$newUser	= $_POST['user'];
			$newEmail	= $_POST['email'];
			$newPass	= $_POST['pass'];
			$resultado	= updatePerfil($id, $newNombre, $newApe, $newUser, $newEmail, $newPass, $conexion);
			header('Location: '.RUTA.'php/perfil.php');
		}
	}

	if (!empty($_POST['avatar'])) {
			$nombre_imagen	= $_FILES['imagen']['name'];
			$tipo_imagen	= $_FILES['imagen']['type'];
			$tamanio_imagen = $_FILES['imagen']['size'];
	
			if ($tipo_imagen == 'image/jpeg' || $tipo_imagen == 'image/jpg' || $tipo_imagen == 'image/png' || $tipo_imagen == 'image/gif') {
				if ($tamanio_imagen <= 4000000) {
					subirImagen($nombre_imagen, $tipo_imagen, $tamanio_imagen, $conexion);
				} else {
					$error = '<li class=error>FAVOR SUBIR UNA IMAGEN DE MENOR TAMAÑO(Recomendado: 1Mb)</li>';
				}
			} else {
				$error = '<li class=error>FAVOR DE SELECCIONAR UNA IMAGEN (jpeg, jpg, png, gif)</li>';
			}
	}

	$rangos = $conexion->prepare('SELECT id_per, sum(calif) as rango from rango_com group by id_per order by rango desc');
	// $rango = $conexion->prepare('SELECT * from rango_com');
	$rangos->execute();
	$allRangos = $rangos;

	$rangoPerfil = $conexion->prepare('SELECT id_per, sum(calif) as rango from rango_com  where id_per = :id_per order by rango desc;');
	$rangoPerfil->execute([':id_per'=>$_SESSION['id_per']]);
	$rangoPerfil = $rangoPerfil->fetch();

	require '../views/login/perfil.view.php';
	