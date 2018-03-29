<?php session_start();
    include_once '../services/config.php';
    include_once '../services/funciones.php';

    $conexion = conexion($bd_config);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $com = $_POST['com'];
        $fch = date("Y-n-d");
        $statement = $conexion->prepare("INSERT INTO comentarios (id_sec, id_per, comentario, fch_com, status) VALUES (:idsec, :idper, :com, :fch_com, :status)");
        $statement->execute([
            ':idsec'    =>  $_SESSION['id_sec'],
            ':idper'    =>  $_SESSION['id_per'],
            ':com'      =>  $com,
            ':fch_com' =>  $fch,
            ':status'   =>  '1'
        ]);
        header('Location: '.RUTA.'publicacion.php?var1='.$_SESSION['id_sec']);
    }