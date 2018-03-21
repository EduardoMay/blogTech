<?php session_start();

    include '../services/config.php';
    include '../services/funciones.php';

    $conexion = conexion($bd_config);
    $usuario = iniciarSesion('users', $conexion);

    if (!isset($_SESSION['usuario'])) {
        header ('Location: '.RUTA.'index.html');
    }

    if($usuario['tipo_user'] == 1) {
        if ($conexion == true) {
            // echo $usuario['id_per'];
            $perfil = getPerfil($usuario['id_per'], $conexion);
            
            $nombre = $perfil['nom_per'];
            $ape = $perfil['ape_per'];
            $userN = $usuario['nom_user'];
            $email = $perfil['cro_per'];
        } else {
            echo 'ERROR AL CONECTAR A LA BASE DE DATOS';
        }
        
        require '../views/login/perfil.view.php';
    } else{
        header ('Location: '.RUTA.'services/validacion.php');
    }
