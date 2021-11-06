<?php

namespace App\Managers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractManager 
{  

    protected $repository;

    /**
     * AbstractManager constructor.
     */
    public function __construct($repositoryName)
    {
        $this->repository = new $repositoryName();
    }

    public function index() {
        return $this->repository->paginate(10);
    }

    public function store($newMovie) {

        request()->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'rating' => 'required',
        ]);

        return $this->repository->store($newMovie);
    }

    public function destroy($movie) {
        return $this->repository->destroy($movie);
    }
    
    public function update($movie) {

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
