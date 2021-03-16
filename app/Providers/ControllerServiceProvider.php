<?php

namespace IzarFramework\Providers;

use IzarFramework\Http\Controllers\HomeController;
use IzarFramework\Http\Middleware\View;
use League\Container\ServiceProvider\AbstractServiceProvider;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * Class ControllerServiceProvider
 *
 * @package IzarFramework\Providers
 */
class ControllerServiceProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected $provides = [
            HomeController::class
        ];

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function register()
    {
        $this->getContainer()->add(HomeController::class)->addArgument(
            $this->getContainer()->get(View::class)
        );
    }
}