<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/blog_styles.css">
	<link rel="stylesheet" href="../assets/fonts.css">
    <title>Perfil</title>
</head>
<body>
    <!-- ENCABEZADO DE LA PAGINA -->
	<header id="header" class="">
		<div class="title">
			<a href="" title="Inicio" class="title_a">Blog de Tecnologia</a>
		</div>
		<menu type="context toolbar" class="menu">
            <li class=cat_menu style="line-height: 100px; color: white;">Tu Perfil</li>
		</menu>
		<div class="perfil">
			<a href="../php/cerrar.php" style="color: white;">Cerrar Sesion</a>
		</div>
    </header>
    <div class="clear"></div>
    <div class="margin"></div>
    <main class=content-main>
        <div class="content-item">
            <p>Tus Datos</p>
        </div>
        <form action="<?php echo RUTA.'php/perfil.php' ?>" method="post">
            <div class="content-item">
                <label for="">Nombre:</label><input type="text" value="<?php echo $nombre  ?>" name="nombre">
            </div>
            <div class="content-item">
                <label for="">Apellidos:</label><input type="text" value="<?php echo $ape ?>" name="ape">
            </div>
            <div class="content-item">
                <p>Al cambiar tu usuario se cerrara tu sesion</p>
                <label for="">Usuario:</label><input type="text" value="<?php  echo $userN ?>" name="user">
            </div>
            <div class="content-item">
                <label for="">Correo:</label><input type="text" value="<?php   echo $email ?>" name="email">
            </div>
            <div class="content-item">
                <p>Actualizar contraseña</p>
            </div>
            <div class="content-item">
                <label for="">Nueva Contraseña:</label><input type="text" name="pass">
            </div>
            <div class="content-item_button">
                <input type="submit" value="Guardar" class=i_button_c>
            </div>
        </form>
    </main>
    <div class="margin"></div>
</body>
</html>