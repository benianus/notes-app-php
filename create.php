<?php
$connection = require __DIR__ . "/database.php";
// echo "<pre>";
// var_dump($_POST["id"]);
// echo "</pre>";
// exit;


if ($_POST['id']) {
    if ($connection->updateNote($_POST['id'], $_POST)) {
        header("location: index.php");
        exit;
    }
} else {
    if ($connection->createNote($_POST)) {
        header("location: index.php");
        exit;
    }
}

