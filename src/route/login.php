<?php
namespace sihd\login;

/**
 * Show all movies.
 */
$app->router->get("login/login", function () use ($app) {
    session_start();
    $data = [
        "title"  => " login | oophp",
    ];

    $app->view->add("login/index", $data);
    $app->page->render($data);
});


$app->router->post("login/login", function () use ($app) {
    session_start();
    $data = [
        "title"  => " login | oophp",
    ];

    if ($app->request->getPost("username") && $app->request->getPost("password")) {
        $login = new Login($app);
        $res = $login->login($app->request->getPost("username"), $app->request->getPost("password"));
        if (!$res) {
            $data['loginError'] = "Username or password is wrong.";
        }
    } else {
        $data['loginError'] = "Username or password not set.";
    }

    $app->view->add("login/index", $data);
    $app->page->render($data);
});

$app->router->any(["GET", "POST"], 'login/logout', function () use ($app) {
    session_start();
    $login = new Login($app);
    $login->logout();
});
