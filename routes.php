<?php

$router->get("/", "Controllers/home.php");
$router->post("/create", "Controllers/create.php");
$router->put("/create", "Controllers/create.php");
$router->delete("/delete", "Controllers/delete.php");