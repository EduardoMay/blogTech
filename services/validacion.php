<?php session_start();
    require 'config/config.php';
    require 'funciones/funciones.php';

    $conexion = conexion($bd_config);
    if (isset($_SESSION['usuario'])) {
        $usuario = iniciarSesion('users', $conexion);

        if ($usuario['tipo_user'] == 1) {
            header('Location: '.RUTA.'login/user.html');
        }elseif ($usuario['tipo_user'] == 2) {
            header('Location: '.RUTA.'admin.php');
        } else{
            header('Location: '.RUTA.'index.html');
        }
    } else {
        header('Location: '.RUTA.'index.html');
    }