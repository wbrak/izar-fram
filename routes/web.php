<?php

use League\Route\RouteGroup;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;

$strategy = (new ApplicationStrategy())->setContainer($container);
$route = (new Router())->setStrategy($strategy);

$route->group('/', function (RouteGroup $route) use ($container) {
    $route->map('GET', '/', 'IzarFramework\Http\Controllers\HomeController::index');
});

return $route;