<?php
/** @noinspection ForgottenDebugOutputInspection */


$dates = [
    //Пример правильных выражений:
    '29/02/2000',
    '30/04/2003',
    '01/01/2003',
    //Пример неправильных выражений:
    '29/02/2001',
    '30-04-2003',
    '1/1/1899'
];


echo 'PHP comparison' . PHP_EOL;
foreach ($dates as $date) {
    $correctDate = false;
    $dateLengths = [2, 2, 4];
    $dateMax = [31, 12, 9999];
    $date = explode('/', $date);
    if (count($date) === 3) {
        $correctDate = true;
        foreach ($date as $key => $part) {
            if (strlen($part) !== $dateLengths[$key]) {
                $correctDate = false;
            } elseif (!ctype_digit($part)) {
                $correctDate = false;
            }
        }
    }
    if ($correctDate) {
        if ((int)$date[2] < 1600) {
            $correctDate = false;
        }
        if (!checkdate((int)$date[1], (int)$date[0], (int)$date[2])) {
            $correctDate = false;
        }
    }

    var_export($correctDate);
    echo PHP_EOL;
}

echo 'regex comparison' . PHP_EOL;
$regex = '#^'
    . '(([0-2][0-9]|30)/(0[469]|11)/(1[6-9]|[2-9][0-9])[0-9][0-9])|' //30-дневные месяцы
    . '(([0-2][0-9]|30|31)/(0[13578]|1[02])/(1[6-9]|[2-9][0-9])[0-9][0-9])|' //31-дневные месяцы
    . '(([0-1][0-9]|2[0-8])/02/(1[6-9]|[2-9][0-9])[0-9][0-9])|' //28 дней февраля
    . '(29/02/(1[6-9]|[2-9][0-9])(04|08|[2468][048]|[13579][26]))|' //29е февраля в високосный год.
    . '(29/02/(16|[2468][048]|[3579][26])00)' //поправка на григорианский календарь
    .'$#';
//https://stackoverflow.com/questions/8647893/regular-expression-leap-years-and-more#
//https://en.wikipedia.org/wiki/Leap_year#Gregorian_calendar

foreach ($dates as $date) {
    echo preg_match($regex, $date) . PHP_EOL;
}
