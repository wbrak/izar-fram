<?php

namespace IzarFramework\Http\Middleware;

use IzarFramework\Http\Interfaces\ViewInterface;
use Jenssegers\Blade\Blade;
use Psr\Http\Message\ResponseInterface;

/**
 * Class View
 *
 * @package IzarFramework\Http\Middleware
 */
class View implements ViewInterface
{
    /**
     * @var Blade
     */
    protected Blade $view;

    /**
     * @var ResponseInterface
     */
    protected ResponseInterface $response;

    /**
     * Blade constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->view = new Blade(base_path('resources/views'), base_path('bootstrap/cache/views'));
        $this->response = $response;
    }

    /**
     * @param string $view
     * @param array $data
     * @return ResponseInterface
     */
    public function render(string $view, array $data = []) : ResponseInterface
    {
        $this->response->getBody()->write($this->view->render($view, $data));
        return $this->response;
    }
}