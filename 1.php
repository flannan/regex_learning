<?php /** @noinspection ForgottenDebugOutputInspection */

$targetString = 'abcdefdhsf^dsdsвВВо*18340';
$wrongString = 'abcdefghiklmnoasdfasdpqrstuv18340';

echo 'PHP comparison' . PHP_EOL;
var_export($targetString === 'abcdefdhsf^dsdsвВВо*18340');
echo PHP_EOL;
var_export($wrongString === 'abcdefdhsf^dsdsвВВо*18340');
echo PHP_EOL;

echo 'regex comparison' . PHP_EOL;
echo preg_match('#abcdefdhsf\^dsdsвВВо\*18340#u', $targetString) . PHP_EOL;
echo preg_match('#abcdefdhsf\^dsdsвВВо\*18340#u', $wrongString) . PHP_EOL;
