<?php

use League\Route\RouteGroup;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;

$strategy = (new ApplicationStrategy())->setContainer($container);
$router = (new Router())->setStrategy($strategy);

$router->group('/', function (RouteGroup $router) use ($container) {
    $router->map('GET', '/', 'IzarFramework\Http\Controllers\HomeController::index');
});

return $router;