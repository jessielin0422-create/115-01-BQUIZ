<?php
include_once "db.php";
$table=$_GET['table'];
$db=${ucfirst($table)};
$db->save($_POST);

// $bottom->save($_POST);

to("../admin.php?do=$table");
?>