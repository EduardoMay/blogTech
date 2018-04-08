<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Inicio</title>
		<link rel="stylesheet" href="../assets/blog_styles.css">
		<link rel="stylesheet" href="../assets/index.css">
		<link rel="shortcut icon" href="../assets/images/usuario.png" type="image/x-icon">
	</head>
	<body>
		<!-- ENCABEZADO DE LA PAGINA -->
		<header id="header" class="">
			<div class="title">
				<a href="<?php echo RUTA.'index.php' ?>" title="Inicio" class="title_a">Blog de Tecnologia</a>
			</div>
			<div class=ingreso>
				<a href='../php/login.php' title='Ingresar'>Ingresar</a>
			</div>
		</header>
		<!-- RESETEAR FLOAT -->
		<div class="clear"></div> 
		<div class="grid">
            <h1>Recuperar Contraseña</h1>
		</div>
            <form action="<?= RUTA.'php/contra.php' ?>" method="post">
                <table class=margin-b>
                    <tr>
                        <td>Ingrese su correo que se haya registrado:</td>
                    </tr>
                    <tr class=newpost>
                        <td>
                            <input type="email" name="email" id="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="contra" id="" class=i_button_c>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php if (!empty($error)): ?>
    							<?php echo $error;  ?>
    						<?php endif; ?>
                        </td>
					</tr>
					<tr>
                        <td>
                            Ingrese Nueva Contraseña:
                        </td>
                    </tr>
					<tr class=newpost>
                        <td>
                            <input type="text" name="newcontra" id="">
                        </td>
                    </tr>
                </table>
            </form>
		<!-- PIE DE PAGINA -->
		<footer>
			<p>&copy; Todos los Derechos Reservados</p>
			<P>Editor: Eduardo May</P>
			<p>Cancun, Q. Roo. Mexico</p>
		</footer>
	</body>
</html>