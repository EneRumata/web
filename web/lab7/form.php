<html>
	<head>
		<title> Анкета </title>
		<script>
			function fixForm() {
				document.querySelector("#build").style.display = "block";
				document.querySelector("#show").style.display = "none";
			}
			function acceptForm() {
				document.querySelector("#show").style.display = "none";
				document.querySelector("#thanks").style.display = "block";
			}
		</script>
	</head>
	
	<body>
		<?php
			require("form_func.php");
			if ($isFirstTime) {
				$buildDisplay = "display: block;";
				$showDisplay = "display: none;";
			} else {
				$buildDisplay = "display: none;";
				$showDisplay = "display: block;";
			}
		?>
		
		<div id="build" style="<?=$buildDisplay?>">
			<?php echo buildForm(); ?>
		</div>
		
		<div id="show" style="<?=$showDisplay?>">
			<?php echo showForm(); ?>
			<form>
				<button type="button" onClick="fixForm()"> Исправить </button>
				<button type="button" onClick="acceptForm()"> Верно </button>
			</form>
		</div>
		
		<div id="thanks" style="display: none;">
			<p style="font-weight: bold;"> Спасибо за заполнение анкеты! </p>
		</div>
	</body>
</html>