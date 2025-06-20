<?php

function view($view, mixed $data = "")
{
    extract($data);
    require __DIR__ . "/$view";
}