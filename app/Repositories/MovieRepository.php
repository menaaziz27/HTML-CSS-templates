<?php

namespace App\Repositories;

use App\Models\Movie;

class MovieRepository extends AbstractRepository
{

  public function __construct()
  {
      parent::__construct(Movie::class);
  }
}
