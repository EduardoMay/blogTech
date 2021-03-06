<?php session_start();
	include '../services/config.php';
	include '../services/funciones.php';

	$error = '';

	if(!isset($_SESSION['usuario'])) {
		header('Location: '.RUTA.'index.php');
	}

	$conexion	= conexion($bd_config);
	$admin		= iniciarSesion('users', $conexion);

	if ($admin['tipo_user'] == 3) {
		$categorias		= getCategorias('categorias', $conexion); // new.view.php (64)
		$nom			= getPerfil($admin['id_per'], $conexion); // new.view.php (27)

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(empty($_POST['title']) || empty($_POST['des']) || empty($_POST['post'])){
				$error = '<li class=error>Llena todos los campos</li>';
			}else {
				$idCat	= $_POST['cat'];
				$idPer	= $admin['id_per'];
				$title	= utf8_encode($_POST['title']);
				$des	= utf8_encode($_POST['des']);
				$info	= utf8_encode($_POST['post']);
				$fch	= $_POST['fch'];
				$stsC	= $_POST['stsc'];
				$fav	= $_POST['fav'];
				$etiquetas = $_POST["array"];
				
				$nombre_imagen = $_FILES['imagen']['name'];
				$tipo_imagen = $_FILES['imagen']['type'];
				$tamanio_imagen = $_FILES['imagen']['size'];
				
				$resultado = setSeccion($idCat, $idPer, $title, $des, $info, $fch, $stsC, $fav, $nombre_imagen, $etiquetas, $conexion);
				// $postimg = postImagen($nombre_imagen, $tipo_imagen, $tamanio_imagen, $conexion);
			}
		}
		include '../views/admin_view/new.view.php';
	} else {
		header ('Location: '.RUTA.'index.php');
	}
	