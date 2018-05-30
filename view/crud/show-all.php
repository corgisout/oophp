<?php
include 'navbar.php';
if (!isset($_GET['status'])) {
    $_GET['status'] = "";
}
?>
<p><b><?=($_GET['status'] === 'deleted') ? "Content successfully deleted" : null?></b></p>
<p><b><?=($_GET['status'] === 'created') ? "Content successfully Created" : null?></b></p>
<?php

include 'tablee.php'
?>
