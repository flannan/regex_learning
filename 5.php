<?php /** @noinspection ForgottenDebugOutputInspection */


$colors = [
    //Пример правильных выражений:
    '#FFFFFF',
    '#FF3421',
    '#00ff00',
    //Пример неправильных выражений:
    '232323',
    'f#fddee',
    '#fd2',
];


echo 'PHP comparison' . PHP_EOL;
foreach ($colors as $color) {
    $isColor=true;
    if ($color[0]!=='#') {
        $isColor=false;
    }
    if (strlen($color)!==7) {
        $isColor=false;
    } elseif (!ctype_xdigit(substr($color, 1, 6))) {
        $isColor=false;
    }

    var_export($isColor);
    echo PHP_EOL;
}

echo 'regex comparison' . PHP_EOL;
$regex = '#\#[[:xdigit:]]{6}#';

foreach ($colors as $color) {
    echo preg_match($regex, $color) . PHP_EOL;
}