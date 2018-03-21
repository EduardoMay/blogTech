<?php session_start();
    require '../../services/config.php';
    require '../../services/funciones.php';

    $conexion = conexion($bd_config);

    $statement = $conexion->prepare('select * from users');
    $statement->execute();
    $resultado = $statement->fetchall();

    foreach ($resultado as $key ) {
        # code...
        // echo $key['id_user'].$key['nom_user'].'<br>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
</head>
<body>
    <table border='1'>
        <caption>Usuarios</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de usuario</th>
                <th>Tipo de usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($resultado as $valores ) {
                    echo '<tr><td>'.$valores['id_user'].'</td>'.'<td>'.$valores['nom_user'].'</td>'.'<td>'.$valores['tipo_user'].'</td>'.'</tr>';
                }
            ?>
            <tr>
                <td>
                    <a href="">Regresar</a>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>