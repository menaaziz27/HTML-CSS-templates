<?php

namespace App\Managers;

use App\Repositories\MovieRepository;
use Illuminate\Support\Facades\Auth;

class MoviesManager extends AbstractManager
{

    protected $repository ;

    /**
     * MoviesManager constructor.
     */
    public function __construct()
    {
        $this->repository = new MovieRepository();
    }

    public function index() 
    {
        return $this->repository->paginate(10);
    }

    public function store($newMovie) 
    {
        request()->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'rating' => 'required',
        ]);

        $user = Auth::user();

        return $this->repository->store(["user_id" => $user->id] + $newMovie);
    }

    public function destroy($movie) 
    {
        return $this->repository->destroy($movie);
    }
    
    public function update($movie) 
    {
        request()->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'rating' => 'required',
        ]);

        $updatedData = [
            "name" => request('name'),
            "description" => request('description'),
            "rating" => intval(request("rating"))
        ];

        return $this->repository->update($movie, $updatedData);
    }
}
