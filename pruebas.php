<title>Pruebas</title>
<?php

    require 'services/config.php';
    require 'services/funciones.php';
    $conexion = conexion($bd_config);

    // CONSULTAR PERFILES
    // $correo = 'lalo@gmail.com';
    // $perfil = getPerfiles($correo, $conexion);
    // echo $perfil['nom_per'].' '.$perfil['ape_per'].' '.$perfil['cro_per'];

    // INNER JOIN
    // $statement = $conexion->prepare("SELECT perfiles.nom_per, users.nom_user from users inner join perfiles on users.id_per = perfiles.id_per");
    // $statement->execute();
    // $statement->setFetchMode(PDO::FETCH_ASSOC);
    // $result = $statement->fetchAll();
    // foreach ($result as $key) {
    //     echo $key['nom_per'].' '.$key['nom_user'].'<br>';
    // }

$noticia = $conexion->prepare("SELECT * FROM secciones");
$noticia->execute();
$resultado = $noticia;

function sec($conexion) {
    $noticia = $conexion->prepare("SELECT * FROM secciones");
    $noticia->execute();
    return $resultado = $noticia->fetch();
    
}

function nomP($id_per, $conexion) {

    $s_per = $conexion->prepare("SELECT nom_per FROM perfiles WHERE id_per = :id_per");
    $s_per->execute([':id_per' => $id_per]);
    return $id_per = $s_per->fetch();
}

function idCat($id_cat, $conexion) {
    $s_cat = $conexion->prepare("SELECT nom_cat FROM categorias WHERE id_cat = :id_cat");
    $s_cat->execute([':id_cat' => $id_cat]);
    return $id_cat = $s_cat->fetch();
}
// echo $resultado['title_sec'];

foreach ($resultado as $info ) {
    # code...
    if ($info['ten_sec'] == 1) {
        echo utf8_decode($info['id_cat']).' categoria<br>';
        $res = sec($conexion);
        $per = nomP($info['id_per'], $conexion);
        $cat = idCat($info['id_cat'], $conexion);
        echo $info['id_sec'].' Seccion<br>';
        echo $per['nom_per'].' perfil<br>';
        echo $cat['nom_cat'].' categoria<br><br>';
    
    }
}

// $noticia = $conexion->prepare("SELECT * FROM secciones");
// $noticia->execute();
// $resultado = $noticia;


// reset($resultado);

// echo '<br>Hola<br>';

// foreach ($resultado as $info ) {
//     # code...
//     if ($info['id_cat'] == 7) {
//         echo 'hola';
//     }
//     echo utf8_decode($info['id_cat']).' categoria<br>';
//     $res = sec($conexion);
//     $per = nomP($info['id_per'], $conexion);
//     $cat = idCat($info['id_cat'], $conexion);
//     echo $res['id_sec'].' Seccion<br>';
//     echo $per['nom_per'].' perfil<br>';
//     echo $cat['nom_cat'].' categoria<br><br>';
//     reset($resultado);
// }