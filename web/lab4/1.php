<html>
	<head>
		<title> Первая страница </title>
	</head>
	
	<?php
		session_start();
		if(isset($_SESSION['color'])) {
	?>
	<body bgcolor=<?=$_SESSION['color']?>>
		<h1> Это первая страница </h1>
		<a href="start.php"> Настройки цвета </a>
		<a href="2.php"> Вторая страница </a>
	</body>
	<?php
		} else {
	?>
	<body>
		<h1> Невозможно отобразить страницу, не выбран цвет </h1>
		<a href="start.php"> Выбрать цвет </a>
	</body>
	<?php
		}
	?>
</html>