<?php
include 'navbar.php';
if (!isset($_GET['status'])) {
    $_GET['status'] = "";
}
?>
<h1>Edit</h1>
<p><b><?=($_GET['status'] === 'error') ? "Error: slug already in use" : null?></b></p>
<p><b><?=($_GET['status'] === 'success') ? "Content has been edited" : null?></b></p>
<form action="edit" method="POST">
<label for="">Id</label>
<input type="text" id="id" name="id" value="<?=$res[0]->id?>"><br>
<label for="">Title</label>
<input type="text" id="title" name="title" value="<?=$res[0]->title?>"><br>
<label for="">Type</label>
<select name="type" id="type">
<option <?=$res[0]->type == 'post' ? "selected" : null?> value="post">Post</option>
<option <?=$res[0]->type == 'page' ? "selected" : null?> value="page">Page</option>
</select><br>
<label for="">Path</label>
<input type="text" id="path" name="path" value="<?=$res[0]->path?>"><br>
<label for="">Slug</label>
<input type="text" id="slug" name="slug" value="<?=$res[0]->slug?>"><br>
<label for="">Data</label>
<textarea name="data" id="data"><?=$res[0]->data?></textarea><br>
<label for="">Filters</label>
<input type="text" id="filter" name="filter" value="<?=$res[0]->filter?>"><br>
<label for="">Published</label>
<input type="text" id="published" name="published" value="<?=$res[0]->published?>"><br>
<label for="">Created</label>
<input type="text" id="created" name="created" value="<?=$res[0]->created?>"><br>
<label for="">Updated</label>
<input type="text" id="updated" name="updated" value="<?=$res[0]->updated?>"><br>
<label for="">Deleted</label>
<input type="text" id="deleted" name="deleted" value="<?=$res[0]->deleted?>"><br>
<input type="submit" value="Edit">
</form>
