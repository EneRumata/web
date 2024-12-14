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
	$current_element_name = '';
	$authors = array();
	$books = array();
	$prices = array();
	$rating_dict = array(1=>'Ужасно', 2=>'Плохо', 3=>'Так себе', 4=>'Хорошо', 5=>'Прекрасно');
	$ratings = array();
	
	function startElementHandler($parser, $name, $attribs) {
		global $current_element_name;
		$current_element_name = $name;
	}
	
	function endElementHandler($parser, $name) {
		global $current_element_name;
		$current_element_name = ''; //
	}
	
	function charDataHandler($parser, $data) {
		global $current_element_name, $authors, $books, $prices, $ratings;
		switch($current_element_name) {
			case "author":
				$authors[] = $data;
				break;
			case "title":
				if (count($authors) < count($books) + 1) { $books[count($books) - 1] .= $data; }
				else { $books[] = $data; }
				break;
			case "price":
				$prices[] = $data;
				break;
			case "rating":
				$ratings[] = $data;
				break;
		}
	}
	
	$parser = xml_parser_create();
	xml_set_element_handler($parser, 'startElementHandler', 'endElementHandler');
	xml_set_character_data_handler($parser, 'charDataHandler');
	xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, false);
	
	$filename = "library.xml";
	if(!$fp = fopen($filename, "r")) {
		die("Ошибка при открытии файла!");
	}
	
	while ($data = fread($fp, 4096)) {
		if (!xml_parse($parser, $data, feof($fp))) {
			$err_code = xml_get_error_code($parser);
			$err_str = xml_error_string($err_code);
			$err_line = xml_get_current_line_number($parser);
			$err_msg = sprintf("Ошибка %s в строке %d в файле %s", $err_str, $err_line, $filename);
			die($err_msg);
		}
	}
	
	xml_parser_free($parser);
	
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
	for($i=0; $i < count($books); $i++) {
		$table .= <<<HERE_DOC
			<tr>
				<td> <b> {$books[$i]} </b> </td>
				<td> {$authors[$i]} </td>
				<td> {$prices[$i]} руб. </td>
				<td> <i> {$rating_dict[$ratings[$i]]} </i> </td>
			</tr>
HERE_DOC;
	}
	$table .= "</table>";
	
	echo $table;
?>