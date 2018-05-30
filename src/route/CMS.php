<?php
$app->router->get("content/start", function () use ($app) {
    $data = [
        "title" => "Start for content",
        "class" => "hello-world",

    ];
    $app->view->add("page/start", $data);
    $app->page->render($data);
});
$app->router->get("page/{arg}", function ($arg) use ($app) {
    $content = new sihd\CMS\Content($app);
    $filter = new sihd\TextFilter\TextFilter1();
    $page = new sihd\PageOrPost\pageorpost();
    $page->connect($app);
    $pagedata = $page->getContent("page", $arg, $app);
    $data = [
        "title" => $pagedata['title'],
        "class" => "hello-world",
        "text" => $filter->parse($pagedata['text'], $pagedata['filters'])
    ];
    $app->view->add("page/page", $data);
    $app->page->render($data);
});
$app->router->get("post/{arg}", function ($arg) use ($app) {

    $filter = new sihd\TextFilter\TextFilter1();
    $page = new sihd\PageORPost\pageorpost();
    $page->connect($app);
    $pagedata = $page->getContent("post", $arg, $app);
    $data = [
        "title" => $pagedata['title'],
        "class" => "hello-world",
        "text" => $filter->parse($pagedata['text'], $pagedata['filters']),
        "created" => $pagedata['created']
    ];
    $app->view->add("post/post", $data);
    $app->page->render($data);
});
$app->router->get("blogposts", function () use ($app) {
    $content = new sihd\CMS\Content($app);
    $filter = new sihd\TextFilter\TextFilter1();
    $page = new sihd\PageOrPost\pageorpost();
    $posts = $content->getPosts();
    foreach ($posts as $post) {
        $post->filter = $page->createArrayOfFilters($post->filter);
        $post->data = $filter->parse($post->data, $post->filter);
    }
    $data = [
        "title" => "Blogposts",
        "class" => "hello-world",
        "posts" => $posts
    ];
    $app->view->add("post/list", $data);
    $app->page->render($data);
});
