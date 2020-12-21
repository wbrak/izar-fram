<?php

namespace IzarFramework\Providers;

use IzarFramework\Http\Middleware\View;
use League\Container\ServiceProvider\AbstractServiceProvider;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * Class ViewServiceProvider
 *
 * @package IzarFramework\Providers
 */
class ViewServiceProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected array $provides = [
            View::class
        ];

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function register()
    {
        $this->getContainer()->add(View::class)->addArgument(
            $this->getContainer()->get('response')
        );
    }
}