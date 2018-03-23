<?php session_start();
    include '../services/config.php';
    include '../services/funciones.php';

    $error = '';
    $conexion = conexion($bd_config);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $statement = $conexion->prepare('SELECT * FROM users WHERE nom_user = :user AND pas_user = :pas');
        $statement->execute([
            ':user'=>$user,
            ':pas'=>$pass
        ]);
        $resultado = $statement->FETCH();
        if ($resultado !== false) {
            $_SESSION['usuario'] = $user;
            header('Location: '.RUTA.'index.php');
        }else {
            $error = '<li class=error>Tu usuario y/o contraseña son incorrectos</li>';
        }
    }

    require '../views/login.view.php';