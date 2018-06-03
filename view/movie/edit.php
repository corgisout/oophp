<?php
include('movies-navbar.php');
?>
<h2>Edit movie <?= $movie->title ?></h2>
<img width="300px" src="<?= $this->asset($movie->image) ?>" alt="">
<form action="edit-movie" method="POST">
<input type="text" value="<?= $movie->id ?>" id="movieid" name="movieid">
<input type="text" value="<?= $movie->title ?>" id="title" name="title">
<input type="number" value="<?= $movie->year ?>" id="year" name="year">
<input type="text" value="<?= $movie->image ?>" id="image" name="image">
<input type="submit" value="Edit">
</form>
