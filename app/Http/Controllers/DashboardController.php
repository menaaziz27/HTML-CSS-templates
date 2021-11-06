<?php

namespace App\Http\Controllers;

use App\Managers\MoviesManager;

class DashboardController extends Controller
{
    protected $movieManager;

    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->movieManager = new MoviesManager();
    }

    public function index () 
    {
        $movies = $this->movieManager->index();

        return view("dashboard", ["movies" => $movies]);
    }
}
