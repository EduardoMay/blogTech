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
				<a href="<?php echo RUTA ?>" title="Inicio" class="title_a">Blog de Tecnologia</a>
			</div>
			<menu type="context toolbar" class="menu">
				<li class="cat_menu"><a href="" class="menu_a">Inicio</a>
				</li>
				<li class="cat_menu"><a href="" class="menu_a">Noticias</a>
					<ul class="subcat_menu">
					<?php
						$cat = getCategorias('categorias', $conexion);
						foreach ($cat as $valor) {
							echo '<li><a href="'.RUTA.'php/cat.php?cat='.$valor['id_cat'].'" class="subcat_a">'.$valor['nom_cat'].'</a></li>';
						}
					?>
					</ul>
				</li>
				<li class="cat_menu"><a href="<?php echo RUTA.'php/tendencias.php' ?>" class="menu_a">Tendencias</a></li>
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
						echo '<p class=cat>'.$cat['nom_cat'].'</p><p class=date>'.$info['fch_sec'].'</p><p class="autor">Escritor: <b>'.ucwords($per['nom_per']).' '.ucwords($per['ape_per']).'</b></p>';
						echo '<section>';
						echo '<p>'.utf8_decode($info['infore_sec']).'</p>';
						echo '</section>';
						echo '<img src="http://logok.org/wp-content/uploads/2014/06/LG-Logo-face-880x660.png" alt="">';
						echo '<div class="clear"></div>';
						echo '<a href=publicacion.php?var1='.$info['id_sec'].' title=Ver mas class=i_button_r>Ver mas</a>';
						if (!isset($_SESSION['usuario'])) { //CUANDO NO ESTA LOGEADO ALGUN USUARIO
							// CONTADOR DE LIKES
							$likes = $conexion->prepare("SELECT count(*) FROM likes WHERE id_sec = :idsec");
							$likes->execute([':idsec'=>$info['id_sec']]);
							$megusta = $likes->fetch();

							echo '<p class=likes>'.$megusta['count(*)'].' Likes</p>';
						} else {
							// CONTADOR DE LIKES
							$likes = $conexion->prepare("SELECT count(*) FROM likes WHERE id_sec = :idsec");
							$likes->execute([':idsec'=>$info['id_sec']]);
							$megusta = $likes->fetch();


							$query = $conexion->prepare("SELECT * FROM likes WHERE id_per = :idper AND id_sec = :idsec LIMIT 1");
							$query->execute([
								':idper' => $_SESSION['id_per'],
								':idsec' => $info['id_sec']
							]);
							$mg = $query->fetch();
							if ($mg == false) {
								echo '<form action=./php/likes.php?val='.$info['id_sec'].' method=post>';
								echo $like;
								echo '</form>';
							} else {
								echo '<form action=./php/likes.php?val='.$info['id_sec'].' method=post>';
								echo '<input type=submit class=i_button_r value="No me gusta" name="dontlike"></input>';
								echo '</form>';
							}
							echo '<p class=likes>'.$megusta['count(*)'].' Likes</p>';
						}
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
							echo '<section class=aside-info>';
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