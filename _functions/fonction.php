<?php

function str_secur($string, $trim = true, $strip_tags = true, $htmlspecialchars = true) {
    if ($trim) {
        $string = trim($string);
    }
    if ($strip_tags) {
        $string = strip_tags($string);
    }
    if ($htmlspecialchars) {
        $string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
    return $string;
}

function secure_password($mot_de_passe) {
    return $mot_de_passe;
}

function debug($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}


function is_valid_phone_number($number) {
    return preg_match('/^[0-9]{10}$/', $number);
}