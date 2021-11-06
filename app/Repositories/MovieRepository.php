<?php

namespace App\Repositories;

use App\Models\Movie;

class MovieRepository extends AbstractRepository
{

    protected $entityName = "Movie";

    /**
     * CategoryRepository constructor.
     */
    public function __construct()
    {
        parent::__construct($this->entityName);
    }

    public function paginate($limit)
    {
        return $this->entityModel::paginate($limit);
    }

    public function store($newMovie)
    {
        return $this->entityModel::create($newMovie);
    }

    public function destroy($movie)
    {
        return $this->entityModel::where('id', $movie->id)->delete();
    }

    public function update($movie, $updatedData)
    {
        return $this->entityModel::where('id', $movie->id)->update($updatedData);
    }
}
