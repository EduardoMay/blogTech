<?php session_start();
	require './services/config.php';
	require './services/funciones.php';

	$conexion = conexion($bd_config);
    
    if(!isset($_SESSION['usuario'])) {
		$infoP = "  
		<div class=ingreso>
			<a href='./php/login.php' title='Ingresar'>Ingresar</a>
			<a href='php/registro.php' title='Registrate'>Registrate</a>
		</div>";
	}else{
		$user = iniciarSesion('users', $conexion);
		// OBTENER NOMBRE DE PERFIL
		$nom = getPerfil($user['id_per'], $conexion);

		$infoP = "
		<div class=perfil>
			<p> <span class=icon-smile></span>".ucwords($nom['nom_per'])."<span class=icon-play3></span></p>
			<div class=info>
				<a href=./php/perfil.php>Ver Perfil</a>
				<a href=./php/cerrar.php>Cerrar Sesion</a>
		</div>";
	}

	$idSec = $_GET['var1'];
	$statement = $conexion->prepare("SELECT * FROM secciones WHERE id_sec = :id_sec LIMIT 1");
	$statement->execute([
		':id_sec'=>$idSec
	]);
	$resultado = $statement->fetch();
	$cat = idcat($resultado['id_cat'], $conexion);
	$per = nomP($resultado['id_per'], $conexion);
	$_SESSION['id_sec'] = $idSec;
	// echo $resultado['id_cat'];
	// echo $cat['nom_cat'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Inicio</title>
		<link rel="stylesheet" href="./assets/blog_styles.css">
		<link rel="stylesheet" href="./assets/publicacion.css">
		<link rel="stylesheet" href="./assets/fonts.css">
		<link rel="shortcut icon" href="./assets/images/usuario.png" type="image/x-icon">
	</head>
	<body>
		<!-- ENCABEZADO DE LA PAGINA -->
		<header id="header" class="">
			<div class="title">
				<a href="./index.php" title="Inicio" class="title_a">Blog de Tecnologia</a>
			</div>
			<menu type="context toolbar" class="menu">
				<li class="cat_menu"><a href="./index.php" class="menu_a">Inicio</a>
				</li>
				<li class="cat_menu"><a href="" class="menu_a">Noticias</a>
					<ul class="subcat_menu">
						<li><a href="" class="subcat_a">Moviles</a></li>
						<li><a href="" class="subcat_a">Apps y Software</a></li>
						<li><a href="" class="subcat_a">Juegos</a></li>
						<li><a href="" class="subcat_a">Motor</a></li>
						<li><a href="" class="subcat_a">Portatiles</a></li>
						<li><a href="" class="subcat_a">Computadoras</a></li>
						<li><a href="" class="subcat_a">Televisores</a></li>
						<li><a href="" class="subcat_a">Gadgets</a></li>
						<li><a href="" class="subcat_a">Realidad Virtual</a></li>
						<li><a href="" class="subcat_a">Audio</a></li>
						<li><a href="" class="subcat_a">Camaras</a></li>
					</ul>
				</li>
				<li class="cat_menu"><a href="" class="menu_a">Tendencias</a></li>
			</menu>
			<?php 
				if (!empty($infoP)) {
					echo $infoP;
				}
			?>
		</header>
		<!-- RESETEAR FLOAT -->
		<div class="clear"></div>
		 <!--PUBLICACION DE LA NOTICIA  -->
		<div class="banner">
			<!-- <img src="http://www.publicdomainpictures.net/pictures/150000/velka/banner-header-tapete-1450520058Odj.jpg" alt=""> -->
		</div>
		<div class="content-noticia">
			<div class="item-header">
				<?php echo '<p class="item-titulo">'.$resultado['title_sec'].'</p>' ?>
				<?php echo '<p class="cat">'.$cat['nom_cat'].'</p><p class="date">'.$resultado['fch_sec'].'</p><p class="autor">'.ucwords($per['nom_per']).'</p>' ?>
			</div>
			<div class="clear"></div>
			<div class="item-noticia">
				<p>
					<?php echo utf8_decode($resultado['info_sec']) ?>
				</p>
			</div>
			<div class="item-img">
				<img src="" alt="">
			</div>
		</div>
		<!-- COMENTARIOS -->
		<div class="content-coment">
			<?php
				if ($resultado['statusC'] == 1 && isset($_SESSION['usuario'])) {
					echo '
						<div class="content-coment-title">
							Comentarios
						</div>
					';
					// Envio de comentarios
					echo '
						<div class="item-perfil">
							<form action="./php/comentarios.php" method="post">
								<div class="perfil-img">
									<img src="./assets/images/usuario.png" title="Eduardo May">
								</div>
								<div class="perfil-comentario">
									<textarea placeholder="Escribe tu comentario:" name="com" id="" cols="30" rows="10"></textarea>
								</div>
								<div class="clear"></div>
								<div class="perfil-boton">
									<input type="submit" value="Enviar">
								</div>
								<div class="clear"></div>
							</form>
						</div>
					';
				}

			?>
			<!-- VER COMENTARIOS -->
			<?php
				// TOMAR TODOS LOS COMENTARIOS QUE ESTES LIGADOS A LA SECCION SELECCIONADAS
				$stm = $conexion->prepare("SELECT * FROM comentarios WHERE id_sec = :idsec ORDER BY id_com DESC");
				$stm->execute([
					':idsec'=>$idSec
				]);
				$comentarios = $stm;
				
				// CONTADOR DE COMENTARIOS
				$query = $conexion->prepare("SELECT count(*) FROM comentarios WHERE id_sec = :idsec");
				$query->execute([':idsec'=>$idSec]);
				$ttlCom = $query->fetch();

				if ($stm) {
					echo '
						<div class="content-coment-title">
							Comentarios
						</div><p>'.$ttlCom['count(*)'].' Comentarios</p>
					';
				}
				foreach ($comentarios as $com) {
					$namep = getPerfil($com['id_per'], $conexion);
					echo '<div class="item-comentarios">';
					echo '<div class="coment-img">
					<img src="./assets/images/usuario.png" title="Eduardo May">
					</div>';
					echo '<div class="coment-alinear">
					<div class="coment-nombre">'.ucwords($namep['nom_per']).' '.ucwords($namep['ape_per']).'</div>
					<div class="coment">'.
					ucwords($com['comentario'])	
					.'</div>
					</div>';
					echo '<div class="clear"></div>';
					echo '</div>';
				}
			?>
		</div>
		<!-- PIE DE PAGINA -->
		<footer>
			<p>&copy; Todos los Derechos Reservados</p>
			<P>Editor: Eduardo May</P>
			<p>Cancun, Q. Roo. Mexico</p>
		</footer>
	</body>
</html>