<?php /** @noinspection ForgottenDebugOutputInspection */


$strings = [
    //Пример правильных выражений:
    '123456',
    '234567',
    //Пример неправильных выражений:
    '1234567',
    '12345'
];


echo 'PHP comparison' . PHP_EOL;
foreach ($strings as $string) {
    $isCorrect = ctype_digit($string);
    if ($isCorrect) {
        $number = (int)$string;
        $isCorrect = (($number >= 1e5) && ($number < 1e6));
    }
    var_export($isCorrect);
    echo PHP_EOL;
}

echo 'regex comparison' . PHP_EOL;
$regex = '#^[1-9]\d{5}$#';

foreach ($strings as $string) {
    echo preg_match($regex, $string) . PHP_EOL;
}
