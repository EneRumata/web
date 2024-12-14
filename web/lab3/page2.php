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
$content = <<<HERE_DOC
	<form action="page3.php" method="post">
		<table>
			<tr>
				<th colspan=2> КАТАЛОГ ПРОГРАММНЫХ ПРОДУКТОВ <br> Страница 2/2 </th>
			</tr>
			<tr>
				<td> <b> Купить </b> </td>
				<td> <b> Продукт </b> </td>
			</tr>
			<tr>
				<td> <input type=checkbox name="bads[]" value="3D Studio Max"> </td>
				<td> 3D Studio Max </td>
			</tr>
			<tr>
				<td> <input type=checkbox name="bads[]" value="AutoCAD"> </td>
				<td> AutoCAD </td>
			</tr>
			<tr>
				<td colspan=2> <input type="submit"> </td>
			</tr>
		</table>
HERE_DOC;

$content_end = <<<HERE_DOC
	</form>
HERE_DOC;

if (isset($_POST['bads'])) {
	foreach($_POST['bads'] as $bad) {
		$content .= "<input type=hidden name=\"bads[]\" value=\"$bad\">";
	}
}

$content .= $content_end;

echo $content;
?>