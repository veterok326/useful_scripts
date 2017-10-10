<?php
function getWord($number, $suffix) {
	$keys = array(2, 0, 1, 1, 1, 2);
	$modern = $number%100;
	$suffix_key = ($modern &gt; 7 &amp;&amp; $modern &lt; 20) ?2:
	$keys[min($modern%10, 5)];
	return $suffix[$suffix_key];
}

$arraymin = array("минута", "минуты", "минут");
//создали массив для минут
$arrayhour = array("час", "часа", "часов");
//создали массив для часов
$datemin = date('i');
$datehour = date('H');
//создали переменные времени: часы и минуты раздельно, для удобства
$hour = getWord($datehour, $arrayhour);
$min = getWord($datemin, $arraymin);
//ну и, собственно, сам вывод
echo "".$datehour." ".$hour." ".$datemin." ".$min."";
//в результате получаем: 14 часов 16 минут