<?php session_start();
    include_once '../services/config.php';
    include_once '../services/funciones.php';
    $conexion = conexion($bd_config);

    $noticia = $conexion->prepare("SELECT * FROM secciones WHERE ten_sec = 1");
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
        $user = iniciarSesion('users', $conexion);
		// OBTENER NOMBRE DE PERFIL
		$nom = getPerfil($user['id_per'], $conexion);

		$infoP = "
		<div class=perfil>
			<p> <span class=icon-smile></span>".ucwords($nom['nom_per'])."<span class=icon-play3></span></p>
			<div class=info>
				<a href=".RUTA."/php/perfil.php>Ver Perfil</a>
				<a href=".RUTA."/php/cerrar.php>Cerrar Sesion</a>
		</div>";
		$like = '<input type=submit class=i_button_r value=Like  name=like></input>';
    }

    require_once '../views/tendencias.view.php';