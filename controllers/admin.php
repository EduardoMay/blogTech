<?php session_start();
    include '../services/config.php';
    include '../services/funciones.php';

    if(!isset($_SESSION['usuario'])) {
        header('Location: '.RUTA.'index.html');
    }

    $conexion = conexion($bd_config);
    $admin = iniciarSesion('users', $conexion);

    if ($admin['tipo_user'] == 2) {
        include '../views/admin_view/admin.view.php';
    }