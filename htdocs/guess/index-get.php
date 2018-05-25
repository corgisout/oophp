<?php
require "config.php";
require "autoload.php";

$title = "guess with get";

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

if(isset($_GET["doCheat"])){
    echo $game->number();
}


?><!doctype html>

<title><?= $title ?></title>
<p> guess a number between 1-100</p>
<form method="GET">
    <input name="number" value="<?= $game->number()?>" type="hidden">
    <input name="tries" value ="<?= $game->tries()?>" type="hidden">
    <input name="guess" value="<?=$guess?>" type="text">
    <input name= "doGuess" value="Make a Guess" type="submit">
    <input name="doCheat" value="Cheat" type="submit" >
 </form>

 <p>
     <a href="?reset">reset</a>
 </p>
<p> you have <?=$game->tries()?> tries left</p>
<?php echo $res;
