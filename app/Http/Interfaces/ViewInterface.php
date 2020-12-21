<?php

namespace IzarFramework\Http\Interfaces;

use Psr\Http\Message\ResponseInterface;

/**
 * Interface ViewInterface
 *
 * @package IzarFramework\Http\Interfaces
 */
interface ViewInterface
{
    /**
     * @param string $view
     * @param array $data
     * @return ResponseInterface
     */
    public function render(string $view, array $data = []) : ResponseInterface;
}