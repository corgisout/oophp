<?php

namespace sihd\Guess;

require __DIR__ . "/config.php";
require __DIR__ . "/../../vendor/autoload.php";

$title = "guess with get inside";

$number = $_GET["number"] ?? -1;
$tries = $_GET ["tries"] ?? 6;
$guess = $_GET ["guess"] ?? null;


$game = new Guess($number, $tries);

if (isset($_GET["reset"])) {
    $game->random();
}

$res = null;
if (isset($_GET["doGuess"])){
    $res = $game->makeGuess($guess);
}
