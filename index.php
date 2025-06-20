<?php
$connection = require __DIR__ . "/database.php";
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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
    <title>ToDo App</title>
</head>

<body>
    <div class="container">
        <div class="main-container d-flex flex-column justify-content-center align-items-center">
            <form action="create.php" method="post" class="form w-50 ">
                <input type="hidden" name="id" value="<?= (isset($currentNote['id'])) ? $currentNote['id'] : null ?>">
                <input class="d-block w-100 mb-2 mt-2" type="text" name="title" placeholder="add note title"
                    value="<?php echo (isset($currentNote['id']) ? $currentNote["title"] : '') ?>">
                <textarea class="d-block w-100 mb-2 mt-2" name="description" id="description"
                    placeholder="add note description"><?php echo (isset($currentNote['id']) ? trim($currentNote["description"]) : '') ?>
                </textarea>
                <button class="d-block w-100 mb-2 mt-2 border-1" type="submit">
                    <?php echo (isset($currentNote["id"])) ? "Update" : "Save" ?>
                </button>
            </form>
            <div class="notes d-flex justify-content-center align-items-center flex-column w-100">
                <?php foreach ($notes as $note): ?>
                    <div class="card note d-block bg-warning bg-warning mb-2 mt-2" style="width:50%;">
                        <div class="title m-2">
                            <h4 class="d-inline-block">
                                <a href="?id=<?= $note['id'] ?>"
                                    class="text-decoration-none text-black"><?= $note['title'] ?></a>
                            </h4>
                            <form action="delete.php" method="post" class="d-inline">
                                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                                <button class="border-0 float-end bg-transparent">X</button>
                            </form>
                        </div>
                        <div class="description m-2">
                            <p><?= $note['description'] ?></p>
                        </div>
                        <div class="float-end me-2 mb-1">
                            <small><?= $note['create_time'] ?></small>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</body>

</html>