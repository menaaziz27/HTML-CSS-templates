<?php

namespace App\Repositories;

use App\Models\Movie;

class MovieRepository extends AbstractRepository
{

    protected $entityName = "Movie";

    /**
     * MovieRepository constructor.
     */
    public function __construct()
    {
        parent::__construct($this->entityName);
    }
}
