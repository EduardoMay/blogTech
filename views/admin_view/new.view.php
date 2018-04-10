<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Nuevo Post</title>
		<link rel="stylesheet" href="../assets/blog_styles.css">
		<link rel="stylesheet" href="../assets/fonts.css">
		<link rel="shortcut icon" href="../assets/images/usuario.png" type="image/x-icon">
		<style>
			.i_button_c{
				margin: 0;
			}
		</style>
	</head>
	<body>
		<!-- ENCABEZADO DE LA PAGINA -->
		<header id="header" class="">
			<div class="title">
				<a href="<?php echo RUTA.'index.php' ?>" title="Inicio" class="title_a">Blog de Tecnologia</a>
			</div>
			<menu type="context toolbar" class="menu">
				<li class=cat_menu style="line-height: 100px; color: white;">ADMINISTRADOR</li>
			</menu>
			<div class="perfil">
				<p> <span class="icon-smile"></span> <?php echo ucwords($nom['nom_per']); ?> <span class="icon-play3"></span></p>
				<div class="info">
					<p></p>
					<a href="<?php echo RUTA.'php/perfil.php' ?>">Ver Perfil</a>
					<a href="../php/cerrar.php">Cerrar Sesion</a>
				</div>
			</div>
		</header>
		<!-- RESETEAR FLOAT -->
		<div class="clear"></div>

		<!-- SELECCION -->
		<div class="margin"></div>
		<main class="grid">
			<form action="<?= RUTA.'php/newpost.php' ?>" method="post" enctype="multipart/form-data">
				<table>
					<caption>Nueva Pulicacion</caption>
					<thead>
						<tr>
							<th>
								<a href="<?= RUTA.'php/admin.php'?>" class=i_button_c>Volver</a>
							</th>
						</tr>
					</thead>
					<tbody class=newpost>
						<tr>
							<td colspan=2>
								<?php if (!empty($error)): ?>
									<?php echo $error;  ?>
								<?php endif; ?>
							</td>
						</tr>
						<tr>
							<td>Categoria:</td>
							<td>
								<select name="cat" id="cat">
									<?php 
										foreach ($categorias as $valor) {
											echo "<option value=".$valor['id_cat'].">".$valor['nom_cat']."</option>";
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Titulo:</td>
							<td>
								<input type="text" name="title">
							</td>
						</tr>
						<tr>
							<td colspan=2>
								<b>Usar etiquetas HTML para tener una mejor vista al visitar la publicacion</b>
							</td>
						</tr>
						<tr>
							<td>Descripcion:</td>
							<td>
								<textarea name="des" id="" cols="30" rows="10"></textarea>
							</td>
						</tr>
						<tr class=pub>
							<td>Publicacion:</td>
							<td>
								<textarea name="post" id="" cols="30" rows="10"></textarea>
							</td>
						</tr>
						<tr>
							<td>Fecha de Publicacion</td>
							<td>
								<input type="date" name="fch" id="">
							</td>
						</tr>
						<tr>
							<td>Comentarios</td>
							<td>
								<select name="stsc" id="">
									<option value="1">Si</option>
									<option value="0">No</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Tendencia</td>
							<td>
								<select name="fav" id="">
									<option value="1">Si</option>
									<option value="0">No</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Banner</td>
							<td>
								<input type="file" name="imagen">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input class=i_button_c type="submit" value="Publicar">
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</main>
		<div class="margin"></div>
	</body>
</html>