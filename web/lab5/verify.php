<?php
$psw = file("psw.txt");
$kk = false;
foreach ($psw as $str){ 
	$t1 = explode(" ", $str);
	if ($t1[0] == $_POST['username']) {
		if(password_verify($_POST['password'], $t1[1])) {
			$k = true;
			break;
		}
	}
}
if($kk){ // если пароль введён верно
    setcookie("username", "good");
    echo "<div>Добро пожаловать, ".$_POST['username']."</div>";
    echo "<a href='protected.php'>К личной информации</a>";
} else{ // если неверно
    echo "<div>Неправильное имя или пароль</div>";
    echo "<a href='register.htm'>Назад</a>";
}