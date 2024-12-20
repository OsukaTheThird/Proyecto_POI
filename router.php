<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = require "routes.php";

function toController($uri,$routes){
    if(array_key_exists($uri, $routes)) {
        echo "$routes[$uri]";
        $url = 'Location: ' . $routes[$uri];
        header($url);
        //require $routes[$uri];
    }else{
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);
    require "./views/$code.php";
    die();
}


toController($uri,$routes);