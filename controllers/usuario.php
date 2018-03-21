<?php session_start();

    include '../services/config.php';
    include '../services/funciones.php';

    if (!isset($_SESSION['usuario'])) {
        header ('Location: '.RUTA.'index.html');
    }

    // echo $_SESSION['usuario'];

    $conexion = conexion($bd_config);
    $user = iniciarSesion('users', $conexion);

    if($user['tipo_user'] == 1) {
        include '../views/login/user.view.php';
    } else{
        header ('Location: '.RUTA.'services/validacion.php');
    }

    $conexion = null;