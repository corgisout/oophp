<?php
use sihd\Game\Game as Game;
/**
 * App specific routes.
 */
//var_dump(array_keys(get_defined_vars()));
$app->router->any(["GET", "POST"], "dice100", function () use ($app) {
    $app->session();
    $res = array();
    $roll = 0;

        if ($app->request->getPost("reset") !== null) {
        $app->session->set("game", null);
        $app->session->set("round", null);
        $app->session->set("values", array());
    }

    $game = new Game($app->session->get("game"), $app->session->get("round"));

     if ($app->request->getPost("take") !== null) {
        $game->takePoints();
    }

    if ($app->request->getPost("roll") !== null) {
        $res = $game->roll();
        $roll = 1;
    }

    if ($app->request->getPost("simcomp") !== null) {
        $res = $game->computerTurn();
    }

    $totalpoints = $game->getTotalPoints();
    $gamememory = $game->getMemory();
    $roundPoints = $game->getRoundPoints();
    $gamestatus = $game->getGameStatus();
    $playertotal = array_sum($totalpoints[0]);
    $computertotal = array_sum($totalpoints[1]);


    $_SESSION["game"] = $gamememory;
    $_SESSION["round"] = $roundPoints;

$data = [
    "title" => "Tärningsspel 100",
    "totalpoints" => $totalpoints,
    "playertotal" => $playertotal,
    "computertotal" => $computertotal,
    "roundPoints" => $roundPoints,
    "roll" => $roll,
    "gamestatus" => $gamestatus,
    "res" => $res

];
$app->view->add("dice100/dice100", $data);
$app->page->render($data);
});
