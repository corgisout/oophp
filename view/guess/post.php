<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>

<!doctype html>

<h1><?= $title ?></h1>
<p> guess a number between 1-100</p>
<form method="POST">
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

<?php if (isset($res)) : ?>
    <p>your guess: <?= $guess?> is <b><?= $res ?></b></p>
<?php endif;?>

<?php if (isset($_POST["doCheat"])) : ?>
    <p>cheat: <?= $game->number() ?></p>
<?php endif;?>
