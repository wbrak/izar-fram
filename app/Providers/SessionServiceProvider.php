<?php

namespace IzarFramework\Providers;

use IzarFramework\Http\Middleware\Session;
use League\Container\ServiceProvider\AbstractServiceProvider;

/**
 * Class SessionServiceProvider
 *
 * @package IzarFramework\Providers
 */
class SessionServiceProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected array $provides = [
            Session::class
        ];

    /**
     * @inheritDoc
     */
    public function register()
    {
        $this->getContainer()->add(Session::class);
    }
}