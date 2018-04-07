<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/blog_styles.css">
    <link rel="stylesheet" href="../assets/viewUsers.css">
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
                    echo '<form action="'.RUTA.'php/viewUsers.php'.'" method=post>';
                    echo '<input type=text name=iduser value='.$valores['id_user'].' class=esconder>';
                    echo '<input type=text name=idper value='.$valores['id_per'].' class=esconder>';
                    echo '<input type=submit name=eliminar value=Eliminar class=eliminar>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            ?>
            <form action="<?= RUTA.'php/viewusers.php' ?>" method="post">
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
                        <option value="2">Moderador</option>
                        <option value="3">Administrador</option>
                    </select>
                </td>
                <td>
                    <input type="submit" value="Guardar" class=i_button_c name=botontipo>
                </td>
            </tr>
            <tr>
                <td colspan=4>
                    <a href="<?php echo RUTA.'php/admin.php' ?>" class=i_button_c>Regresar</a>
                </td>
            </tr>
            </form>
        </tbody>
    </table>
</body>
</html>

