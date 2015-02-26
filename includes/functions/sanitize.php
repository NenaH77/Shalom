<?php

require_once '../includes/core/init.php';
function escape($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

//1keydata.com
/*
The htmlentities function in PHP is used to convert characters into corresponding HTML entities where applicable. It is used to encode user input on a website so that users cannot insert harmful HTML codes into a site.

The syntax of the htmlentities function is:

htmlentities ('string', [quote_style], [character_set])
*/