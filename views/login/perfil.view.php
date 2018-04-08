<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?= RUTA.'assets/avatars/'.$avatar['avatar'] ?>" type="image/x-icon">
    <link rel="stylesheet" href="../assets/blog_styles.css">
	<link rel="stylesheet" href="../assets/fonts.css">
    <title>Perfil</title>
    <style>
        /* FLOAT LEFT */
    .float{
        display: inline-block;
        witdh: 0;
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
            <li class=cat_menu style="line-height: 100px; color: white;">Tu Perfil</li>
		</menu>
		<div class="perfil">
			<a href="<?= RUTA.'php/cerrar.php' ?>" style="color: white;">Cerrar Sesion</a>
		</div>
    </header>
    <div class="clear"></div>
    <div class="margin"></div>
    <main class=content-main>
        <div class="content-item">
            <p>Tus Datos</p>
        </div>
        <form action="<?php echo RUTA.'php/perfil.php' ?>" method="post" enctype="multipart/form-data">
            <div class="content-item">
                <img src="<?= RUTA.'assets/avatars/'.$avatar['avatar'] ?>" alt="">
            </div>
            <div class="content-item">
                <p>Rango: <span class=rango><?php 
                    switch ($rango) {
                        case '1':
                            echo 'Miembro<span class="icon-star-empty gold"></span>';
                            break;
                        case '2':
                            echo 'Moderador<span class="icon-star-empty gold"></span><span class="icon-star-empty gold"></span>';
                            break;
                        case '3':
                            echo 'Administrador<span class="icon-star-empty gold"></span><span class="icon-star-empty gold"></span><span class="icon-star-empty gold"></span>';
                            break;
                        default:
                    }
                ?></p></span>
            </div>
            <div class="clear"></div>
            <div class="content-item">
                <label for="">Nombre:</label><input type="text" value="<?php echo $nombre  ?>" name="nombre" class=ani>
            </div>
            <div class="content-item">
                <label for="">Apellidos:</label><input type="text" value="<?php echo $ape ?>" name="ape" class=ani>
            </div>
            <div class="content-item">
                <label for="">Correo:</label><input type="text" value="<?php   echo $email ?>" name="email" class=ani>
            </div>
            <div class="content-item">
                <label for="">Usuario:</label><input type="text" value="<?php  echo $userN ?>" name="user" class=ani>
            </div>
            <div class="content-item">
                <label for="">Nueva Contraseña:</label><input type="text" name="pass" class=ani>
            </div>
            <div class="content-item_button">
                <input type="submit" value="Guardar Datos" class=i_button_c name=datos>
            </div>
            <div class="content-item">
                <b>Subir una imagen menor a 2Mb</b>
            </div>
            <div class="content-item">
                <label for="">Subir Avatar:</label><input type="file" name="imagen"> <input type="submit" value="Guardar Imagen" class="i_button_c float" name=avatar>
            </div>
            <div class="clear"></div>
            <div class="content-item">
                <?php if (!empty($error)): ?>
			    	<?php echo $error;  ?>
			    <?php endif; ?>
            </div>
        </form>
    </main>
    <div class="margin"></div>
</body>
</html>