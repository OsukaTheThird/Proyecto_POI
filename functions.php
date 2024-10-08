<?php

function dd($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die();
}


function isUri($route)
{
    return $_SERVER['REQUEST_URI'] === $route ?
}