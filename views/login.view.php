<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="stylesheet" href="../assets/blog_styles.css">
		<link rel="stylesheet" href="../assets/login.css">
		<link rel="shortcut icon" href="../assets/images/usuario.png">
		<title>Login</title>
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
				<form action="../php/login.php" method="POST">
					<div class="data">
						<label for="">Usuario:</label><input type="text" name="user" placeholder="Usuario">
					</div>
					<div class="data">
						<label for="">Contraseña:</label><input type="password" name="pass" placeholder="Contraseña">
					</div>
					<div>
						<?php if (!empty($error)): ?>
							<?php echo $error;  ?>
						<?php endif; ?>
					</div>
					<input class="i_button_c" type="submit" name="" value="Ingresar">
					<a href="php/registro.php" title="" class="register">Registrate</a>
				</form>
			</div>
		</div>
	</body>
</html>