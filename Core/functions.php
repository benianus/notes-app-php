<?php

function view($view, $data = [])
{
    extract($data);
    require __DIR__ . "/../Views/$view";
}
function base_url($path)
{
    return BASE_URL . $path;
}
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}
function redirect($path)
{
    header("location: $path");
}