<?php /** @noinspection ForgottenDebugOutputInspection */

$sampleGUID = 'e02fa0e4-01ad-090A-c130-0d05a0008ba0';
$sampleGUIDBrackets = '{e02fa0e4-01ad-090A-c130-0d05a0008ba0}';
$wrongGUID = 'e02fa0e4-01ad-090A-c130-0d05a0008ba0}';
$wrongGUID2 = 'e02fa0e401ad090Ac1300d05a0008ba0';

require_once __DIR__ . '/2.isGUID.php';

echo 'PHP comparison' . PHP_EOL;
var_export(isGUID($sampleGUID));
echo PHP_EOL;
var_export(isGUID($sampleGUIDBrackets));
echo PHP_EOL;
var_export(isGUID($wrongGUID));
echo PHP_EOL;
var_export(isGUID($wrongGUID2));
echo PHP_EOL;

echo 'regex comparison' . PHP_EOL;
$regex = '#(\{)?[[:xdigit:]]{8}\-[[:xdigit:]]{4}\-[[:xdigit:]]{4}\-[[:xdigit:]]{4}\-[[:xdigit:]]{12}(?(1)\}|$)#';

echo preg_match($regex, $sampleGUID) . PHP_EOL;
echo preg_match($regex, $sampleGUIDBrackets) . PHP_EOL;
echo preg_match($regex, $wrongGUID) . PHP_EOL;
echo preg_match($regex, $wrongGUID2) . PHP_EOL;
