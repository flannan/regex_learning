<?php

//Пример правильных выражений:
$sampleMAC1='01:32:54:67:89:AB';
$sampleMAC2='aE:dC:cA:56:76:54';

//Пример неправильных выражений:
$sampleMAC3='01:33:47:65:89:ab:cd';
$sampleMAC4='01:23:45:67:89:Az';

$regex = '#^[[:xdigit:]]{2}\:[[:xdigit:]]{2}\:[[:xdigit:]]{2}\:[[:xdigit:]]{2}\:[[:xdigit:]]{2}\:[[:xdigit:]]{2}$#';

echo 'regex comparison' . PHP_EOL;
echo preg_match($regex, $sampleMAC1) . PHP_EOL;
echo preg_match($regex, $sampleMAC2) . PHP_EOL;
echo preg_match($regex, $sampleMAC3) . PHP_EOL;
echo preg_match($regex, $sampleMAC4) . PHP_EOL;
