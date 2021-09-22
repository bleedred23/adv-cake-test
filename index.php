<?php

require_once('vendor/autoload.php');

use Tests\revertTest;

$test = new revertTest();
$responses = [];

$data = 'Привет! Классные очки :)';
$expected = 'Тевирп! Еынссалк икчо :)';
$responses[] = $test->shouldBeGood($data, $expected);

$data = 'Где.кнопкА!ПРобЕл???';
$expected = 'Едг.акпонК!ЛЕбоРп???';
$responses[] = $test->shouldBeGood($data, $expected);

$data = '123 4 5 6 78 9 101112';
$expected = '321 4 5 6 87 9 211101';
$responses[] = $test->shouldBeGood($data, $expected);

$data = 'United States of America';
$expected = 'Detinu Setats fo Acirema';
$responses[] = $test->shouldBeGood($data, $expected);

$data = ' ';
$expected = ' ';
$responses[] = $test->shouldBeGood($data, $expected);

$data = '';
$expected = '';
$responses[] = $test->shouldBeGood($data, $expected);

$success = 0;
$fail = 0;
$badMessages = [];

foreach ($responses as $response) {
    if ($response['STATUS'] === 'success') {
        $success++;
        continue;
    }
    $fail++;
    $badMessages[] = $response['MESSAGE'];
}

echo 'Successfully run ' . $success . ' tests out of ' . count($responses) . PHP_EOL;
if ($fail !== 0) {
    echo 'Fail messages: ' . PHP_EOL;
    foreach ($badMessages as $msg) {
        echo $msg . PHP_EOL;
    }
}