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
	$rating_dict = array(1=>'Ужасно', 2=>'Плохо', 3=>'Так себе', 4=>'Хорошо', 5=>'Прекрасно');
	
	if (!$doc = simplexml_load_file('library.xml')) {
		die("Ошибка при открытии файла!");
	}
	
	$table = <<<HERE_DOC
		<table>
			<tr>
				<th colspan=4> Библиотека </th>
			</tr>
			<tr>
				<th> Название </th>
				<th> Автор </th>
				<th> Цена </th>
				<th> Рейтинг читателей </th>
			</tr>
HERE_DOC;
	foreach($doc->book as $book){
		$table .= <<<HERE_DOC
			<tr>
				<td> <b> {$book->title} </b> </td>
				<td> {$book->author} </td>
				<td> {$book->price} руб. </td>
				<td> <i> {$rating_dict[intval($book->rating)]} </i> </td>
			</tr>
HERE_DOC;
	}
	$table .= "</table>";
	
	echo $table;
	
	// Задание 2
	
	$xmlstr ='<library>
            </library>';
	
	$xmldoc = simplexml_load_string($xmlstr);
	$book = $xmldoc->addChild('book');
	$book->addAttribute('price', '300 руб.');
	$book->addChild('author', 'Р. А. Уайк');
	$book->addChild('title', 'PHP. Справочник');
	
	$xmldoc->asXML('task2.xml');
?>