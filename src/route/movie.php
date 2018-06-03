<?php
namespace sihd\Movie;
/**
 * Show all movies.
 */
$app->router->get("movies/movies", function () use ($app) {
    $data = [
        "title"  => "Movie database | oophp",
    ];

    // $title = "Show all movies";
    // $view[] = "view/show-all.php";
    // $sql = "SELECT * FROM movie;";
    // $resultset = $db->executeFetchAll($sql);

    $app->db->connect();

    $sql = "SELECT * FROM movie;";
    $res = $app->db->executeFetchAll($sql);

    $data["resultset"] = $res;

    $app->view->add("movie/index", $data);
    $app->page->render($data);
});

$app->router->get("movies/movie-titel", function () use ($app) {
    $data = [
        "title" => "Search Movie database | oophp",
    ];

    if (!isset($_GET["searchTitle"])) {
        $_GET["searchTitle"] = "%%";
    }
    $database = new Movie($app);
    $params = [$_GET['searchTitle']];
    $sql = "SELECT * FROM movie WHERE title LIKE ? ORDER BY id;";
    $res = $database->fetch($sql, $params);
    $data["resultset"] = $res;
    $app->view->add("movie/movie-titel", $data);
    $app->page->render($data);
});

$app->router->get("movies/movie-year", function () use ($app) {
    $data = [
        "title" => "Search Movie Year database | oophp",
    ];
    if (!isset($_GET["yearMin"])) {
        $_GET["yearMin"] = 1990;
        $_GET["yearMax"] = 2018;
    }
    $database = new Movie($app);
    $params = [$_GET['yearMin'], $_GET['yearMax']];
    $sql = "SELECT * FROM movie WHERE year >= ? AND year <= ? ORDER BY id;";
    $res = $database->fetch($sql, $params);
    $data["resultset"] = $res;
    $app->view->add("movie/movie-year", $data);
    $app->page->render($data);
});


$app->router->get("movies/edit", function () use ($app) {
    $data = [
        "title" => "Edit Movie database | oophp",
    ];
    $database = new Movie($app);
    $sql = "SELECT * FROM movie WHERE id = ?;";
    $params = [$_GET["id"]];
    $res = $database->fetch($sql, $params);
    $data["movie"] = $res[0];
    $app->view->add("movie/edit", $data);
    $app->page->render($data);
});


$app->router->get("movies/add-movie", function () use ($app) {
    $data = [
        "title" => "Add Movie database | oophp",
    ];
    $app->view->add("movie/add-movie", $data);
    $app->page->render($data);
});

$app->router->post("movies/add-movie-action", function () use ($app) {
    $database = new Movie($app);
    $sql = "INSERT INTO movie(title, year, image) VALUES(?, ?, ?);";
    $params = [htmlentities($_POST['title']), htmlentities($_POST['year']), htmlentities($_POST['image'])];
    $res = $database->fetch($sql, $params);
    header('Location: movies');
    exit;
});

$app->router->post("movies/edit-movie", function () use ($app) {
    $database = new Movie($app);
    $sql = "UPDATE movie SET title = ?, year = ?, image = ? WHERE id = ?;";
    $params = [htmlentities($_POST['title']), htmlentities($_POST['year']), $_POST['image'], $_POST['movieid']];
    $res = $database->fetch($sql, $params);
    header('Location: movies');
    exit;
});

$app->router->get("movies/delete-movie", function () use ($app) {
    $database = new Movie($app);
    $sql = "DELETE FROM movie WHERE id = ? LIMIT 1;";
    $params = [$_GET['id']];
    $database->fetch($sql, $params);
    header('Location: movies');
    exit;
});
