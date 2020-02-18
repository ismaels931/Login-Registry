<?php
	$servername = 'localhost';
	$username = 'root';
	$pwd = '15m431 54n';
	$dbname = 'Usuarios';

	$conn = mysqli_connect($servername, $username, $pwd, $dbname);

	if (!$conn) die('Connection failed: '.mysqli_connect_error());
?>
