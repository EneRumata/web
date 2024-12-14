<?php
$searchEngines=array("http://www.yandex.com", 
	"http://www.google.com",
	"http://www.altavista.com"); 
$phpDocs= array("http://www.php.com",
	"http://www.rusdoc.ru");
$usefulSites=array($searchEngines, $phpDocs);

foreach($usefulSites as $arr) {
	foreach($arr as $site) {
		echo $site, "<br>";
	}
}
?>