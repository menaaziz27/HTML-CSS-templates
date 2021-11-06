<?php

namespace App\Repositories;

abstract class AbstractRepository
{
    protected $entityName;
    protected $entityModel;

    /**
     * AbstractRepository constructor.
     * @param string $entityModel
     */
    public function __construct(string $entityModel)
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

    public function paginate($limit)
    {
        return $this->entityModel::paginate($limit);
    }

    public function store($item)
    {
        return $this->entityModel::create($item);
    }

    public function destroy($item)
    {
        return $this->entityModel::where('id', $item->id)->delete();
    }

    public function update($item, $updatedData)
    {
        return $this->entityModel::where('id', $item->id)->update($updatedData);
    }
}
