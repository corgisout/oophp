<?php

use sihd\Guess\Guess as Guess;

/**
 * guess game specific routes.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * guess my number with get
 */
$app->router->get("gissa/get", function () use ($app) {

    $data= [
        "title" => "gissa mitt nummer get",
    ];

    $number = $_GET["number"] ?? -1;
    $tries = $_GET ["tries"] ?? 6;
    $guess = $_GET ["guess"] ?? null;


    $game = new Guess($number, $tries);

    if (isset($_GET["reset"])) {
        $game->random();
    }

    $res = null;
    if (isset($_GET["doGuess"])) {
        $res = $game->makeGuess($guess);
    }

    $data["game"] = $game;
    $data["res"] = $res;
    $data["guess"] = $guess;

    $app->view->add("guess/get", $data);
    $app->page->render($data);
});


$app->router->any(["GET", "POST"], "gissa/session", function () use ($app) {
    session_name(md5(__FILE__));
    session_start();
    // For the view
    $data = [
        "title" => "Gissa mitt nummer med SESSION | oophp",
        "method" => "POST",
    ];

        //incoming POST data
    $guess = isset($_POST["guess"]) ? $_POST["guess"] : null;
    //get the game if exists or create a new game
    if (isset($_SESSION["game"])) {
        $game = $_SESSION["game"];
    } else {
        $game = new \sihd\Guess\Guess();
        $_SESSION["game"] = $game;
    }
    // Reset the game.
    if (isset($_POST["reset"]) || isset($_GET["reset"])) {
        $game->random();
        $_SESSION["game"] = null;
        header("Location: session");
        exit;
    }
    // Do a guess
    $res = null;
    if (isset($_POST["doGuess"])) {
        $res = $game->makeGuess($guess);
        $_SESSION["game"] = $game;
    }

    //prepare data
    $data["game"] = $game;
    $data["res"] = $res;
    $data["guess"] = $guess;
    //add view and render page
    $app->view->add("guess/post", $data);
    $app->page->render($data);
});
