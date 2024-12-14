<?php
	$username = $_POST["username"];
	$input_password = $_POST["password"];
	
	$psw = file("psw.txt");

	foreach($psw as $str) {
		$user_data = explode(" ", $str);
		if($username == $user_data[0]) {
			$password_hash = trim($user_data[1]);
			break;
		}
	}
	
	if(isset($password_hash)) {
		if(password_verify($input_password, $password_hash)) {
			setCookie("user", "authorized");
?>

<p style="font-weight: bold;"> Добро пожаловать, <?=$username?>! </p>
<a href="protected.php"> Защищенная страница </a>
 
<?php
		} else {
?>

<p style="font-weight: bold;"> Неправильный пароль </p>
<a href="register.htm"> Назад </a>

<?php
		}
	} else {
?>

<p style="font-weight: bold;"> Имя пользователя не найдено </p>
<a href="register.htm"> Назад </a>

<?php
	}
?>