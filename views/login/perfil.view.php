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
    <div class="content-perfil">
        <h1>Bienvenido <?= $nombre ?></h1>
    </div>
    <main class=content-main>
        <div class="content-perfil-item">
                <div class="c-p-titulo">
                    <h1>Calificacion de comentarios</h1>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Numero</td>
                            <td>Nombre</td>
                            <td>Total</td>
                            <td>Insignea</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $cont = 0;
                        foreach ($allRangos as $rango) {
                            $cont++;
                            $perfil = getPerfil($rango['id_per'], $conexion);
                            if ($cont == 1) {
                                echo '<tr>';
                                echo '<td>'.$cont.'</td>';
                                echo '<td>'.$perfil['nom_per'].'</td>';
                                echo '<td>'.$rango['rango'].'</td>';
                                echo '<td><img src="../assets/images/oro.svg" alt=""></td>';
                                echo '</tr>';
                            } elseif ($cont == 2) {
                                echo '<tr>';
                                echo '<td>'.$cont.'</td>';
                                echo '<td>'.$perfil['nom_per'].'</td>';
                                echo '<td>'.$rango['rango'].'</td>';
                                echo '<td><img src="../assets/images/plata.svg" alt=""></td>';
                                echo '</tr>';
                            } elseif ($cont == 3) {
                                echo '<tr>';
                                echo '<td>'.$cont.'</td>';
                                echo '<td>'.$perfil['nom_per'].'</td>';
                                echo '<td>'.$rango['rango'].'</td>';
                                echo '<td><img src="../assets/images/bronce.svg" alt=""></td>';
                                echo '</tr>';
                            } else {
                                echo '<tr>';
                                echo '<td>'.$cont.'</td>';
                                echo '<td>'.$perfil['nom_per'].'</td>';
                                echo '<td>'.$rango['rango'].'</td>';
                                echo '<td>Sin Clasificar</td>';
                                echo '</tr>';
                            }
                        }
                    
                        $perfil = getPerfil($rangoPerfil['id_per'], $conexion);

                    ?>
                    </tbody>
                </table>
            </div>
            <form action="<?php echo RUTA.'php/perfil.php' ?>" method="post" enctype="multipart/form-data">
                <div class="content-item">
                    <p>Tus Datos</p>
                </div>
                <div class="content-item">
                    <img src="<?= RUTA.'assets/avatars/'.$avatar['avatar'] ?>" alt="">
                    <!-- <img src="../assets/images/moderador.svg" alt=""> -->
                </div>
                <div class="content-item">
                    <p>Rango: <span class=rango><?php 
                        switch ($usuario['tipo_user']) {
                            case '1':
                                echo 'Miembro<div><img src="../assets/images/miembro.svg" alt=""></div>';
                                break;
                            case '2':
                                echo 'Moderador<img src="../assets/images/moderador.svg" alt="">';
                                break;
                            case '3':
                                echo 'Administrador<div><img src="../assets/images/admin.svg" alt=""></div>';
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
                    <b>Subir una imagen menor a 4Mb</b>
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