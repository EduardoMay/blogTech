<?php session_start();
    include 'config.php';
    include 'funciones.php';

    $conexion = conexion($bd_config);
    if (isset($_SESSION['usuario'])) {
        $usuario = iniciarSesion('users', $conexion);

        if ($usuario['tipo_user'] == 1) {
            header('Location: '.RUTA.'controllers/usuario.php');
        }elseif ($usuario['tipo_user'] == 2) {
            header('Location: '.RUTA.'controllers/admin.php');
        } else{
            header('Location: '.RUTA.'index.html');
        }
    } else {
        header('Location: '.RUTA.'index.html');
    }