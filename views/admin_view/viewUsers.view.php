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
    <style>
        .i_button_c{
            margin: 0;
        }
    </style>
</head>
<body>
    <table class=viewusers>
        <caption>Usuarios</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de usuario</th>
                <th>Tipo de usuario</th>
                <td>Eliminar</td>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($resultado as $valores ) {
                    echo '<tr><td>'.$valores['id_user'].'</td>'.'<td>'.$valores['nom_user'].'</td>';
                    echo '<td>';
                    echo $valores['tipo_user'];
                    echo '</td>';
                    echo '<td>';
                    echo '<form action="viewUsers.view.php" method=post>';
                    echo '<input type=text name=iduser value='.$valores['id_user'].' class=esconder>';
                    echo '<input type=text name=idper value='.$valores['id_per'].' class=esconder>';
                    echo '<input type=submit name=eliminar value=Eliminar class=eliminar>';
                    echo '</form>';
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
                    <a href="<?php echo RUTA.'php/admin.php' ?>" class=i_button_c>Regresar</a>
                </td>
                <td colspan=2>
                    <input type="submit" value="Guardar" class=i_button_c name=botontipo>
                </td>
            </tr>
            </form>
        </tbody>
    </table>
</body>
</html>

<?php
    if (isset($_POST['botontipo'])) {
        $tipo = $_POST['tipo'];
        $user = $_POST['user'];
        $statement = $conexion->prepare("UPDATE users SET tipo_user = :tipo WHERE id_user = :user");
        $statement->execute([
            ':tipo' =>  $tipo,
            ':user' =>  $user
        ]);
        header ('Location: '.RUTA.'views/admin_view/viewUsers.view.php');
    }
    if (isset($_POST['eliminar'])) {
        $iduser = $_POST['iduser'];
        $idper = $_POST['idper'];
        $per = $conexion->prepare("DELETE FROM users WHERE id_user = :iduser");
        $per->execute([':iduser'=>$iduser]);
        $user = $conexion->prepare("DELETE FROM perfiles WHERE id_per = :idper");
        $user->execute([':idper'=>$idper]);
    }
?>