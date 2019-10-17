<?php

declare(strict_types=1);

$life = 10;
$hunger = $sleepiness = $playfulness = 0;

$circleOfLife = static function () use (&$life, &$hunger, &$sleepiness, &$playfulness) {
    $hunger++;
    $sleepiness++;
    $playfulness++;

    if ($hunger > 7) { $life--; }
    if ($sleepiness > 7) { $life--; }
    if ($playfulness > 7) { $life--; }
};

$gotoEat = static function() use (&$hunger, &$sleepiness) {
    $hunger--;
    $sleepiness++;
};

$goToDoctor = static function() use (&$life) {
    $life += 2;
};

$goToSleep = static function() use (&$hunger, &$sleepiness) {
    $hunger += 5;
    $sleepiness -= 7;
};

$goToPlay = static function() use (&$hunger, &$sleepiness, &$playfulness) {
    $hunger += 2;
    $sleepiness += 2;
    $playfulness -= 4;
};
