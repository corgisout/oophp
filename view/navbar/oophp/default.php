<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>

 <br>

<navbar>
    <a href="<?= url("") ?>">Hem</a> |
    <a href="<?= url("redovisning") ?>">Redovisning</a> |
    <a href="<?= url("om") ?>">Om</a> |
    <a href="<?= url("lek") ?>">Lek</a> |
    <a href="<?= url("gissa") ?>">gissa</a> |
    <a href="<?= url("dice100") ?>">Tärningsspel 100</a>
    <a href="<?= url("debug") ?>">Debug</a>
    <a href="<?= url("movies/movies") ?>">movies</a>
    <a href="<?= url("textfilter/start") ?>">textfilter</a>
    <a href="<?= url("login/login") ?>">login</a>
    <a href="<?= url("content/start") ?>">Content</a>

</navbar>
