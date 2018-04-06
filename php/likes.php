<?php session_start();

    include '../services/config.php';
    include '../services/funciones.php';

    $conexion = conexion($bd_config);
    $sec = $_GET['val'];

    if (isset($_POST['dontlike'])) {
        $statement = $conexion->prepare("DELETE FROM likes WHERE id_sec = :idsec AND id_per = :idper");
        $statement->execute([
            ':idsec'    => $sec,
            ':idper'    => $_SESSION['id_per']
        ]);
        echo BACK;
        // header ('Location: '.RUTA);
    } elseif(isset($_POST['like'])) {
        $statement = $conexion->prepare("INSERT INTO likes(id_per, id_sec, megusta) VALUES(:idP, :idS, :megusta)");
        $statement->execute([
            ':idP'  =>  $_SESSION['id_per'],
            ':idS'  =>  $sec,
            ':megusta' =>  '1'
        ]);
        echo BACK;
        // header ('Location: '.RUTA);
    }
?>