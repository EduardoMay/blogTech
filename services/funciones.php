<?php
	/*
	*   EN TODOS LOS ARCHIVOS, SE UTILIZA PARA CONECTAR LA BASE DE DATOS
	*/

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

	/*  OBTENER DATOS DEL USUARIO LOGEADO
	*   ./PHP/ADMIN.PHP (8)
	*   ./PHP/CAT.PHP (22)
	*   ./PHP/NEWPOST.PHP (12)
	*   ./PHP/PERFIL.PHP (7)
	*/

	function iniciarSesion($table, $conexion) {
		$statement = $conexion->prepare("SELECT * FROM $table WHERE nom_user = :usuario");
		$statement->execute([
			':usuario'=>$_SESSION['usuario']
		]);
		return $statement->FETCH(PDO::FETCH_ASSOC);
	}

	/*  OBTENER LOS DATOS DE UN PERFIL ATRAVES DEL CORREO
	*   ./PHP/REGISTRO.PHP (52)
	*/

	function getPerfiles($correo, $conexion) {
		$statement = $conexion->prepare("SELECT * FROM perfiles WHERE cro_per = :cro_per");
		$statement->execute([':cro_per'=>$correo]);
		return $statement->FETCH(PDO::FETCH_ASSOC);
	}

	/*  OBTENER UN PERFIL ATRAVES DEL ID DE PERFIL
	*   ./PHP/ADMIN.PHP (9)
	*   ./PHP/CAT.PHP (24)
	*   ./PHP/NEWPOST.PHP (16)
	*   ./PHP/PERFIL.PHP (19) (27) (35)
	*   ./PHP/TENDENCIAS.PHP (21)
	*   ./INDEX.PHP (25)
	*/
	
	function getPerfil($id_per, $conexion) {
		$statement = $conexion->prepare("SELECT * FROM perfiles WHERE id_per = :id_per");
		$statement->execute([':id_per'=>$id_per]);
		return $statement->FETCH(PDO::FETCH_ASSOC);
	}

	/* OBTENER TODAS LAS CATEGORIAS
	*   ./PHP/NEWPOST.PHP (15)
	*   ./VIEWS/CATEGORIA.VIEW.PHP (32)
	*   ./INICIO.PHP (25)
	*   ./VIEWS/TENDENCIAS.VIEW,PHP (32)
	*   ./PUBLICACION.PHP (67)
	*/

	function getCategorias($table, $conexion) {
		$statement = $conexion->prepare("SELECT * FROM $table");
		$statement->execute();
		return $statement;
	}

	/* GUARDAR UNA PUBLICACION
	*   ./PHP/NEWPOST.PHP
	*/

	function setSeccion($idCat, $idPer, $title, $des, $info, $fch, $stsC, $fav, $nombre_imagen, $etiquetas, $conexion) {
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
		if ($statement == true) {
			$stm = $conexion->prepare("SELECT * FROM secciones WHERE title_sec = :title");
			$stm->execute([':title'=>$title]);
			$sec = $stm->fetch();

			foreach ($etiquetas as $eti) {
				$query = $conexion->prepare("INSERT INTO etiquetas(id_sec, etiqueta) VALUES(:idsec, :eti)");
				$query->execute([':idsec'=>$sec['id_sec'], ':eti'=>$eti]);
			}
		}
		
	}

	/*  OBTENER EL BANNER DE CADA SECCION POR MEDIO DE SU ID DE SECCION 
	*   ./VIEWS/CATEGORIA.VIEW.PHP (54)
	*   ./VIWS/TENDENCIAS.VIEWS.PHP (53)
	*   ./INICIO.PHP (46)
	*/

	function postimg($idsec, $conexion) {
		$statement = $conexion->prepare("SELECT * FROM secciones WHERE id_sec = :idsec");
		$statement->execute([':idsec' => $idsec]);
		return $avatar = $statement->fetch();
	}

	/*  ACTUALIZAR LOS DATOS DEL PERFIL Y USUARIO
	*   ./PHP/PERFIL.PHP (56)
	*/
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

	/*  OBTENER EL NOMBRE Y APELLIDO DE UN PERFIL
	*   ./VIEWS/CATEGORIA.VIEW.PHP (53)
	*   ./VIEWS.TENDENCIAS.VIEW.PHP (55)
	*   ./INICIO.PHP (48)
	*/

	function nomP($id_per, $conexion) {
		$s_per = $conexion->prepare("SELECT nom_per, ape_per FROM perfiles WHERE id_per = :id_per");
		$s_per->execute([':id_per' => $id_per]);
		return $id_per = $s_per->fetch();
	}
	
	/* OBTENER EL NOMBRE DE LA CATEGORIA SELECCIONADA
	*   ./CAT.PHP (7)
	*   ./VIEWS/TENDENCIAS.VIEW.PHP (54)
	*   ./INICIO.PHP (49)
	*/

	function idCat($id_cat, $conexion) {
		$s_cat = $conexion->prepare("SELECT nom_cat FROM categorias WHERE id_cat = :id_cat");
		$s_cat->execute([':id_cat' => $id_cat]);
		return $id_cat = $s_cat->fetch();
	}
	
	/* OBTENER EL AVATAR DEL PERFIL
	*   ./PHP/PERFIL.PHP
	*/

	function avatar($conexion) {
		$statement = $conexion->prepare("SELECT * FROM perfiles WHERE id_per = :idper");
		$statement->execute([':idper' => $_SESSION['id_per']]);
		return $avatar = $statement->fetch();
	}

	/*  GUARDAR EL AVATAR
	*   ./PHP/PERFIL.PHP (71)
	*/

	function subirImagen($nombre_imagen, $tipo_imagen, $tamanio_imagen, $conexion) {
		$nombre_imagen = $_SESSION['usuario'].'.png';
		$error = '';
			// RUTA DE LA CARPETA DESTINO EN SERVIDOR
			$carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/blog/assets/avatars/';
			// MOVEMOS LA IMAGEN DEL DIRECTORIO TEMPORAL AL DIRECTORIO ESCOGIDO
			move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombre_imagen);
			$carpeta = $carpeta_destino.$nombre_imagen;
			$sql = "UPDATE perfiles SET avatar = '$nombre_imagen' WHERE id_per = ".$_SESSION['id_per'];
			$statement = $conexion->prepare($sql);
			$statement->execute();
		return $error;
	}

	