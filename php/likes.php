<?php session_start();

    include '../services/config.php';
    include '../services/funciones.php';

    $conexion = conexion($bd_config);
    $sec = $_GET['val'];

    $statement = $conexion->prepare("INSERT INTO likes(id_per, id_sec, megusta) VALUES(:idP, :idS, :megusta)");
    $statement->execute([
        ':idP'  =>  $_SESSION['id_per'],
        ':idS'  =>  $sec,
        ':megusta' =>  '1'
    ]);

    header ('Location: '.RUTA);