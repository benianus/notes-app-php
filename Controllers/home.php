<?php
$connection = require __DIR__ . "/../database/database.php";
$notes = [];
$notes = $connection->getNotes() ?? [];

$currentNote = [
    "id" => null,
    "create_time" => null,
    "title" => null,
    "description" => null,
];

if (isset($_GET['id'])) {
    $currentNote = $connection->getNote($_GET['id']);
}

return view('home.php', [
    "notes" => $notes,
    "currentNote" => $currentNote
]);
?>