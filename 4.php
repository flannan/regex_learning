<?php /** @noinspection ForgottenDebugOutputInspection */

//Пример правильных выражений:
$sampleURL1 = 'http://www.zcontest.ru';
$sampleURL2 = 'http://zcontest.ru';
$sampleURL3 = 'http://zcontest.com';
$sampleURL4 = 'https://zcontest.ru';
$sampleURL5 = 'https://sub.zcontest-ru.com:8080';
$sampleURL6 = 'http://zcontest.ru/dir%201/dir_2/program.ext?var1=x&var2=my%20value';
$sampleURL7 = 'zcon.com/index.html#bookmark';

//Пример неправильных выражений:
$sampleURL8 = 'Just Text.';
$sampleURL9 = 'http://a.com';
$sampleURL10 = 'http://www.domain-.com';

require_once __DIR__ . '/4.validateURL.php';

echo 'PHP comparison' . PHP_EOL;
var_export(validateURL($sampleURL1));
echo PHP_EOL;
var_export(validateURL($sampleURL2));
echo PHP_EOL;
var_export(validateURL($sampleURL3));
echo PHP_EOL;
var_export(validateURL($sampleURL4));
echo PHP_EOL;
var_export(validateURL($sampleURL5));
echo PHP_EOL;
var_export(validateURL($sampleURL6));
echo PHP_EOL;
var_export(validateURL($sampleURL7));
echo PHP_EOL;
var_export(validateURL($sampleURL8));
echo PHP_EOL;
var_export(validateURL($sampleURL9));
echo PHP_EOL;
var_export(validateURL($sampleURL10));
echo PHP_EOL;

echo 'regex comparison' . PHP_EOL;
//$regex = '#((http|https)://)?(\w+)/.(\w+)(\:\d*)?#';
$regex = '#(^(http|https)://)?([^\W_ ]{2,}[\.,/%])+[^\W_ ]{2,3}(\#(\w*))?(\?.*)?(\:\d{4})?$#';


echo preg_match($regex, $sampleURL1) . PHP_EOL;
echo preg_match($regex, $sampleURL2) . PHP_EOL;
echo preg_match($regex, $sampleURL3) . PHP_EOL;
echo preg_match($regex, $sampleURL4) . PHP_EOL;
echo preg_match($regex, $sampleURL5) . PHP_EOL;
echo preg_match($regex, $sampleURL6) . PHP_EOL;
echo preg_match($regex, $sampleURL7) . PHP_EOL;
echo preg_match($regex, $sampleURL8) . PHP_EOL;
echo preg_match($regex, $sampleURL9) . PHP_EOL;
echo preg_match($regex, $sampleURL10) . PHP_EOL;
