<?php

$passwords = [
    //Пример правильных выражений:
    'C00l_Pass',
    'SupperPas1',
    //Пример неправильных выражений:
    'Cool_pass',
    'C00l'
];

echo 'regex comparison' . PHP_EOL;
$regex = '#^(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).{8,}$#';

foreach ($passwords as $password) {
    echo preg_match($regex, $password) . PHP_EOL;
}
