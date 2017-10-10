<?php
//Сохраняем файл
function Save_File($file, $content)
{
    return (file_put_contents($file, stripslashes($content)));
}

function strtoSafe(){
	 $result = stripslashes($result); // удаляем слэши
	 $result = str_replace('#39;', '', $result); // удаляем одинарные кавычки
	 $result = str_replace('"', '', $result); // удаляем двойные кавычки
	 $result = str_replace('&amp;', '', $result); // удаляем амперсанд
	 $result = preg_replace('/([?!:^~|@№$–=+*&amp;%.,;\[\]&lt;&gt;()_—«»#\/]+)/', '', $result); // удаляем недоспустимые символы
	 $result = trim($result); // удаляем пробелы по бокам
	 $result = preg_replace('/ +/', '-', $result); // пробелы заменяем на минусы
	 $result = preg_replace('/-+/', '-', $result); // удаляем лишние минусы
	 $result = preg_replace('/([-]*)(.+)([-]*)/', '\\2', $result); // удаляем лишние минусы
}