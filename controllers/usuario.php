<?php session_start();

    include '../services/config.php';
    include '../services/funciones.php';

    if (!isset($_SESSION['usuario'])) {
        header ('Location: '.RUTA.'index.html');
    }

    // echo $_SESSION['usuario'];

    $conexion = conexion($bd_config);
    $user = iniciarSesion('users', $conexion);

    $resultado = getSecciones("secciones", $conexion);
	foreach ($resultado as $valor ) {
		# code...
		echo $valor['id_sec'];
	}

    if($user['tipo_user'] == 1) {
        include '../views/login/user.view.php';
    } elseif ($user['tipo_user'] == 2) {
        include '../views/login/user.view.php';
    } else{
        header ('Location: '.RUTA.'services/validacion.php');
    }

    $conexion = null;