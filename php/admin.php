<?php session_start();
    include '../services/config.php';
    include '../services/funciones.php';
    
    $conexion = conexion($bd_config);

    if (isset($_SESSION['usuario'])) {
       $user = iniciarSesion('users', $conexion);
       $nom = getPerfil($user['id_per'], $conexion);
    }

    require_once '../views/admin_view/admin.view.php';