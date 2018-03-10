<?php 
    require '../config/config.php';
    require '../funciones/funciones.php';
    $conexion = conexion($bd_config);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $_POST['user'];
        $nombre = $_POST['nom'] ;
        $apellidos = $_POST['ape'];
        $correo = $_POST['email'];
        $password = $_POST['pass'];
        
        $error = '';
        // $avatar = ;
        if (empty($nombre) || empty($apellidos) || empty($correo) ) {
            $error = '<li class=error>Por favor rellene todos los campos</li>';
        } else {
            $statement = $conexion->prepare('SELECT * FROM users WHERE nom_user = :nom_user LIMIT 1');
            $statement->execute([':nom_user'=>$nombre]);
            $resultado = $statement->fetch();
            if ($resultado != false) {
                $error .= '<li class=error>Este usuario ya existe</li>';
            }
        }
        if ($error == '') {
            $statement = $conexion->prepare('INSERT INTO perfiles (id_per, nom_per, ape_per, cro_per) VALUES(null, :nom_per, :ape_per, :cro_per)');
            $statement->execute([
                ':nom_per'=>$nombre,
                ':ape_per'=>$apellidos,
                ':cro_per'=>$correo
            ]);
            if ($statement == true) {
                $perfil = perfiles($nombre, $conexion);
                $id = $perfil['id_per'];
                $statement = $conexion->prepare('INSERT INTO users (id_user, nom_user, pas_user, tipos_user, status, id_per) VALUES(null, :usuario, :password, :tipo, :status, :id)');
                $statement->execute([
                    ':usuario'=>$usuario,
                    ':password'=>$password,
                    ':tipo'=>'usuario normal',
                    ':status'=>'activo',
                    ':id'=>$id
                ]);
            }else{
                echo 'ERROR AL ENVIAR LOS DATOS';
            }
            
        }
    }