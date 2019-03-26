<?php

/**
 * @param $string
 *
 * @return bool
 */
function isGUID($string)
{
    $answer = true;
    $lengths = [8, 4, 4, 4, 12];
    if ((($string[0] === '{') && substr($string, -1) !== '}')
        || (($string[0] !== '{') && substr($string, -1) === '}')) {
        $answer = false;
        //echo 'brackets';
    }

    $string = trim($string, '{}');
    $string = explode('-', $string);
    foreach ($string as $key => $hex) {
        if ((!ctype_xdigit($hex)) || (strlen($hex) !== $lengths[$key])) {
            $answer = false;
        }
    }
    return $answer;
}
