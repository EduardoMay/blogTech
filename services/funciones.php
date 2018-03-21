<?php
    function conexion($bd_config) {
        try{
            #$variable = new PDO('mysql:host=localhost;dbname=nombre_base_datos', 'usuario', 'password');
            $conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['db_name'],$bd_config['user'],$bd_config['pass']);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e){
            // return false;
            echo $e->getMessage();
        }
    }

    function iniciarSesion($table, $conexion) {
        $statement = $conexion->prepare("SELECT * FROM $table WHERE nom_user = :usuario");
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
    
    function getPerfil($id_per, $conexion) {
        $statement = $conexion->prepare("SELECT * FROM perfiles WHERE id_per = :id_per");
        $statement->execute([':id_per'=>$id_per]);
        return $statement->FETCH(PDO::FETCH_ASSOC);
    }

    function setPerfil($nom, $ape, $email, $conexion) {
        $statement->prepare("SELECT * FROM perfiles (nom_per, ape_per, cro_per) VALUES (:nombre, :apellido, :email)");
        $statement->execute([
            ':nombre'=>$nom,
            ':apellido'=>$ape,
            ':email'=>email
        ]);
        return $statement->FETCH();
    }

    function setUser($user, $password) {
        $statement->prepare("");
    }

    function UpdatePerfil() {
    
    }

    function DeletePerfil() {
    
    }