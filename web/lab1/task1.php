<?php
$lab_num = 1;

//Khamadov 3.7
// В случае here_doc содержание формируемой строки будет анализироваться интерпретатором, поэтому внутри нее возможно обращение к значениям
// объявленных ранее переменных

$doc_cont = <<<HERE_NAME
	<div style="text-align: center; font-weight: bold;"> Лабораторная работа $lab_num </div>
HERE_NAME;

// В  случае now-doc содержание формируемой строки анализироваться не будет, поэтому обращение к значениям объявленных ранее переменных
// в ней невозможно.
/*
$doc_cont = <<<'NOW_NAME'
	<div style="text-align: center; font-weight: bold;"> Лабораторная работа $lab_num </div>
NOW_NAME;
*/
echo $doc_cont;
print("Используется версия PHP " . PHP_VERSION);
phpinfo();
?>