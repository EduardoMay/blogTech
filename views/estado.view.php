<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Inicio</title>
		<link rel="stylesheet" href="../css/blog_styles.css">
		<link rel="stylesheet" href="../css/index.css">
		<link rel="shortcut icon" href="images/usuario.png" type="image/x-icon">
	</head>
	<body>
		<!-- ENCABEZADO DE LA PAGINA -->
		<header id="header" class="">
			<div class="title">
				<a href="" title="Inicio" class="title_a">Blog de Tecnologia</a>
			</div>
		</header>
		<!-- RESETEAR FLOAT -->
		<div class="clear"></div> 
		<div class="grid">
            <h1>
            <?php if (!empty($estado)): ?>
				<?php echo $estado;  ?>
            <?php endif; ?>
            </h1>
		</div>
		<!-- PIE DE PAGINA -->
		<footer>
			<p>&copy; Todos los Derechos Reservados</p>
			<P>Editor: Eduardo May</P>
			<p>Cancun, Q. Roo. Mexico</p>
		</footer>
	</body>
</html>