<?php
$arr1 = array();
$arr2= array("http://www.yandex.com", 
	"http://www.google.com",
	"http://www.altavista.com"); 
$arr3=array("yandex"=>"http://www.yandex.com", 
	"google"=>"http://www.google.com",
	"bing"=>"http://www.altavista.com");

echo "<b> Длины массивов: </b> <br>";
echo '$arr1 = array(), длина = ', count($arr1), "<br>",
	'$arr2= array("http://www.yandex.com", "http://www.google.com", "http://www.altavista.com"), длина = ', count($arr2), "<br>",
	'$arr3=array("yandex"=>"http://www.yandex.com", "google"=>"http://www.google.com", "bing"=>"http://www.altavista.com"), длина = ', count($arr3), "<br>";

echo "<b>Перебор элементов<br>arr2:</b><br>";
$keys = array_keys($arr2);
$values = array_values($arr2);
for($i=0; $i < count($arr2); $i++) {
	echo "Ключ = ", $keys[$i], ", значение = ", $values[$i], "<br>";
}
echo "<b>arr3:</b><br>";
$keys = array_keys($arr3);
$values = array_values($arr3);
for($i=0; $i < count($arr3); $i++) {
	echo "Ключ = ", $keys[$i], ", значение = ", $values[$i], "<br>";
}

// Print_r - Вывод общей информации о переменной. Для массивов выводятся значения ключей и значения элементов
echo "<b>print_r:</b><br>";
print_r($arr1);
echo "<br>";
print_r($arr2);
echo "<br>";
print_r($arr3);
echo "<br>";

// Var_dump - Вывод структурированной информации о переменной. Для массива это буду ключи, тип и значения его элементов
echo "<b>var_dump:</b><br>";
var_dump($arr1);
echo "<br>";
var_dump($arr2);
echo "<br>";
var_dump($arr3);
echo "<br>";

$arr4 = array(1,"asd",array(2,3));
echo "<b>Массив arr4, print_r и var_dump:</b><br>";
print_r($arr4);
echo "<br>";
var_dump($arr4);
echo "<br>";

$a = 5;
echo "<b>Целочисленная переменная (a=5), print_r и var_dump:</b><br>";
print_r($a);
echo "<br>";
var_dump($a);
?>