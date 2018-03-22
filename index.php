<?php session_start();
    include './services/config.php';
    include './services/funciones.php';

    if(!isset($_SESSION['usuario'])) {
        header('Location: '.RUTA.'index.html');
    }

    $conexion = conexion($bd_config);
    $user = iniciarSesion('users', $conexion);

    if ($user['tipo_user'] == 1) {
        header('Location: '.RUTA.'controllers/usuario.php');
    } elseif ($user['tipo_user'] == 2) {
        header('Location: '.RUTA.'controllers/admin.php');
    }