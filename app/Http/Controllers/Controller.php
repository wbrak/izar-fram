<?php

namespace IzarFramework\Http\Controllers;

use IzarFramework\Http\Interfaces\ViewInterface;

/**
 * Class Controller
 *
 * @package IzarFramework\Http\Controllers
 */
class Controller
{
    /**
     * @var ViewInterface
     */
    protected ViewInterface $view;

    /**
     * BaseController constructor.
     *
     * @param ViewInterface $view
     */
    public function __construct(ViewInterface $view)
    {
        $this->view = $view;
    }
}