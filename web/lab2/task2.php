<style>
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
	}
	th, td {
		padding: 5px;
	}
</style>

<?php
$arr5=array(0=>"http://www.yandex.com", 
	1=>"http://www.google.com",
	"2"=>"http://www.altavista.com"); 
$arr6=array(2=>"http://www.yandex.com", 
	4=>"http://www.google.com",
	1=>"http://www.altavista.com"); 

$table = <<<HERE_DOC
	<table>
		<tr>
			<th> Ключ </th>
			<th> Значение </th>
		</tr>
HERE_DOC;
foreach($arr5 as $key=>$val) {
	$table .= "<tr> <td> $key </td> <td> $val </td> </tr>";
}
$table .= "</table>";
echo "arr5:<br>", $table;

$table = <<<HERE_DOC
	<table>
		<tr>
			<th> Ключ </th>
			<th> Значение </th>
		</tr>
HERE_DOC;
foreach($arr6 as $key=>$val) {
	$table .= "<tr> <td> $key </td> <td> $val </td> </tr>";
}
$table .= "</table>";
echo "arr6:<br>", $table;

foreach($arr6 as $x) {
	echo $x, "<br>";
}

$my_arr = array();
$my_arr[1] = "Второй";
$my_arr[3] = "Четвертый";
$my_arr[2] = "Третий";
$my_arr[4] = "Пятый";
$my_arr[0] = "Первый";

// Выведем циклом for. Вывод элементов будет происходить в порядке их следования в массиве
echo "<b>Цикл for:</b><br>";
for($i=0; $i < count($my_arr); $i++) {
	echo $my_arr[$i], "<br>";
}

// Выведем циклом foreach. Вывод элементов будет происходить в порядке, в котором они были добавлены в массив
echo "<b>Цикл foreach:</b><br>";
foreach($my_arr as $val) {
	echo $val, "<br>";
}
?>