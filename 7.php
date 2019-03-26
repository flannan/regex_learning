<?php
/** @noinspection ForgottenDebugOutputInspection */


$addresses = [
    //Пример правильных выражений:
    'mail@mail.ru',
    'valid@megapochta.com',
    'aa@aa.info',
    //Пример неправильных выражений:
    'bug@@@com.ru',
    '@val.ru',
    'Just Text2',
    'val@val',
    'val@val.a.a.a.a',
    '12323123@111[]][]'
];


echo 'PHP comparison' . PHP_EOL;
foreach ($addresses as $address) {
    $isCorrect = true;
    if (filter_var($address, FILTER_VALIDATE_EMAIL) === false) {
        $isCorrect = false;
    } else {
        $host = explode('@', $address);
        $host = $host[1];
        $hosts = explode('.', $host);
        foreach ($hosts as $host) {
            if (strlen($host) < 2) {
                $isCorrect = false;
            }
            if (strpbrk($host, '_') !== false) {
                $isCorrect = false;
            }
            if (!ctype_alnum(substr($host, 0, 1))) {
                $isCorrect = false;
            }
            if (!ctype_alnum(substr($host, -1))) {
                $isCorrect = false;
            }
        }
    }
    var_export($isCorrect);
    echo PHP_EOL;
}

echo 'regex comparison' . PHP_EOL;
$regex = '#\w{2,}@([^\W_ ]{2,}\.)+([^\W_ ]{2,})#';

foreach ($addresses as $address) {
    echo preg_match($regex, $address) . PHP_EOL;
}
