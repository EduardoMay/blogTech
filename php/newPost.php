<?php session_start();
    include '../services/config.php';
    include '../services/funciones.php';

    if(!isset($_SESSION['usuario'])) {
        header('Location: '.RUTA.'index.html');
    }

    $conexion = conexion($bd_config);
    $admin = iniciarSesion('users', $conexion);

    if ($admin['tipo_user'] == 2) {
        $categorias = getCategorias('categorias', $conexion);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $idCat = $_POST['cat'];
            $idPer = $admin['id_per'];
            $title = $_POST['title'];
            $info = utf8_encode($_POST['post']);
            $fch = $_POST['fch'];
            $stsC = $_POST['stsc'];

            $resultado = setSeccion($idCat, $idPer, $title, $info, $fch, $stsC, $conexion);

        }


        
        
        include '../views/admin_view/new.view.php';
    } else {
        header ('Location: '.RUTA.'services/validacion.php');
    }
    