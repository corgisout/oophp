<?php
include('navbar.php');

?>
<h1><?= $data['heading'] ?></h1>
<h3>Original</h3>
<?= $data['text'] ?>
<h3>Formated as HTML</h3>
<?= htmlentities($data['filteredtext']) ?>
<h3>Filtered</h3>
<?= $data['filteredtext'] ?>
