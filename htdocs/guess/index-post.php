<?php
require "config.php";
require "autoload.php";

$title = "guess with get";

$number = $_POST["number"] ?? -1;
$tries = $_POST["tries"] ?? 6;
$guess = $_POST["guess"] ?? null;


$game = new Guess($number, $tries);

if (isset($_POST["reset"])) {
    $game->random();

}

$res = null;
if (isset($_POST["doGuess"])){
    $res = $game->makeGuess($guess);
}

if(isset($_POST["doCheat"])){
    echo $game->number();
}


?><!doctype html>

<title><?= $title ?></title>
<p> guess a number between 1-100</p>
<form method="POST">
    <input name="number" value="<?= $game->number()?>" type="hidden">
    <input name="tries" value ="<?= $game->tries()?>" type="hidden">
    <input name="guess" value="<?=$guess?>" type="text">
    <input name= "doGuess" value="Make a Guess" type="submit">
    <input name="doCheat" value="Cheat" type="submit" >
 </form>
<p>you have <?=$game->tries()?> tries left</p>
 <p>
     <a href="?reset">reset</a>
 </p>

<?php echo $res;
