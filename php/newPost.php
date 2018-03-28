<?php session_start();
    include '../services/config.php';
    include '../services/funciones.php';

    if(!isset($_SESSION['usuario'])) {
        header('Location: '.RUTA.'index.php');
    }

    $conexion = conexion($bd_config);
    $admin = iniciarSesion('users', $conexion);

    if ($admin['tipo_user'] == 2) {
        $categorias = getCategorias('categorias', $conexion);
        $nom = getPerfil($admin['id_per'], $conexion);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $idCat = $_POST['cat'];
            $idPer = $admin['id_per'];
            $title = utf8_encode($_POST['title']);
            $des = utf8_encode($_POST['des']);
            $info = utf8_encode($_POST['post']);
            $fch = $_POST['fch'];
            $stsC = $_POST['stsc'];
            $fav = $_POST['fav'];

            $resultado = setSeccion($idCat, $idPer, $title, $des, $info, $fch, $stsC, $fav, $conexion);

        }


        
        
        include '../views/admin_view/new.view.php';
    } else {
        header ('Location: '.RUTA.'index.php');
    }
    