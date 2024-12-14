<?php
	// Задание 1
	$str = 'aBcE fGHij';
	$reg_exp = '/[a-z]([a-z])[a-z]([a-z])[a-z]/i'; // Регулярное выражение соотвествует пяти символам латинского алфавита, при этом второй и четвертый символы
	// запоминаются отдельно
	
	// Формируется массив, где первым элементом будет массив со строками, сопоставившимися с рег. выражением в целом
	// А следующими элементами будут массивы для совпадений в выделенных в рег. выражении подстроках
	$result1 = preg_match_all($reg_exp, $str, $matches1, PREG_PATTERN_ORDER);
	
	// Формируется массив, состоящий из массивов, в каждом из которых первый элемент - строка, сопоставленная с рег. выражением в целом, а остальные
	// элементы - подстроки этой строки
	$result2 = preg_match_all($reg_exp, $str, $matches2, PREG_SET_ORDER);
	
	echo '<b>PATTERN ORDER: </b>';
	print_r($matches1);
	echo '<br><b>SET ORDER: </b>';
	print_r($matches2);
	
	// Задание 2
	$email_reg_exp = '/\w+[\.\-]*\w*@\w+\.\w{2,}/';
	$emails = array("email@example.com", "firstname.lastname@example.com", "plainaddress", "@example.com", "email.example.com");
	echo "<br><br><b>Проверяем адреса электронной почты</b>:<br>";
	foreach($emails as $email) {
		$isValid = (preg_match($email_reg_exp, $email) > 0) ? 'Валидный' : 'Невалидный';
		echo $email . " : " . $isValid . "<br>";
	}
	
	// Задание 3
	function change_date_format($date) {
		$reg_exp = '/(\d{4})-(\d{2})-(\d{2})/';
		$new_date = preg_replace($reg_exp, "$3.$2.$1", $date);
		return $new_date;
	}
	$date = '2022-03-05';
	echo "<br>" . $date . " преобразовано в " . change_date_format($date);
	
	// Задание 4
	function prepare_link_element($url) {
		$reg_exp = '/http:\/\/(www\.\w+\.\w{2,})[\/#\?]?.*/';
		$link_elem = preg_replace($reg_exp, "<a href=\"$url\" target=_blank>$1</a>", $url);
		return $link_elem;
	}
	$url = 'http://www.sfedu.ru/root/index.php';
	echo "<br><br>" . prepare_link_element($url);
	
	// Задание 5
	$str='<html> <head> <title>Test</title> </head> <body> <B>12345</B> <I>qwerty</i> <pre>jljl</pre> </body> </html>'; 
	preg_match('/<body>(.+)<\/body>/', $str, $matches);
	$body_content = $matches[1];
	$new_body_content = preg_replace(array('/<[a-zA-Z]+>/', '/<\/[a-zA-Z]+>/'), array('', "<br>"), $body_content);
	$new_str = preg_replace('/<body>.+<\/body>/', "<body>" . $new_body_content . "</body>", $str);
	echo "<br><br> До замены: " . htmlspecialchars($str);
	echo "<br> После замены: " . htmlspecialchars($new_str);
?>