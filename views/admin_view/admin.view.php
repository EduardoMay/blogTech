<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Inicio</title>
		<link rel="stylesheet" href="./assets/blog_styles.css">
		<link rel="stylesheet" href="./assets/admin.css">
		<link rel="stylesheet" href="./assets/fonts.css">
		<link rel="shortcut icon" href="./assets/images/usuario.png" type="image/x-icon">
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
				<p> <span class="icon-smile"></span> <?php echo ucwords($nom['nom_per']) ?> <span class="icon-play3"></span></p>
				<div class="info">
					<a href="<?php echo RUTA.'php/perfil.php' ?>">Ver Perfil</a>
					<a href="./php/cerrar.php">Cerrar Sesion</a>
				</div>
			</div>
		</header>
		<!-- RESETEAR FLOAT -->
		<div class="clear"></div>
		<!-- CREAR MARGINT TOP -->
		<div class="margin"></div>
		<!-- SELECCION -->
		<main class="grid">
			<div class="grid_1">
				<img src="./assets/images/archivo-nuevo.svg" alt="">
				<a href="<?php echo RUTA.'php/newPost.php'; ?>">Nueva Publicacion</a>
			</div>
			<div class="grid_2">
				<img src="./assets/images/usuario.svg" alt="">
				<a href="<?php echo RUTA.'views/admin_view/viewUsers.view.php'; ?>">Usuarios</a>
			</div>
			<div class="grid_3">
				<img src="./assets/images/nota.svg" alt="">
				<a href="<?php echo RUTA.'index.php' ?>">Posts</a>
			</div>
		</main>
		<!-- PIE DE PAGINA -->
		<footer>
			<p>Todos los Derechos Reservados</p>
			<P>Editor: Eduardo May</P>
			<p>Cancun, Q. Roo. Mexico</p>
		</footer>
	</body>
</html>