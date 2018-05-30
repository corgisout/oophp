<?php

$app->router->get("crud/show-all", function () use ($app) {

    $data = [
        "title" => "Show all content | oophp",
    ];

    $content = new sihd\CMS\Content($app);
    $data['res'] = $content->fetch("SELECT * FROM content;");

    $app->view->add("crud/show-all", $data);
    $app->page->render($data);
});

$app->router->get("crud/edit", function () use ($app) {

    $data = [
        "title" => "Edit | oophp",
    ];

    $content = new sihd\CMS\Content($app);
    $sql = "SELECT * FROM content WHERE id = ?;";
    $params = [$_GET["id"]];

    $data['res'] = $content->fetch($sql, $params);

    $app->view->add("crud/edit", $data);
    $app->page->render($data);
});

$app->router->get("crud/slug", function () use ($app) {

    $data = [
        "title" => "Edit | oophp",
    ];
    $content = new sihd\PagePost\PagePost();
    $content->connect($app);
    $content->checkSlug("blogpost-3");

    $app->view->add("crud/edit", $data);
    $app->page->render($data);
});

$app->router->post("crud/edit", function () use ($app) {
    $content = new sihd\PageOrPost\pageorpost();
    $content->connect($app);

    $status = $content->editContent($_POST);
    if ($status == false) {
        header('Location: edit?id=' . $_POST['id'] . '&status=error');
        exit;
    } else {
        header('Location: edit?id=' . $_POST['id'] . '&status=success');
        exit;
    }
});

$app->router->get("crud/delete", function () use ($app) {
    $content = new sihd\PageOrPost\pageorpost();
    $content->connect($app);
    $id = $_GET['id'];
    $status = $content->deleteContent($id);
    header('Location: show-all?status=deleted');
    exit;

});

$app->router->get("crud/create", function () use ($app) {

    $data = [
        "title" => "Create | oophp",
    ];

    $app->view->add("crud/create", $data);
    $app->page->render($data);
});

$app->router->post("crud/create", function () use ($app) {
    $content = new sihd\PageOrPost\pageorpost();
    $content->connect($app);

    $status = $content->createContent($_POST);
    if ($status == false) {
        header('Location: create?id=' . $_POST['id'] . '&status=error');
        exit;
    } else {
        header('Location: show-all?status=created');
        exit;
    }
});
