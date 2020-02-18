<?php

	require 'conecta.php';

	$message1 = '';
	$message2 = '';

	if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];

		$sql = "select * from users where email = '$email'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) != 0) {
			$row = mysqli_fetch_assoc($result);
			if (password_verify($pwd, $row['pwd'])) header('Location: http://127.0.0.1/index.html');
			else $message1 = 'La contraseña no es válida.';
		}
		else $message1 = 'El usuario no existe';
	}

	if (!empty($_POST['nombre']) && !empty($_POST['emaildos']) && !empty($_POST['pwddos'])) {
		$nombre = $_POST['nombre'];
		$email = $_POST['emaildos'];
		$pwd = password_hash($_POST['pwddos'], PASSWORD_DEFAULT);

		$sql = "insert into users (email, pwd, nombre) values ('$email', '$pwd', '$nombre')";

		$result = mysqli_query($conn, $sql);

		if ($result) $message2 = 'Register success';
		else $message2 = 'El usuario ya existe';
		
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>miercoles12</title>
	<style type="text/css">
		h1 {
			text-align: center;
		}

		input {
			width: 500px;
			display: block;
			margin: 20px auto;
			padding: 10px;
		}

		input.boton {
			width: 300px;
			border-radius: 20px;
			background: #3399ff;
			border: none;
			cursor: pointer;
		}

		input.boton:hover {
			background: #80bfff;
		}

	</style>
</head>
<body>
	<h1>Login</h1>
	<form method="post" action="miercoles12.php">
		<input type="email" name="email" placeholder="Escribe tu email" required>
		<input type="password" name="pwd" placeholder="Escribe tu contraseña" required>
		<input class = 'boton' type="submit" value="Entrar">

		<?php if (!empty($message1)):?>
			<p style="text-align: center; color: red"> <?= $message1 ?></p>
		<?php endif; ?>

	</form>

	<h1>Registry</h1>
	<form method="post" action="miercoles12.php">
		<input type="text" name="nombre" placeholder="Escribe tu nombre" required>
		<input type="email" name="emaildos" placeholder="Escribe tu email" required>
		<input type="password" name="pwddos" placeholder="Escribe tu contraseña" required>
		<input class = 'boton' type="submit" value="Registrarse">
		<?php if (!empty($message2)) : ?>
			<p style="text-align: center;"> <?= $message2 ?></p>
		<?php endif; ?>
	</form>

</body>
</html>
