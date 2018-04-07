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

    function getCategorias($table, $conexion) {
        $statement = $conexion->prepare("SELECT * FROM $table");
        $statement->execute();
        return $statement;
    }

    function getSecciones($table, $conexion) {
        $statement = $conexion->prepare("SELECT * FROM $table");
        $statement->execute();
        return $statement;
    }

    function setPerfil($nom, $ape, $email, $conexion) {
        $statement = $conexion->prepare("SELECT * FROM perfiles (nom_per, ape_per, cro_per) VALUES (:nombre, :apellido, :email)");
        $statement->execute([
            ':nombre'=>$nom,
            ':apellido'=>$ape,
            ':email'=>email
        ]);
        return $statement->FETCH();
    }

    function setSeccion($idCat, $idPer, $title, $des, $info, $fch, $stsC, $fav, $nombre_imagen, $conexion) {
        // RUTA DE LA CARPETA DESTINO EN SERVIDOR
		$carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/blog/assets/posts/';
		// MOVEMOS LA IMAGEN DEL DIRECTORIO TEMPORAL AL DIRECTORIO ESCOGIDO
		move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombre_imagen);
        $statement = $conexion->prepare("INSERT INTO secciones(id_cat, id_per, title_sec, infore_sec, info_sec, fch_sec, statusC, ten_sec, postimg) VALUES(:idcat, :idper, :title, :infodes, :info, :fch, :statusc, :fav, :img)");
        $statement->execute([
            ':idcat' => $idCat,
            ':idper' => $idPer,
            ':title' => $title,
            ':infodes' => $des,
            ':info' => $info,
            ':fch' => $fch,
            ':statusc' => $stsC,
            ':fav' => $fav,
            ':img' => $nombre_imagen
        ]);
        return $statement;
    }

    function postimg($idsec, $conexion) {
        $statement = $conexion->prepare("SELECT * FROM secciones WHERE id_sec = :idsec");
        $statement->execute([':idsec' => $idsec]);
        return $avatar = $statement->fetch();
    }

    function updatePerfil($id, $newNombre, $newApe, $newUser, $newEmail, $newPass, $conexion) {
        $statement = $conexion->prepare("UPDATE perfiles SET nom_per = :nombre, ape_per = :ape, cro_per = :email WHERE id_per = :id");
        $statement->execute([
            ':id'       =>  $id,
            ':nombre'   =>  $newNombre,
            ':ape'      =>  $newApe,
            ':email'    =>  $newEmail
        ]);
        if (!empty($newUser)) {
            $statement2 = $conexion->prepare("UPDATE users SET nom_user = :user WHERE id_per = :id");
            $statement2->execute([
                'id'    =>  $id,
                ':user' =>  $newUser,
            ]);
            $_SESSION['usuario'] = $newUser;
        }
        if (!empty($newPass)) {
            $statement2 = $conexion->prepare("UPDATE users SET pas_user = :pass WHERE id_per = :id");
            $statement2->execute([
                'id'    =>  $id,
                ':pass' =>  $newPass
            ]);
        }
        $resulado = 'correcto';
        return $resulado;
    }

    function nomP($id_per, $conexion) {
		$s_per = $conexion->prepare("SELECT nom_per, ape_per FROM perfiles WHERE id_per = :id_per");
		$s_per->execute([':id_per' => $id_per]);
		return $id_per = $s_per->fetch();
    }
    
    function idCat($id_cat, $conexion) {
		$s_cat = $conexion->prepare("SELECT nom_cat FROM categorias WHERE id_cat = :id_cat");
		$s_cat->execute([':id_cat' => $id_cat]);
		return $id_cat = $s_cat->fetch();
    }
    
    function avatar($conexion) {
        $statement = $conexion->prepare("SELECT * FROM perfiles WHERE id_per = :idper");
        $statement->execute([':idper' => $_SESSION['id_per']]);
        return $avatar = $statement->fetch();
    }

    function subirImagen($nombre_imagen, $tipo_imagen, $tamanio_imagen, $conexion) {
        $nombre_imagen = $_SESSION['usuario'].'.png';
		// echo $tipo_imagen;
		$error = '';
			// RUTA DE LA CARPETA DESTINO EN SERVIDOR
			$carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/blog/assets/avatars/';
			// MOVEMOS LA IMAGEN DEL DIRECTORIO TEMPORAL AL DIRECTORIO ESCOGIDO
			move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombre_imagen);
			$carpeta = $carpeta_destino.$nombre_imagen;
			$sql = "UPDATE perfiles SET avatar = '$nombre_imagen' WHERE id_per = ".$_SESSION['id_per'];
			$statement = $conexion->prepare($sql);
			$statement->execute();
			// header('Location: '.RUTA.'php/perfil.php');
        return $error;
    }

    