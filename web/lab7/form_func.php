<?php
	$firstName = '';
	$middleName = '';
	$lastName = '';
	$genders = array('Мужчина'=>'', 'Женщина'=>'');
	$programmingLanguages = array('Си'=>'', 'Паскаль'=>'', 'PHP'=>'');
	$positionsForWork = array("Программист"=>'', "Систем. администратор"=>'', "Постановщик задач"=>'', "Руководитель группы"=>'');
	if(!$isFirstTime = !(count($_POST) > 0)) {
		extract($_POST);
		if(isset($_POST['gender'])) { $genders[$gender] = 'checked'; }
		if(isset($_POST['languages'])) {
			foreach($languages as $language)
			$programmingLanguages[$language] = 'checked';
		}
		if(isset($_POST['positions'])) {
			foreach($positions as $position)
			$positionsForWork[$position] = 'selected';
		}
	}
	
	function buildForm() {
		global $firstName, $middleName, $lastName, $genders, $programmingLanguages, $positionsForWork;
		
		$full_name_form = <<<HERE_DOC
			<p> <b> Основная информация: </b> </p>
			<form action="{$_SERVER['PHP_SELF']}" method='post'">
				<p> <input type="text" name="lastName" placeholder="Фамилия" value="{$lastName}"> </p>
				<p> <input type"text" name="firstName" placeholder="Имя" value="{$firstName}"> </p>
				<p> <input type="text" name="middleName" placeholder="Отчество" value="{$middleName}"> </p>
HERE_DOC;

		$genders_form = "<p> <b> Ваш пол: </b> </p>";
		foreach($genders as $gender => $isChecked) {
			$genders_form .= <<<HERE_DOC
				<p> <input type="radio" name="gender" value="{$gender}" {$isChecked}>
				<label for="${gender}"> {$gender} </label> </p>
HERE_DOC;
		}
		
		$languages_form = "<p> <b> Программирую на: </b> </p>";
		foreach($programmingLanguages as $language=>$isChecked) {
			$languages_form .= <<<HERE_DOC
				<p> <input type="checkbox" name="languages[]" value="{$language}" {$isChecked}>
				<label for="${language}"> {$language} </label> </p>
HERE_DOC;
		}
		
		$positions_form = "<p> <b> Могу работать как: </b> </p>";
		$positions_form .= "<select name='positions[]' multiple style='display: block;'>";
		foreach($positionsForWork as $position => $isSelected) {
			$positions_form .= <<<HERE_DOC
				<option value="${position}" {$isSelected}> {$position} </option>
HERE_DOC;
		}
		$positions_form .= "</select>";
		
		$form_end = <<<HERE_DOC
				<br> <button type="submit"> Отослать </button>
			</form>
HERE_DOC;
		$form = $full_name_form . $genders_form . $languages_form . $positions_form . $form_end;
		return $form;
	}
	
	function showForm() {
		global $firstName, $middleName, $lastName, $gender, $languages, $positions;
		$information = <<<HERE_DOC
			<p> <b> Фамилия: </b> {$lastName} </p>
			<p> <b> Имя: </b> {$firstName} </p>
			<p> <b> Отчество: </b> {$middleName} </p>
			<p> <b> Пол: </b> {$gender} </p>
			<p> <b> Языки программирования:</b>
HERE_DOC;
		foreach($languages as $language) {
			$information .= (' ' . $language);
		}
		$information .= "</p>";
		$information .= "<p> <b> Могу работать как:</b>";
		foreach($positions as $position) {
			$information .= (' ' . $position);
		}
		return $information;
	}
?>