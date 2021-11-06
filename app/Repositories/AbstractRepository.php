<?php

namespace App\Repositories;

abstract class AbstractRepository
{
    protected $entityName;
    protected $entityModel;

    /**
     * BaseRepository constructor.
     * @param string $entityModel
     */
    public function __construct( string $entityModel )
    {
        if(empty($this->entityName))
        {
            throw new \RuntimeException(
                get_class($this) . '::$entityModel is not found'
            );
        }
        $this->entityName = 'App\\Models\\'.$entityModel;
        $this->entityModel = new $this->entityName();
    }
}
