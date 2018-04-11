<?php
    include '../services/config.php';
    include '../services/funciones.php';

    $conexion = conexion($bd_config);

	if (isset($_POST['buscar'])) {
		$statement = $conexion->prepare("SELECT * FROM etiquetas WHERE etiqueta = :etiqueta");
		$statement->execute([':etiqueta'=>$_POST["buscar"]]);
		$etiqueta = $statement->fetch();
		if ($etiqueta != false) {
			$estado = null;
		}else {
			$estado = '<h1>SIN RESULTADOS</h1>';
		}
    }

    // OBTENER TODAS LAS PUBLICACIONES QUE ESTEN EN TENDENCIAS
    $noticia = $conexion->prepare("SELECT * FROM secciones WHERE id_sec = :idsec ORDER BY id_sec DESC");
	$noticia->execute([':idsec'=>$etiqueta['id_sec']]);
	$secciones = $noticia;

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
			</div>";
		}
    }

    require_once '../views/buscar.view.php';