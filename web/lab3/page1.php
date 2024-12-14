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
	<form action="page2.php" method="post">
		<table>
			<tr>
				<th colspan=2> КАТАЛОГ ПРОГРАММНЫХ ПРОДУКТОВ <br> Страница 1/2 </th>
			</tr>
			<tr>
				<td> <b> Купить </b> </td>
				<td> <b> Продукт </b> </td>
			</tr>
			<tr>
				<td> <input type=checkbox name="bads[]" value="MS Office"> </td>
				<td> MS Office </td>
			</tr>
			<tr>
				<td> <input type=checkbox name="bads[]" value="Corel Draw"> </td>
				<td> Corel Draw </td>
			</tr>
			<tr>
				<td colspan=2> <input type="submit"> </td>
			</tr>
		</table>
	</form>
HERE_DOC;

echo $content;
?>