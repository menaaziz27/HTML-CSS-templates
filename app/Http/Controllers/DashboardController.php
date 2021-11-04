<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class DashboardController extends Controller
{
    public function index () 
    {
        $movies = Movie::all();

        return view("dashboard", ["movies" => $movies]);
    }
}
