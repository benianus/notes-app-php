<?php
$connection = require __DIR__ . "/../database/database.php";


if ($_POST['id']) {
    if ($connection->updateNote($_POST['id'], $_POST)) {
        redirect('/');
        exit;
    }
} else {
    if ($connection->createNote($_POST)) {
        redirect('/');
        exit;
    }
}

