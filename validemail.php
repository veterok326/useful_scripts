<?php
//Проверка Email на привильность на PHP
function emailValid($string){ 
    if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $string)) 
    return true; 
}