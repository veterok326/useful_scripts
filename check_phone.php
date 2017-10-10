<?php
//Проверка номера телефона на PHP
function check_phone(){
    preg_match_all("/\(?  (\d{3})?  \)?  (?(1)  [\-\s] ) \d{3}-\d{4}/x",
     "Call 555-1212 or 1-800-555-1212", $phones);
}

//Проверка номера телефона на PHP
function checkPhone($number)
{
    if(preg_match('^[0-9]{3}+-[0-9]{3}+-[0-9]{4}^', $number)){
        return $number;
    } else {
        $items = Array('/\ /', '/\+/', '/\-/', '/\./', '/\,/', '/\(/', '/\)/', '/[a-zA-Z]/');
        $clean = preg_replace($items, '', $number);
        return substr($clean, 0, 3).'-'.substr($clean, 3, 3).'-'.substr($clean, 6, 4);
    }
}