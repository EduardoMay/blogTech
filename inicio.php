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
			<div class=buscar>
				<form action="<?= RUTA.'php/buscar.php' ?>" method=post>
					<input type="search" name="buscar" placeholder="Buscar pos etiquetas" class=buscar-i>
				</form>
			</div>
		</header>
		<!-- RESETEAR FLOAT -->
		<div class="clear"></div> 
		<div class="grid">
			<main>
				<?php
					$total_com = null;
					foreach ($secciones as $info ) {
						$img = postimg($info['id_sec'], $conexion);

						$per = nomP($info['id_per'], $conexion);
						$cat = idCat($info['id_cat'], $conexion);

						// CONTADOR DE LIKES
						$likes = $conexion->prepare("SELECT count(*) FROM likes WHERE id_sec = :idsec");
						$likes->execute([':idsec'=>$info['id_sec']]);
						$megusta = $likes->fetch();


						if ($info['statusC'] == 1) {
							// CONTADOR DE COMENTARIOS
							$query = $conexion->prepare("SELECT count(*) FROM comentarios WHERE id_sec = :idsec");
							$query->execute([':idsec'=>$info['id_sec']]);
							$ttlCom = $query->fetch();
							$total_com = '<p class=likes>'.$ttlCom['count(*)'].' Comentarios</p>';
						}

						echo '<article>';
						echo '<h1 class=title-p>'.utf8_decode($info['title_sec']).'</h1>';
						echo '<p class=cat>'.$cat['nom_cat'].'</p><p class=date>'.$info['fch_sec'].'</p><p class="autor">Escritor: <b>'.ucwords($per['nom_per']).' '.ucwords($per['ape_per']).'</b></p>';
						echo '<section>';
						echo '<p>'.utf8_decode($info['infore_sec']).'</p>';
						echo '</section>';
						echo '<img src="./assets/posts/'.$img['postimg'].'" alt="">';
						echo '<div class="clear"></div>';
						echo '<a href=publicacion.php?var1='.$info['id_sec'].' title=Ver mas class=i_button_r>Ver mas</a>';
						if (!isset($_SESSION['usuario'])) { //CUANDO NO ESTA LOGEADO ALGUN USUARIO
							echo $total_com;
							echo '<p class=likes>'.$megusta['count(*)'].' Likes</p>';
						} else {
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
							echo $total_com;
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
					$noticia = $conexion->prepare("SELECT * FROM secciones ORDER BY id_sec DESC");
					$noticia->execute();
					$secciones = $noticia;

					foreach ($secciones as $info ) {
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