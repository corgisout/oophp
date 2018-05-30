<?php
include('movies-navbar.php');
$route="?yearMin=" . $_GET['yearMin'] . "&yearMax=" . $_GET['yearMax'] .  "&";
?>
<h2>Search movie by Year</h2>
<p>Search movie by year</p>
<form action="movie-year" method="GET">
<input class="block" type="number" value="<?= $_GET['yearMin']?>" name="yearMin" id="yearMin">
to
<input class="block"type="number" value="<?= $_GET['yearMax']?>" name="yearMax" id="yearMax">
<input type="submit" value="Search">
</form>
<p>Found <b><?= count($resultset) ?></b> movie(s) </p>
<?php
include('tablee.php');
?>
