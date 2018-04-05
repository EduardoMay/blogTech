<?php session_start();
    require '../../services/config.php';
    require '../../services/funciones.php';

    $conexion = conexion($bd_config);

    $statement = $conexion->prepare('select * from users');
    $statement->execute();
    $resultado = $statement->fetchall();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/blog_styles.css">
    <link rel="stylesheet" href="../../assets/viewUsers.css">
    <title>Usuarios</title>
</head>
<body>
    <table>
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
                    echo '<tr><td>'.$valores['id_user'].'</td>'.'<td>'.$valores['nom_user'].'</td>';
                    echo '<td>';
                    echo $valores['tipo_user'];
                    echo '</td>';
                    echo '</tr>';
                }
            ?>
            <form action="viewUsers.view.php" method="post">
            <tr>
                <td>
                    <b>Cambiar tipo de Usuario</b>
                </td>
                <td>
                    <select name="user">
                        <?php
                            foreach ($resultado as $user) {
                                echo '<option value='.$user['id_user'].'>'.$user['nom_user'].'</option>';
                            }
                        ?>
                    </select>
                </td>
                <td>
                    <select name="tipo">
                        <option value="1">Usuario</option>
                        <option value="2">Administrador</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="<?php echo RUTA.'php/admin.php' ?>">Regresar</a>
                </td>
                <td>
                    <input type="submit" value="Guardar">
                </td>
            </tr>
            </form>
        </tbody>
    </table>
</body>
</html>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tipo = $_POST['tipo'];
        $user = $_POST['user'];
        $statement = $conexion->prepare("UPDATE users SET tipo_user = :tipo WHERE id_user = :user");
        $statement->execute([
            ':tipo' =>  $tipo,
            ':user' =>  $user
        ]);
        header ('Location: '.RUTA.'views/admin_view/viewUsers.view.php');
    }
?>