<?php
    include '../services/config.php';
    include '../services/funciones.php';

    $conexion = conexion($bd_config);
    if (isset($_POST['contra'])) {
        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
            $correos = getPerfiles($email, $conexion);
            $statement = $conexion->prepare("SELECT * FROM perfiles WHERE cro_per = :correo LIMIT 1");
            $statement->execute([':correo'=>$email]);
            $perfil = $statement->fetch();
            if ($perfil !== true) {
                echo $perfil['cro_per'];
                // $error = $perfil['cro_per'];
            }
        } else {
            $error = '<li class=error>Ingrese un correo</li>';
        }
    } 

    require_once '../views/recuperar.view.php';

    