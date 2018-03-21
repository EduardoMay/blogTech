<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Login</title>
		<link rel="shortcut icon" href="../assets/images/usuario.png">
		<link rel="stylesheet" href="../assets/blog_styles.css">
		<link rel="stylesheet" href="../assets/register.css">
	</head>
	<body>
		<div class="izq center">
			<p>
				<span class="p_title">Tecnología</span>
				<span class="line"></span>
			<br>
				<span class="p_subtitle">Login</span>
			</p>
		</div>
		<div class="der">
			<div class="margin_top"></div>
			<div class="div_center">
				<img src="../assets/images/usuario.svg" alt="">
				<form action="registro.php" method="POST">
					<div class="data">
						<input type="text" name="nom" placeholder="Nombre" required>
					</div>
					<div class="data">
						<input type="text" name="ape" placeholder="Apellidos" required>
					</div>
					<div class="data">
						<input type="text" name="user" placeholder="Usuario" required>
					</div>
					<div class="data">
						<input type="email" name="email" placeholder="Correo" required>
					</div>
					<div class="data">
						<input type="password" name="pass" placeholder="Contraseña" required>
					</div>
					<div>
						<?php if (!empty($error)): ?>
							<?php echo $error;  ?>
						<?php endif; ?>
					</div>
					<input class="i_button_c" type="submit" name="" value="Registrarme">
					<a href="../login.html" title="" class="register">Inicar Sesion</a>
				</form>
			</div>
		</div>
	</body>
</html>