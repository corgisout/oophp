<?php
namespace Anax\View;

include('movies-navbar.php');
?>
<h2>Add movie</h2>

<form action="add-movie-action" method="POST">
<input type="text" placeholder="Movite title" id="title" name="title">
<input type="number" placeholder="Year published" id="year" name="year">
<input type="text" placeholder="Image path (img/image.png)" id="image" name="image">
<input type="submit" value="Add">
</form>
