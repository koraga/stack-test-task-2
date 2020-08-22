<?php

namespace App\Core\Controllers;

use App\Core\View\View;

/**
 * Class HomeController
 * @package App\Core\Controllers
 */
class HomeController
{
    /**
     * @var View $view
     */
    protected View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * @return bool;
     */
    public function index()
    {
        $this->view->make('index');
        return true;
    }
}