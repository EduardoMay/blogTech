<?php
    include_once '../services/config.php';
    include_once '../services/funciones.php';
    $conexion = conexion($bd_config);
    $cat = $_GET['cat'];

    $statement = $conexion->prepare("SELECT * FROM secciones WHERE id_cat = :cat");
    $statement->execute([':cat'=>$cat]);
    foreach ($statement as $noticias ) {
        echo $noticias['id_sec'];
    }