<?php

namespace App\Managers;

use App\Repositories\MovieRepository;

class MoviesManager extends AbstractManager
{
  public function __construct()
  {
    parent::__construct(MovieRepository::class);
  }
}
