<?php
namespace Anax\View;


include('movies-navbar.php');
$route = "?searchTitle=" . $_GET['searchTitle'] . "&";
?>
<h2>Search movie by Title</h2>
<p>Search movie by title and use % for wildcards</p>
<form action="movie-titel" method="GET">
<input type="text" value="<?= $_GET['searchTitle']?>" name="searchTitle" id="searchTitle">
<input type="submit" value="Search">
</form>
<p>Found <b><?= count($resultset) ?></b> movie(s) </p>
<?php
include('tablee.php');
?>
