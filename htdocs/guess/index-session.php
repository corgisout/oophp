<?php


 include "config.php";
 include "autoload.php";
$sessionName = substr(preg_replace('/[^a-z\d]/i', '', __DIR__), -30);
session_name($sessionName);
session_start();


$guess = isset($_POST["guess"]) ? $_POST["guess"] : null;
$number = isset($_SESSION['number']) ? $_SESSION['number'] : -1;
$tries = isset($_SESSION['tries']) ? $_SESSION['tries'] : 6;
$game = new Guess($number, $tries);

$res = null;
if (isset($_POST['doGuess'])) {
    $res = $game->makeGuess($guess);
}
if (isset($_POST['doRestart'])) {
    $game->random();
}
$_SESSION['number'] = $game->number();
$_SESSION['tries'] = $game->tries();

    $title = "guess with session";
?><!doctype html>

<title><?= $title ?></title>
<p> guess a number between 1-100</p>
    <form method="POST">
            <input type="text" name="guess">
            <input type="submit" name="doGuess" value="Guess">
            <input type="submit" name="doRestart" value="Restart">
            <input type="submit" name="doCheat" value="Cheat">
        </fieldset>
    </form>
</div>
<p>you have <?=$game->tries()?> tries left</p>
<?php
// Check if user request correct answer
if (isset($_POST['doGuess'])) {
    echo "$res";
}
if (isset($_POST['doCheat'])) {
    echo "Try this number: " . $game->number();
}
?>
