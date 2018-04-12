<?php session_start();
	include_once './services/config.php';
	include_once './services/funciones.php';

	$conexion	= conexion($bd_config);

	// SELECIONAR TODAS LAS NOTICAS
	$noticia = $conexion->prepare("SELECT * FROM secciones ORDER BY id_sec DESC");
	$noticia->execute();
	$secciones = $noticia;
	
	$infoP		= '';

	if(!isset($_SESSION['usuario'])) {
		$infoP = "  
		<div class=ingreso>
			<a href='./php/login.php' title='Ingresar'>Ingresar</a>
			<a href='php/registro.php' title='Registrate'>Registrate</a>
		</div>";
		$like	= '';
		include_once './inicio.php';
	}else{
		$user	= iniciarSesion('users', $conexion);
		// OBTENER NOMBRE DE PERFIL
		$nom	= getPerfil($user['id_per'], $conexion);

		$infoP = "
		<div class=perfil>
			<p> <span class=icon-smile></span>".ucwords($nom['nom_per'])."<span class=icon-play3></span></p>
			<div class=info>
				<a href=./php/perfil.php>Ver Perfil</a>
				<a href=./php/cerrar.php>Cerrar Sesion</a>
			</div>
		</div>";
		$like	= '<input type=submit class=i_button_r value="Me gusta" name=like></input>';

		if ($user['tipo_user'] == 1 || $user['tipo_user'] == 2) {
			include './inicio.php';
		} elseif ($user['tipo_user'] == 3) {
			# code...
			$infoP = "
			<div class=perfil>
				<p> <span class=icon-smile></span>".ucwords($nom['nom_per'])."<span class=icon-play3></span></p>
				<div class=info>
					<a href=./php/admin.php>Admin</a>
					<a href=./php/perfil.php>Ver Perfil</a>
					<a href=./php/cerrar.php>Cerrar Sesion</a>
				</div>
			</div>";
			include './inicio.php';
		}
	}