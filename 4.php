<?php /** @noinspection ForgottenDebugOutputInspection */

$sampleURLs = [
    //Пример правильных выражений:
    'http://www.zcontest.ru',
    'http://zcontest.ru',
    'http://zcontest.com',
    'https://zcontest.ru',
    'https://sub.zcontest-ru.com:8080',
    'http://zcontest.ru/dir%201/dir_2/program.ext?var1=x&var2=my%20value',
    'zcon.com/index.html#bookmark',
    //Пример неправильных выражений:
    'Just Text.',
    'http://a.com',
    'http://www.domain-.com'
];

echo 'PHP comparison' . PHP_EOL;
foreach ($sampleURLs as $sampleURL) {
    $valid = true;
    $url=$sampleURL;
    if (substr($url, 0, 4) !== 'http') {
        $url = 'http://' . $url;
    }
    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        $valid = false;
    }

    $host = parse_url($url, PHP_URL_HOST);
    $hosts = explode('.', $host);

    foreach ($hosts as $host) {
        if (strlen($host) < 2) {
            $valid = false;
        }
        if (strpbrk($host, '_') !== false) {
            $valid = false;
        }
        if (!ctype_alnum(substr($host, 0, 1))) {
            $valid = false;
        }
        if (!ctype_alnum(substr($host, -1))) {
            $valid = false;
        }
    }
    var_export($valid);
    echo PHP_EOL;
}

echo 'regex comparison' . PHP_EOL;
//$regex = '#((http|https)://)?(\w+)/.(\w+)(\:\d*)?#';
$regex = '#(^(http|https)://)?([^\W_ ]{2,}[\.,/%])+[^\W_ ]{2,3}(\#(\w*))?(\?.*)?(\:\d{4})?$#';

foreach ($sampleURLs as $sampleURL) {
    echo preg_match($regex, $sampleURL) . PHP_EOL;
}
