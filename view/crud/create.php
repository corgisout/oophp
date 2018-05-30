<?php
include 'navbar.php';
if (!isset($_GET['status'])) {
    $_GET['status'] = "";
}
?>
<h1>Create</h1>
<p><b><?=($_GET['status'] === 'error') ? "Your slug is already in use" : null?></b></p>
<p><b><?=($_GET['status'] === 'success') ? "Content was successfully edited" : null?></b></p>
<form action="create" method="POST">
    <label for="">Title</label>
    <input type="text" id="title" name="title"><br>
    <label for="">Type</label>
    <select name="type" id="type">
        <option value="post">Post</option>
        <option value="page">Page</option>
    </select><br>
    <label for="">Path</label>
    <input type="text" id="path" name="path"><br>
    <label for="">Slug</label>
    <input type="text" id="slug" name="slug"><br>
    <label for="">Data</label>
    <textarea name="data" id="data"></textarea><br>
    <label for="">Filters</label>
    <input type="text" id="filter" name="filter"><br>
    <input type="submit" value="Create"><br>
</form>
