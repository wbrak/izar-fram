<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use IzarFramework\Http\Middleware\Session;
use IzarFramework\Providers\ControllerServiceProvider;
use IzarFramework\Providers\SessionServiceProvider;
use IzarFramework\Providers\ViewServiceProvider;
use Dotenv\Dotenv;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use League\Container\Container;

require __DIR__ . '/../vendor/autoload.php';

$dotEnv = Dotenv::createImmutable(base_path(''));
$dotEnv->load();
// View environment variables DB_NAME, DB_PORT etc.. //
//Kint::dump($_ENV['DB_NAME']);

$container = new Container();

$container->share('response', Response::class);
$container->share('request', function () {
    return ServerRequestFactory::fromGlobals(
        $_SERVER,
        $_GET,
        $_POST,
        $_COOKIE,
        $_FILES
    );
});
// View request or response data //
//Kint::dump($container->get('request'));

$container->addServiceProvider(new SessionServiceProvider());
$container->addServiceProvider(new ViewServiceProvider());
$container->addServiceProvider(new ControllerServiceProvider());

$router = require base_path('routes/web.php');
//Kint::dump($router);

$container->share('emitter', SapiEmitter::class);

$response = $router->dispatch($container->get('request'), $container->get('response'));

$container->get('emitter')->emit($response);