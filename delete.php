<?php 

$connection = require __DIR__ ."/database.php";
$isDeleted = $connection->deleteNote($_POST['id']);

if ($isDeleted) {
    header('location: index.php');
}
// echo "<pre>";
// var_dump($_POST["id"]);
// echo "</pre>";
// die();