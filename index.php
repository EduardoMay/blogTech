<?php session_start();
    include './services/config.php';
    include './services/funciones.php';

    $infoP = '';

    if(!isset($_SESSION['usuario'])) {
        $infoP = "  
        <div class=ingreso>
            <a href='./php/login.php' title='Ingresar'>Ingresar</a>
            <a href='php/registro.php' title='Registrate'>Registrate</a>
        </div>
        ";
        include './inicio.php';
    }

    $conexion = conexion($bd_config);
    $user = iniciarSesion('users', $conexion);
    $nom = getPerfil($user['id_per'], $conexion);
    

    if ($user['tipo_user'] == 1) {
        $infoP = "
        <div class=perfil>
            <p> <span class=icon-smile></span>".ucwords($nom['nom_per'])."<span class=icon-play3></span></p>
		    <div class=info>
		    	<a href=./php/perfil.php>Ver Perfil</a>
		    	<a href=./php/cerrar.php>Cerrar Sesion</a>
		</div>
        ";

        include './inicio.php';
    } elseif ($user['tipo_user'] == 2) {
        $infoP = "
        <div class=perfil>
            <p> <span class=icon-smile></span>".ucwords($nom['nom_per'])."<span class=icon-play3></span></p>
		    <div class=info>
		    	<a href=./php/perfil.php>Ver Perfil</a>
		    	<a href=./php/cerrar.php>Cerrar Sesion</a>
		</div>
        ";
        include './views/admin_view/admin.view.php';
    } else{
        include './inicio.php';
    }