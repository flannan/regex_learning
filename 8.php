<?php /** @noinspection ForgottenDebugOutputInspection */


$ips = [
    //Пример правильных выражений:
    '127.0.0.1',
    '255.255.255.0',
    '192.168.0.1',
    //Пример неправильных выражений:
    '1300.6.7.8',
    'abc.def.gha.bcd',
    '254.hzf.bar.10'
];


echo 'PHP comparison' . PHP_EOL;
foreach ($ips as $ip) {
    $isCorrect = false;
    $ip = explode('.', $ip);
    if (count($ip) === 4) {
        $isCorrect = true;
        foreach ($ip as $number) {
            if (!ctype_digit($number)) {
                $isCorrect = false;
            } elseif ((int)$number > 255) {
                $isCorrect = false;
            }
        }
    }
    var_export($isCorrect);
    echo PHP_EOL;
}

echo 'regex comparison' . PHP_EOL;
$regex = '#^(((25[0-5])|(2[0-4][0-9])|([0,1]\d{1,2})|(\d{1,2}))\.){3}'
    . '((25[0-5])|(2[0-4][0-9])|([0,1]\d{1,2})|(\d{1,2}))$#';

foreach ($ips as $ip) {
    echo preg_match($regex, $ip) . PHP_EOL;
}
