<?php
    function conexion($bd_config) {
        try{
            $conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['db_name'],$bd_config['user'],$bd_config['pass']);
            return $conexion;
        } catch (PDOException $e){
            return false;
        }
    }

    function perfiles($nombre ,$conexion) {
        $statement = $conexion->prepare("SELECT * FROM perfiles WHERE nom_per = :nom_per");
        $statement->execute([':nom_per'=>$nombre]);
        return $statement->FETCH(PDO::FETCH_ASSOC);
    }