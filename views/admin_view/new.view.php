<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Inicio</title>
		<link rel="stylesheet" href="../css/blog_styles.css">
		<!-- <link rel="stylesheet" href="../css/admin.css"> -->
		<link rel="shortcut icon" href="../images/usuario.png" type="image/x-icon">
	</head>
	<body>
		<!-- ENCABEZADO DE LA PAGINA -->
		<header id="header" class="">
			<div class="title">
				<a href="" title="Inicio" class="title_a">Blog de Tecnologia</a>
			</div>
			<menu type="context toolbar" class="menu">
				<li class="cat_menu"><a href="../index.html" class="menu_a">Inicio</a>
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
				<div class="ingreso">
				<a href="login.html" title="Ingresar">Ingresar</a>
				<a href="register.html" title="Registrate">Registrate</a>
			</div>
		</header>
		<!-- RESETEAR FLOAT -->
		<div class="clear"></div>

		<!-- CREAR MARGINT TOP -->
		<!-- <div class="margin"></div> -->

		<!-- SELECCION -->
		<div class="margin"></div>
		<main class="grid">
			<form action="" method="post">
				<table>
					<caption>Nueva Pulicacion</caption>
					<thead>
						<tr>
							<th>
								<a href="./admin.html">Volver</a>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Categoria:</td>
							<td>
								<select name="cat" id="cat">
									<option value="">Selecciona</option>
									<option value="Moviles">Moviles</option>
									<option value="Apps y Software">Apps y Software</option>
									<option value="Juegos">Juegos</option>
									<option value="Motor">Motor</option>
									<option value="Portatiles">Computadoras</option>
									<option value="Televisores">Televisores</option>
									<option value="Gadgets">Gadgets</option>
									<option value="Realidad Virtual">Realidad Virtual</option>
									<option value="Audio">Audio</option>
									<option value="Camaras">Camaras</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Titulo:</td>
							<td>
								<input type="text">
							</td>
						</tr>
						<tr>
							<td>Publicacion:</td>
							<td>
								<textarea name="" id="" cols="30" rows="10"></textarea>
							</td>
						</tr>
						<tr>
							<td>Fecha de Publicacion</td>
							<td>
								<input type="date" name="" id="">
							</td>
						</tr>
						<tr>
							<td>Comentarios</td>
							<td>
								<select name="" id="">
									<option value="">1</option>
									<option value="">2</option>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" value="Publicar">
							</td>
						</tr>
					</tbody>
				</table>
			</form>
			<!-- <form action="new_blog.php" method="POST">
				<div>
				</div>
				<div>
					<label for="cat">Categorias</label>
					<select name="cat" id="cat">
						<option value="">Selecciona</option>
						<option value="Moviles">Moviles</option>
						<option value="Apps y Software">Apps y Software</option>
						<option value="Juegos">Juegos</option>
						<option value="Motor">Motor</option>
						<option value="Portatiles">Computadoras</option>
						<option value="Televisores">Televisores</option>
						<option value="Gadgets">Gadgets</option>
						<option value="Realidad Virtual">Realidad Virtual</option>
						<option value="Audio">Audio</option>
						<option value="Camaras">Camaras</option>
					</select>
				</div>
				<div>
					<label for="title">Titulo del Post<input type="text" name="title" id=""></label>
				</div>
				<div>
					<label for="">Publicacion</label><textarea name="post" id=""></textarea>
				</div>
				<div>
					<label for="com">Comentarios</label>
					<select name="com" id="">
						<option value="">Selecciona</option>
						<option value="Activado">Activado</option>
						<option value="Desactivado">Desactivado</option>
					</select>
				</div>
				<div>
					<label for="fecha">Fecha:<input type="date" name="fecha" id=""></label>
				</div>
				<div>
					<input type="submit" value="Publicar">
				</div>
			</form> -->
		</main>
		<!-- PIE DE PAGINA -->
		<!-- <footer>
			<p>Todos los Derechos Reservados</p>
			<P>Editor: Eduardo May</P>
			<p>Cancun, Q. Roo. Mexico</p>
		</footer> -->
	</body>
</html>