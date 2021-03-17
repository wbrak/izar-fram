<?php

namespace IzarFramework\Http\Controllers;

use IzarFramework\Http\Interfaces\ViewInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class HomeController
 *
 * @package IzarFramework\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * HomeController constructor.
     *
     * @param ViewInterface $view
     */
    public function __construct(ViewInterface $view)
    {
        parent::__construct($view);
    }

    /**
     * @return ResponseInterface
     */
    public function index()
    {
        return $this->view->render('home');
    }
}