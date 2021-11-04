<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MoviesController extends Controller
{
    public function MovieDetails(Movie $movie)
    {
        return view("movies.details", ["movie" => $movie]);
    }

    public function getAdd() 
    {
        return view("movies.add");
    }


    public function store(Request $request) 
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'rate' => 'required',
        ]);

        Movie::create([
            "name" => request("name"),
            "description" => request("description"),
            "rating" => intval(request("rate"))
        ]);

        // $content = $request->all();
        // dd($content);
        return redirect('/dashboard');

    }

    public function edit(Movie $movie)
    {
        return view("movies.edit", ["movie" => $movie]);
    }

    public function update(Movie $movie) 
    {
        $movie->update([
            "name" => request('name'),
            "description" => request('description'),
            "rating" => intval(request("rate"))
        ]);

        return redirect("/dashboard");
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect("/dashboard");
    }
}
