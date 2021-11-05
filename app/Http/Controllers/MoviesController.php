<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\MoviesManager;
use App\Models\Movie;

class MoviesController extends Controller
{

    protected $movieManager;

    /**
     * MoviesManager constructor.
     */
    public function __construct()
    {
        $this->movieManager = new MoviesManager();
    }
    
    public function index() 
    {
        $movies = $this->movieManager->index();
        return view("index", ["movies" => $movies]);
    }


    public function store(Request $request) 
    {
        $this->movieManager->store(request()->all());
        return redirect('/dashboard');
    }

    public function create() 
    {
        return view("movies.create");
    }

    public function destroy(Movie $movie)
    {
        $this->movieManager->destroy($movie);
        return redirect("/dashboard");
    }
    
    public function show(Movie $movie)
    {
        return view("movies.details", ["movie" => $movie]);
    }

    public function update(Request $request, Movie $movie) 
    {
        $this->movieManager->update($request, $movie);
        return redirect("/dashboard");
    }

    public function edit(Movie $movie)
    {
        return view("movies.edit", ["movie" => $movie]);
    }

}
