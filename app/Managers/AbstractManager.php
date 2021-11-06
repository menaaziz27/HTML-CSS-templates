<?php

namespace App\Managers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractManager 
{  

    protected $repository;

    /**
     * PostManager constructor.
     */
    public function __construct($repositoryName)
    {
        $this->repository = new $repositoryName();
    }

    public function index() {
        return $this->repository->paginate(10);
    }

    public function store($movie) {
        return $this->repository->store($movie);
    }

    public function create() {

    }

    public function destroy($movie) {
        return $this->repository->destroy($movie);
    }
    
    public function update($request, $movie) {
        return $this->repository->update($request, $movie);
    }
}
