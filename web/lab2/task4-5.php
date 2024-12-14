<?php
$arr7["yandex"]="http://www.yandex.com"; 
$arr7["google"]="http://www.google.com";
$arr7["altavista"]="http://www.altavista.com"; 

while($x = each($arr7)) {
	print_r($x);
	echo "<br>";
}

reset($arr7);

while(list($key,$value)=each($arr7)) {
	echo $key, " ", $value, "<br>";
}
