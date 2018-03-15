<?php
    function conexion($bd_config) {
        try{
            #$variable = new PDO('mysql:host=localhost;dbname=nombre_base_datos', 'usuario', 'password');
            $conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['db_name'],$bd_config['user'],$bd_config['pass']);
            return $conexion;
        } catch (PDOException $e){
            return false;
        }
    }

    function iniciarSesion($table, $conexion) {
        $statement = $conexion->prepare('SELECT * FROM $table WHERE usuario = :usuario');
        $statement->execute([
            ':usuario'=>$_SESSION['usuario']
        ]);
        return $statement->FETCH(PDO::FETCH_ASSOC);
    }

    function getPerfiles($correo, $conexion) {
        $statement = $conexion->prepare("SELECT * FROM perfiles WHERE cro_per = :cro_per");
        $statement->execute([':cro_per'=>$correo]);
        return $statement->FETCH(PDO::FETCH_ASSOC);
    }