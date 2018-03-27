<?php session_start();
	require './services/config.php';
	require './services/funciones.php';
	$conexion = conexion($bd_config);
	$idSec = $_GET['var1'];
	$statement = $conexion->prepare("SELECT * FROM secciones WHERE id_sec = :id_sec LIMIT 1");
	$statement->execute([
		':id_sec'=>$idSec
	]);
	$resultado = $statement->fetch();
	$cat = idcat($resultado['id_cat'], $conexion);
	$per = nomP($resultado['id_per'], $conexion);
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
				<!-- <div class="ingreso">
				<a href="./php/login.php" title="Ingresar">Ingresar</a>
				<a href="./php/registro.php" title="Registrate">Registrate</a>
			</div> -->
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
			<div class="content-coment-title">
				Comentarios
			</div>
			<!-- ENVIO DE COMENTARIO -->
			<div class="item-perfil">
				<form action="" method="post">
					<div class="perfil-img">
						<img src="./assets/images/usuario.png" title="Eduardo May">
					</div>
					<div class="perfil-comentario">
						<textarea name="" id="" cols="30" rows="10"></textarea>
					</div>
					<div class="clear"></div>
					<div class="perfil-boton">
						<input type="submit" value="Enviar">
					</div>
					<div class="clear"></div>
				</form>
			</div>
			<!-- VER COMENTARIOS -->
			<div class="item-comentarios">
				<div class="coment-img">
					<img src="./assets/images/usuario.png" title="Eduardo May">
				</div>
				<div class="coment-alinear">
					<div class="coment-nombre">Lalo M</div>
					<div class="coment">
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid blanditiis architecto aspernatur quisquam nemo possimus voluptates necessitatibus beatae dolores exercitationem provident culpa modi dolore, magni facere sequi doloribus cupiditate laborum?
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<!-- PIE DE PAGINA -->
		<footer>
			<p>&copy; Todos los Derechos Reservados</p>
			<P>Editor: Eduardo May</P>
			<p>Cancun, Q. Roo. Mexico</p>
		</footer>
	</body>
</html>