<?php session_start();
	include './services/config.php';
	include './services/funciones.php';

	$conexion = conexion($bd_config);

	$noticia = $conexion->prepare("SELECT * FROM secciones");
	$noticia->execute();
	$resultado = $noticia;
	
	$infoP = '';

	if(!isset($_SESSION['usuario'])) {
		$infoP = "  
		<div class=ingreso>
			<a href='./php/login.php' title='Ingresar'>Ingresar</a>
			<a href='php/registro.php' title='Registrate'>Registrate</a>
		</div>
		";
		include './inicio.php';
	}else{
		$user = iniciarSesion('users', $conexion);
		// OBTENER NOMBRE DE PERFIL
		$nom = getPerfil($user['id_per'], $conexion);

		$infoP = "
		<div class=perfil>
			<p> <span class=icon-smile></span>".ucwords($nom['nom_per'])."<span class=icon-play3></span></p>
			<div class=info>
				<a href=./php/perfil.php>Ver Perfil</a>
				<a href=./php/cerrar.php>Cerrar Sesion</a>
		</div>
		";

		if ($user['tipo_user'] == 1) {
			include './inicio.php';
		} elseif ($user['tipo_user'] == 2) {
			include './views/admin_view/admin.view.php';
		} else{
		}
	}