<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="stylesheet" href="./assets/blog_styles.css">
		<link rel="stylesheet" href="./assets/index.css">
		<link rel="stylesheet" href="./assets/fonts.css">
		<link rel="shortcut icon" href="./assets/images/usuario.png" type="image/x-icon">
		<title>Inicio</title>
	</head>
	<body>
		<!-- ENCABEZADO DE LA PAGINA -->
		<header id="header" class="">
			<div class="title">
				<a href="<?php echo RUTA.'index.php' ?>" title="Inicio" class="title_a">Blog de Tecnologia</a>
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
			<div class="perfil">
				<p> <span class="icon-smile"></span> <?php echo $user['nom_user']; ?> <span class="icon-play3"></span></p>
				<div class="info">
					<a href="<?php echo RUTA.'php/perfil.php' ?>">Ver Perfil</a>
					<a href="./php/cerrar.php">Cerrar Sesion</a>
				</div>
			</div>
		</header>
		<!-- RESETEAR FLOAT -->
		<div class="clear"></div> 
		<div class="grid">
			<main>
				<article>
					<h1 class="title_p">LG en un niivel bajo?</h1>
					<p class="cat">Moviles</p><p class="sub_cat">LG</p><p class="date">01/02/2018</p><p class="autor">Lalo_Oficial</p>
					<section>
						<p>
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi quisquam nostrum iure rerum, mollitia eaque voluptas, quibusdam provident molestias officia commodi enim eius modi repellendus consequuntur temporibus, magnam pariatur minus?
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi quisquam nostrum iure rerum, mollitia eaque voluptas, quibusdam provident molestias officia commodi enim eius modi repellendus consequuntur temporibus, magnam pariatur minus?
						</p>
					</section>
					<img src="http://logok.org/wp-content/uploads/2014/06/LG-Logo-face-880x660.png" alt="">
					<div class="clear"></div>
					<a href="" title="Like" class="i_button_r">Like</a>
					<a href="" title="Ver mas" class="i_button_r">Ver mas</a>
					<div class="clear"></div>
				</article>
				<article>
					<h1 class="title_p">LG en un niivel bajo?</h1>
					<p class="cat">Moviles</p><p class="sub_cat">LG</p><p class="date">01/02/2018</p><p class="autor">Lalo_Oficial</p>
					<section>
						<p>
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi quisquam nostrum iure rerum, mollitia eaque voluptas, quibusdam provident molestias officia commodi enim eius modi repellendus consequuntur temporibus, magnam pariatur minus?
						</p>
					</section>
					<img src="http://logok.org/wp-content/uploads/2014/06/LG-Logo-face-880x660.png" alt="">
					<div class="clear"></div>
					<a href="" title="Like" class="i_button_r">Like</a>
					<a href="" title="Ver mas" class="i_button_r">Ver mas</a>
					<div class="clear"></div>
				</article>
			</main>
			<!-- LO MAS RECIENTE DE LAS NOTICIAS, PARTE DE LA DERECHA -->
			<aside>
				<article>
					<h1 class="title_as">lorem ipsum</h1>
					<section>
						<p>
							Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas sint sunt illo eaque voluptatum nemo repudiandae sequi laudantium, minus iste voluptatibus consequatur similique. Deserunt, eius laudantium perferendis dolore soluta aliquam!
						</p>
					</section>
					<a href="" title="Ver mas" class="i_button_r">Ver mas</a>
				</article>
				<article>
					<h1 class="title_as">lorem ipsum</h1>
					<section>
						<p>
							Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas sint sunt illo eaque voluptatum nemo repudiandae sequi laudantium, minus iste voluptatibus consequatur similique. Deserunt, eius laudantium perferendis dolore soluta aliquam!
						</p>
					</section>
					<a href="" title="Ver mas" class="i_button_r">Ver mas</a>
				</article>
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