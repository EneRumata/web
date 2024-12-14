<?php
	session_start();
	if(!isset($_SESSION['color'])) {
		header('Location: start.php');
	}
?>

<html>
	<head>
		<title> Вторая страница </title>
	</head>
	
	<body bgcolor=<?=$_SESSION['color']?>>
		<h1> Это вторая страница </h1>
		<a href="1.php"> Первая страница </a>
	</body>
</html>