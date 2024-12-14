<?php
	mt_srand((double)microtime()*1000000);
	$numbers = array();
	for($i = 0; $i < 100; $i++) {
		$numbers[] = mt_rand(0, 9);
	}
	
	sort($numbers);
	
	$freq = array(1=>0, 2=>0, 3=>0, 4=>0, 5=>0);
	
	$min = 0;
	$max = 2;
	$interval = 1;
	foreach($numbers as $number) {
		if(!($number >= $min and $number < $max)) {
			$min += 2;
			$max += 2;
			$interval++;
		}
		$freq[$interval] += 1;
	}
	
	$w = array(1=>0, 2=>0, 3=>0, 4=>0, 5=>0);
	foreach($freq as $interval => $value) {
		$w[$interval] = $freq[$interval] / 2;
	}
	
	$image = imagecreatetruecolor(480, 340);
	imagefill($image, 0, 0, imagecolorallocate($image, 164, 164, 164));	// Меняем цвет фона
	$scale_coeff = 300 / max($w);
	$red = imagecolorallocate($image, 255, 0, 0);
	$blue = imagecolorallocate($image, 0, 0, 255);
	$green = imagecolorallocate($image, 0, 255, 0);
	$yellow = imagecolorallocate($image, 255, 255, 0);
	$cyan = imagecolorallocate($image, 0, 255, 255);
	$black = imagecolorallocate($image, 0, 0, 0);
	$colors = array($red, $blue, $green, $yellow, $cyan);
	
	$x1 = 40;
	$y1 = 0;
	$x2 = 120;
	for($i = 1; $i <= count($w); $i++) {
		$y2 = $w[$i] * $scale_coeff;
		imagefilledrectangle($image, $x1, $y1, $x2, $y2, $colors[$i - 1]);
		$x1 += 80;
		$x2 += 80;
	}
	imageflip($image, IMG_FLIP_VERTICAL);
	
	imagesetthickness($image, 10);
	imageline($image, 0, 0, 480, 0, $black);
	imageline($image, 0, 0, 0, 340, $black);
	imagettftext($image, 14, 0, 420, 25, $red, "C:\Games\OSPanel\domains\lab6\arial.ttf", "Ось Y");
	imagettftext($image, 14, 270, 10, 280, $red, "C:\Games\OSPanel\domains\lab6\arial.ttf", "Ось X");

	header("Content-type: image/gif");
	imagegif($image);
	//imagegif($image,"fff.gif");
?>