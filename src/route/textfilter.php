<?php
namespace sihd\TextFilter;

/**
 * Show all movies.
 */
$app->router->get("textfilter/start", function () use ($app) {
    $data = [
        "title" => "Textfilter | oophp",
    ];
    $app->view->add("textfilter/start", $data);
    $app->page->render($data);
});
$app->router->get("textfilter/markdown", function () use ($app) {
    $data = [
        "title" => "Textfilter markdown | oophp",
        "heading" => "Markdown",
    ];
    $text = file_get_contents(__DIR__ . "/sample.md");
    $filter = new TextFilter1();
    $data['filteredtext'] = $filter->parse($text, ["markdown"]);
    $data['text'] = $text;
    $app->view->add("textfilter/test", $data);
    $app->page->render($data);
});
$app->router->get("textfilter/bbcode-nl2br-clickable", function () use ($app) {
    $data = [
        "title" => "Textfilter markdown | oophp",
        "heading" => "bbcode, nl2br och clickable",
    ];
    $text = file_get_contents(__DIR__ . "/bbcode.md");
    $filter = new TextFilter1();
    $data['filteredtext'] = $filter->parse($text, ["bbcode", "nl2br", "link"]);
    $data['text'] = $text;
    $app->view->add("textfilter/test", $data);
    $app->page->render($data);
});
