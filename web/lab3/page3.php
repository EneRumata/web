<style>
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
		text-align: center;
	}
	th, td {
		padding: 5px;
	}
</style>

<?php
if(isset($_POST['bads'])) {
	$content = <<<HERE_DOC
		<table>
			<tr>
				<th colspan=2> Выбраны программные продукты </th>
			</tr>
HERE_DOC;
	for($i=0; $i < count($_POST['bads']); $i++) {
		$number = $i + 1;
		$value = $_POST['bads'][$i];
		$content .= "<tr> <td> $number </td> <td> $value </td> </tr>";
	}
	$content .= "</table>";
} else {
	$content = "Ничего не выбрано";
}

echo $content;
?>