<?php
	// CREA UN ENLAZE CON LAS RUTAS DE CONFIG Y FUNCIONES
	include '../services/config.php';
	include '../services/funciones.php';
	// CREA LA CONEXION A LA BASE DE DATOS
	$conexion = conexion($bd_config);

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// IMPORTA TODOS LOS DATOS
		$usuario    = $_POST['user'];
		$nombre     = $_POST['nom'] ;
		$apellidos  = $_POST['ape'];
		$correo     = $_POST['email'];
		$password   = $_POST['pass'];

		// VARIBLE PARA DAR MENSAJES DE ERROR
		$error = '';

		// VALIDA QUE LOS CAMPOS ESTEN LLENOS
		if (empty($nombre) || empty($apellidos) || empty($correo) ) {
			$error = '<li class=error>Por favor rellene todos los campos</li>';
		} else {
			// PREPARA LA SENTENCIA SQL PARA VER QUE NO ESTE REGISTRADO UN USUARIO IGUAL
			$statement = $conexion->prepare('SELECT * FROM users WHERE nom_user = :nom_user LIMIT 1');
			$statement->execute([':nom_user'=>$usuario]);
			$resultado = $statement->fetch();

			if ($resultado != false) {
				$error .= '<li class=error>Este usuario ya existe</li>';
			} else{
				// PREPARA LA SENTENCIA SQL PARA VER QUE NO ESTE REGISTRADO UN CORREO IGUAL
				$statement = $conexion->prepare('SELECT * FROM perfiles WHERE cro_per = :correo LIMIT 1');
				$statement->execute([':correo'=>$correo]);
				$resultado = $statement->fetch();

				if ($resultado != false) {
					$error .= '<li class=error>Este correo ya esta registrado</li>';
				}
			}
		}
		// SI LA VARIABLE NO GUARDO NINGUN MENSAJE, PROSIGUE A GUARDAR LOS DATOS
		if ($error == '') {
			// PREPARA LA SENTENCIA SQL PARA GUARDAR LOS DATOS A LA TABLA PERFILES
			$statement = $conexion->prepare('INSERT INTO perfiles (id_per, nom_per, ape_per, cro_per) VALUES(null, :nom_per, :ape_per, :cro_per)');
			$statement->execute([
				':nom_per'=>$nombre,
				':ape_per'=>$apellidos,
				':cro_per'=>$correo
			]);
			if ($statement == true) {
				// PREPARA LA SENTENCIA SQL PARA GUARDAR LOS DATOS A LA TABLA USUARIOS
				$perfil = getPerfiles($correo, $conexion);
				$id     = $perfil['id_per'];

				$statement = $conexion->prepare('INSERT INTO users (id_user, nom_user, pas_user, tipo_user, status, id_per) VALUES(null, :usuario, :password, :tipo, :status, :id)');
				$statement->execute([
					':usuario'=>$usuario,
					':password'=>$password,
					':tipo'=>'1',
					':status'=>'activo',
					':id'=>$id
				]);
				$estado = 'TE HAS REGISTRADO EXITOSAMENTE';
				return require '../views/estado.view.php';;
			}else{
				$estado = 'ERROR 404';
				return require '../views/estado.view.php';
			}
		}
	}
	require '../views/register.view.php';