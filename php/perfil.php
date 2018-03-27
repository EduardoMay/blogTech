<?php session_start();

    include '../services/config.php';
    include '../services/funciones.php';

    $conexion = conexion($bd_config);
    $usuario = iniciarSesion('users', $conexion);

    if (!isset($_SESSION['usuario'])) {
        header ('Location: '.RUTA.'index.php');
    }
    
    if ($conexion == true) {
        switch ($usuario['tipo_user']) {
            case 1:
                $perfil = getPerfil($usuario['id_per'], $conexion);
                $nombre = $perfil['nom_per'];
                $ape = $perfil['ape_per'];
                $userN = $usuario['nom_user'];
                $email = $perfil['cro_per'];
                require '../views/login/perfil.view.php';
                break;
            case 2:
                $perfil = getPerfil($usuario['id_per'], $conexion);
                $nombre = $perfil['nom_per'];
                $ape = $perfil['ape_per'];
                $userN = $usuario['nom_user'];
                $email = $perfil['cro_per'];
                
                
                require '../views/login/perfil.view.php';
                break;
            case 3:
                $perfil = getPerfil($usuario['id_per'], $conexion);
                $nombre = $perfil['nom_per'];
                $ape = $perfil['ape_per'];
                $userN = $usuario['nom_user'];
                $email = $perfil['cro_per'];
                require '../views/login/perfil.view.php';
                break;
            default: header ('Location: '.RUTA.'index.php');
        }    
    } else {
        echo 'ERROR AL CONECTAR A LA BASE DE DATOS';
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $usuario['id_per'];
        $newNombre = $_POST['nombre'];
        $newApe = $_POST['ape'];
        $newUser = $_POST['user'];
        $newEmail = $_POST['email'];
        $newPass = $_POST['pass'];
        $resultado = updatePerfil($id, $newNombre, $newApe, $newUser, $newEmail, $newPass, $conexion);
        
        header('Location: '.RUTA.'php/perfil.php');
    }