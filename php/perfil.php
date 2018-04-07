<?php session_start();

	include '../services/config.php';
	include '../services/funciones.php';

	$conexion = conexion($bd_config);
	$usuario = iniciarSesion('users', $conexion);

	if (!isset($_SESSION['usuario'])) {
		header ('Location: '.RUTA.'index.php');
	}
	
	if ($conexion == true) {
		switch ($usuario['tipo_user']) {
			case 1:
				$perfil = getPerfil($usuario['id_per'], $conexion);
				$nombre = $perfil['nom_per'];
				$ape = $perfil['ape_per'];
				$userN = $usuario['nom_user'];
				$email = $perfil['cro_per'];
				break;
			case 2:
				$perfil = getPerfil($usuario['id_per'], $conexion);
				$nombre = $perfil['nom_per'];
				$ape = $perfil['ape_per'];
				$userN = $usuario['nom_user'];
				$email = $perfil['cro_per'];
				
				
				
				break;
			case 3:
				$perfil = getPerfil($usuario['id_per'], $conexion);
				$nombre = $perfil['nom_per'];
				$ape = $perfil['ape_per'];
				$userN = $usuario['nom_user'];
				$email = $perfil['cro_per'];
				break;
			default: header ('Location: '.RUTA.'index.php');
		}    
	} else {
		echo 'ERROR AL CONECTAR A LA BASE DE DATOS';
	}

	if (!empty($_POST['datos'])) {
		if (!empty($_POST['nombre']) || !empty($_POST['ape']) || !empty($_POST['user']) || !empty($_POST['email']) || !empty($_POST['pass'])) {
			$id = $usuario['id_per'];
			$newNombre = $_POST['nombre'];
			$newApe = $_POST['ape'];
			$newUser = $_POST['user'];
			$newEmail = $_POST['email'];
			$newPass = $_POST['pass'];
			$resultado = updatePerfil($id, $newNombre, $newApe, $newUser, $newEmail, $newPass, $conexion);
			$error = '<li class=error>RECARGAR LA PAGINA PARA VER LOS CAMBIOS</li>';
			header('Location: '.RUTA.'php/perfil.php');
		}
	}

	if (!empty($_POST['avatar'])) {
		// if (empty($_POST['avatar'])) {
			// RECIBIMOS DATOS DE LA IMAGEN
			$nombre_imagen = $_FILES['imagen']['name'];
			$tipo_imagen = $_FILES['imagen']['type'];
			$tamanio_imagen = $_FILES['imagen']['size'];
	
			if ($tipo_imagen == 'image/jpeg' || $tipo_imagen == 'image/jpg' || $tipo_imagen == 'image/png' || $tipo_imagen == 'image/gif') {
				if ($tamanio_imagen <= 2000000) {
					subirImagen($nombre_imagen, $tipo_imagen, $tamanio_imagen, $conexion);
				} else {
					$error = '<li class=error>FAVOR SUBIR UNA IMAGEN DE MENOR TAMAÑO(Recomendado: 1Mb)</li>';
				}
			} else {
				$error = '<li class=error>FAVOR DE SELECCIONAR UNA IMAGEN (jpeg, jpg, png, gif)</li>';
			}
		// }
		// return 
	}
	require '../views/login/perfil.view.php';
	