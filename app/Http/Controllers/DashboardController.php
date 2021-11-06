<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Managers\MoviesManager;

class DashboardController extends Controller
{
    protected $movieManager;

    /**
     * MoviesManager constructor.
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
