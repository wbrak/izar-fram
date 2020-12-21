<?php

namespace IzarFramework\Http\Middleware;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Class Auth
 *
 * @package IzarFramework\Http\Middleware
 */
class Auth implements MiddlewareInterface
{
    /**
     * @var Session
     */
    protected Session $session;

    /**
     * Auth constructor.
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = new Response();
        if (!$this->session->get('user')) {
            return $response
                ->withStatus(302)
                ->withHeader('Location', '/');
        }
    }
}