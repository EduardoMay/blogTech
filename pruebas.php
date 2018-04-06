<title>Pruebas</title>
<?php

	require 'services/config.php';
	require 'services/funciones.php';
	$conexion = conexion($bd_config);

	// CONSULTAR PERFILES
	// $correo = 'lalo@gmail.com';
	// $perfil = getPerfiles($correo, $conexion);
	// echo $perfil['nom_per'].' '.$perfil['ape_per'].' '.$perfil['cro_per'];

	// INNER JOIN
	// $statement = $conexion->prepare("SELECT perfiles.nom_per, users.nom_user from users inner join perfiles on users.id_per = perfiles.id_per");
	// $statement->execute();
	// $statement->setFetchMode(PDO::FETCH_ASSOC);
	// $result = $statement->fetchAll();
	// foreach ($result as $key) {
	//     echo $key['nom_per'].' '.$key['nom_user'].'<br>';
	// }

// echo $_SERVER['HTTP_HOST'];
	// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// echo $_POST['boton'];
	// }
	$likes = $conexion->prepare("SELECT * FROM likes");
	$likes->execute();

	foreach ($likes as $like ) {
		if ($like['id_sec'] == 10 ) {
			echo $like['megusta'];
		}
	}