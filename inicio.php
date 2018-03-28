<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Inicio</title>
		<link rel="stylesheet" href="assets/blog_styles.css">
		<link rel="stylesheet" href="assets/index.css">
		<link rel="stylesheet" href="./assets/fonts.css">
		<link rel="shortcut icon" href="assets/images/usuario.png" type="image/x-icon">
	</head>
	<body>
		<!-- ENCABEZADO DE LA PAGINA -->
		<header id="header" class="">
			<div class="title">
				<a href="./index.php" title="Inicio" class="title_a">Blog de Tecnologia</a>
			</div>
			<menu type="context toolbar" class="menu">
				<li class="cat_menu"><a href="" class="menu_a">Inicio</a>
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
		<div class="grid">
			<main>
				<?php
					foreach ($resultado as $info ) {
						$per = nomP($info['id_per'], $conexion);
						$cat = idCat($info['id_cat'], $conexion);
						echo '<article>';
						echo '<h1 class=title-p>'.utf8_decode($info['title_sec']).'</h1>';
						echo '<p class=cat>'.$cat['nom_cat'].'</p><p class=date>'.$info['fch_sec'].'</p><p class="autor">Escritor: '.ucwords($per['nom_per']).' '.ucwords($per['ape_per']).'</p>';
						echo '<section>';
						echo '<p>'.utf8_decode($info['infore_sec']).'</p>';
						echo '</section>';
						echo '<img src="http://logok.org/wp-content/uploads/2014/06/LG-Logo-face-880x660.png" alt="">';
						echo '<div class="clear"></div>';
						echo '<a href=publicacion.php?var1='.$info['id_sec'].' title=Ver mas class=i_button_r>Ver mas</a>';
						echo $like;
						echo '<div class="clear"></div>';
						echo '</article>';
					}
				?>
			</main>
			<!-- LO MAS RECIENTE DE LAS NOTICIAS, PARTE DE LA DERECHA -->
			<aside>
				<?php
					$noticia = $conexion->prepare("SELECT * FROM secciones");
					$noticia->execute();
					$resultado = $noticia;

					foreach ($resultado as $info ) {
						if ($info['ten_sec'] == 1) {
							$per = nomP($info['id_per'], $conexion);
							$cat = idCat($info['id_cat'], $conexion);
							echo '<article>';
							echo '<h1 class=title_as>'.utf8_decode($info['title_sec']).'</h1>';
							echo '<section>';
							echo '<p>'.utf8_decode($info['infore_sec']).'</p>';
							echo '</section>';
							echo '<div class="clear"></div>';
							echo '<a href=publicacion.php?var1='.$info['id_sec'].' title="Ver mas" class="i_button_r">Ver mas</a>';
							echo '<div class="clear"></div>';
							echo '</article>';
						
						}
					}
				?>
			</aside>
		</div>
		<!-- PIE DE PAGINA -->
		<footer>
			<p>&copy; Todos los Derechos Reservados</p>
			<P>Editor: Eduardo May</P>
			<p>Cancun, Q. Roo. Mexico</p>
		</footer>
	</body>
</html>