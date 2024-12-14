<?php
	session_start();
	if(isset($_POST['color'])) {
		$_SESSION['color'] = $_POST['color'];
		header("Location: 1.php");
		exit();
	}
?>

<script>
	function checkForm(form) {
		for (let option of form["color"]) {
			if (option.checked) return true;
		}
		alert("Вы не выбрали цвет");
		return false;
	}
</script>

<?php
	$colors = array("blue", "green", "red", "violet");
	$content = <<<HERE_DOC
		<b> Выберите цвет фона </b>
		<form action="start.php" method="post" onsubmit="return checkForm(this)">
HERE_DOC;
	foreach($colors as $color) {
		$content .= "<p style=\"color: $color;\"> <input type=\"radio\" name=\"color\" value=\"$color\"";
			if(isset($_SESSION['color']) and $_SESSION['color'] == $color) {
				$content .= "checked";
				unset($_SESSION['color']);
			}
		$content .= "> <b> $color </b> </p>";
	}
	$content .= "<input type=\"submit\" value=\"Запомнить\"> </form>";
	echo $content;
?>