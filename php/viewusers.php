<?php session_start();
    require '../services/config.php';
    require '../services/funciones.php';

    $conexion = conexion($bd_config);

    $statement = $conexion->prepare('select * from users');
    $statement->execute();
    $resultado = $statement->fetchall();


    if (isset($_POST['botontipo'])) {
        $tipo = $_POST['tipo'];
        $user = $_POST['user'];
        $statement = $conexion->prepare("UPDATE users SET tipo_user = :tipo WHERE id_user = :user");
        $statement->execute([
            ':tipo' =>  $tipo,
            ':user' =>  $user
        ]);
        header ('Location: '.RUTA.'php/viewusers.php');
    }
    if (isset($_POST['eliminar'])) {
        $iduser = $_POST['iduser'];
        $idper = $_POST['idper'];
        $per = $conexion->prepare("DELETE FROM users WHERE id_user = :iduser");
        $per->execute([':iduser'=>$iduser]);
        $user = $conexion->prepare("DELETE FROM perfiles WHERE id_per = :idper");
        $user->execute([':idper'=>$idper]);
        header ('Location: '.RUTA.'php/viewusers.php');
    }

    require_once '../views/admin_view/viewUsers.view.php';
?>
