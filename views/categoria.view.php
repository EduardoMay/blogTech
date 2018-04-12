<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/blog_styles.css">
	<link rel="stylesheet" href="../assets/index.css">
	<link rel="stylesheet" href="../assets/fonts.css">
	<link rel="shortcut icon" href="../assets/images/usuario.png" type="image/x-icon">
    <title><?= $nomCat['nom_cat']?></title>
    <style>
        .grid{
            display: flex;
            width: 80%;
            margin: 1em auto;
        }
    </style>
</head>
<body>
    <!-- ENCABEZADO DE LA PAGINA -->
	<header id="header" class="">
		<div class="title">
			<a href="<?PHP echo RUTA ?>" title="Inicio" class="title_a">Blog de Tecnologia</a>
		</div>
		<menu type="context toolbar" class="menu">
			<li class="cat_menu"><a href="<?php echo RUTA ?>" class="menu_a">Inicio</a>
			</li>
			<li class="cat_menu"><a href="" class="menu_a">Noticias</a>
				<ul class="subcat_menu">
				<?php
					$categorias = getCategorias('categorias', $conexion);
					foreach ($categorias as $cat) {
						echo '<li><a href="'.RUTA.'php/cat.php?cat='.$cat['id_cat'].'" class="subcat_a">'.$cat['nom_cat'].'</a></li>';
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
				<input type="search" name="buscar" placeholder="Buscar por etiquetas" class="buscar-i">
			</form>
		</div>
	</header>
	<div class="clear"></div>
	<div class="grid">
		<main>
			<?php
				if($secciones){
					foreach ($secciones as $info ) {
						$per = nomP($info['id_per'], $conexion);
						$img = postimg($info['id_sec'], $conexion); //OBTENER LAS IMAGENES DE CADA SECCION
						
						// CONTADOR DE LIKES
						$likes = $conexion->prepare("SELECT count(*) FROM likes WHERE id_sec = :idsec");
						$likes->execute([':idsec'=>$info['id_sec']]);
						$megusta = $likes->fetch();

						if ($info['statusC'] == 1) { //CONTADPR DE COMENTARIOS SI ESTA ACTIVO
							$query = $conexion->prepare("SELECT count(*) FROM comentarios WHERE id_sec = :idsec");
							$query->execute([':idsec'=>$info['id_sec']]);
							$ttlCom = $query->fetch();

							$total_com = '<p class=likes>'.$ttlCom['count(*)'].' Comentarios</p>';
						}

						echo '<article>';
						echo '<h1 class=title-p>'.utf8_decode($info['title_sec']).'</h1>';
						echo '<p class=cat>'.$nomCat['nom_cat'].'</p><p class=date>'.$info['fch_sec'].'</p><p class="autor">Escritor: <b>'.ucwords($per['nom_per']).' '.ucwords($per['ape_per']).'</b></p>';
						$etis = $conexion->prepare("SELECT * FROM etiquetas WHERE id_sec = :idsec");
						$etis->execute([':idsec'=>$info['id_sec']]);
						foreach ($etis as $eti) {
							echo '<p class=sub_cat>#'.$eti['etiqueta'].'</p>';
						}
						echo '<section>';
						echo '<p>'.utf8_decode($info['infore_sec']).'</p>';
						echo '</section>';
						echo '<img src="../assets/posts/'.$img['postimg'].'" alt="">';
						echo '<div class="clear"></div>';
						echo '<a href='.RUTA.'publicacion.php?var1='.$info['id_sec'].' title=Ver mas class=i_button_r>Ver mas</a>';
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
								echo '<form action='.RUTA.'php/likes.php?val='.$info['id_sec'].' method=post>';
								echo $like;
								echo '</form>';
							} else {
								echo '<form action='.RUTA.'php/likes.php?val='.$info['id_sec'].' method=post>';
								echo '<input type=submit class=i_button_r value="No me gusta" name="dontlike"></input>';
								echo '</form>';
							}
							echo $total_com;
							echo '<p class=likes>'.$megusta['count(*)'].' Likes</p>';
						}
						echo '<div class="clear"></div>';
						echo '</article>';
					}
				} else{
					echo '<h1>SIN PUBLICACIONES</h1>';
				}
			?>
        </main>
    </div>
</body>
</html>