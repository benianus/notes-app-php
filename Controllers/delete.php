<?php 
$connection = require __DIR__ . "/../database/database.php";
$isDeleted = $connection->deleteNote($_POST['id']);

if ($isDeleted) {
    redirect('/');
}
// echo "<pre>";
// var_dump($_POST["id"]);
// echo "</pre>";
// die();