<?php
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hash = password_hash($password, PASSWORD_DEFAULT );

    $data = $username . " " . $hash . "\n";
	
	
    if($file = fopen("psw.txt", "a+")) {
        if(fwrite($file, $data)) {
?>
 <p style="font-weight: bold;"> Пользователь <?=$username?> добавлен в базу! </p>

 <?php
        } else {
 ?>           
    
<p style="font-weight: bold;"> Ошибка при добавлении! </p>

<?php
        }
        fclose($file);
    } else {
?>

<p style="font-weight: bold;"> Невозможно получить доступ к файлу! </p>

<?php
    }
?>

<a href="admin.htm"> Назад </a> 