<?php
	// Проверка, было ли заполнено текстовое поле формы для имени
	if( empty($_POST['firstname']) ) {	
?>
<!-- Если нет, то  на страницу выводится форма-->
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
	<input type="text" name="firstname" placeholder="Введите имя">
	<input type="submit">
</form>
<?php
	// В противном случае, на страницу выводится сообщение с приветствием, использующее введенное имя
	} else {
		echo "Здравствуйте, ", $_POST['firstname'], "!";
	}
?>