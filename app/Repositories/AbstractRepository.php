<?php

namespace App\Repositories;

abstract class AbstractRepository
{
    protected $model;

    /**
     * AbstractRepository constructor.
     */
    public function __construct($modelName)
    {
        $this->model = new $modelName();
    }

    public function paginate($limit)
    {
        return $this->model::paginate($limit);
    }

    public function store($newMovie)
    {
        return $this->model::create($newMovie);
    }

    public function destroy($movie)
    {
        return $this->model::where('id', $movie->id)->delete();
    }

    public function update($movie, $updatedData)
    {
        return $this->model::where('id', $movie->id)->update($updatedData);
    }
}
