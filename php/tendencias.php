<?php session_start();
    include_once '../services/config.php';
    include_once '../services/funciones.php';
    $conexion = conexion($bd_config);

	// OBTENER TODAS LAS PUBLICACIONES QUE ESTEN EN TENDENCIAS
    $noticia = $conexion->prepare("SELECT * FROM secciones WHERE ten_sec = 1 ORDER BY id_sec DESC");
	$noticia->execute();
	$resultado = $noticia;

    if(!isset($_SESSION['usuario'])) {
		$infoP = "  
		<div class=ingreso>
			<a href='".RUTA."php/login.php' title='Ingresar'>Ingresar</a>
			<a href='".RUTA."php/registro.php' title='Registrate'>Registrate</a>
		</div>";
		$like = '';
	}else{
        $user	= iniciarSesion('users', $conexion);
		// OBTENER NOMBRE DE PERFIL
		$nom	= getPerfil($user['id_per'], $conexion);

		$infoP = "
		<div class=perfil>
			<p> <span class=icon-smile></span>".ucwords($nom['nom_per'])."<span class=icon-play3></span></p>
			<div class=info>
				<a href=".RUTA."/php/perfil.php>Ver Perfil</a>
				<a href=".RUTA."/php/cerrar.php>Cerrar Sesion</a>
			</div>
		</div>";
		$like = '<input type=submit class=i_button_r value=Like  name=like></input>';
		if ($user['tipo_user'] == 3) {
			# code...
			$infoP = "
			<div class=perfil>
				<p> <span class=icon-smile></span>".ucwords($nom['nom_per'])."<span class=icon-play3></span></p>
				<div class=info>
					<a href=./admin.php>Admin</a>
					<a href=./php/perfil.php>Ver Perfil</a>
					<a href=./php/cerrar.php>Cerrar Sesion</a>
				</div>
			</div>";
		}
    }

    require_once '../views/tendencias.view.php';