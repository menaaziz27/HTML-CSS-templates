<?php

namespace App\Repositories;

// this should be abstract
abstract class AbstractRepository
{
    protected $model;

    /**
     * PostManager constructor.
     */
    public function __construct($modelName)
    {
        $this->model = new $modelName();
    }


    public function paginate($limit)
    {
        return $this->model::paginate($limit);
        // return $this->model::all();
    }

    public function store($movie)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'rate' => 'required',
        ]);

        return $this->model::create([
            "name" => request("name"),
            "description" => request("description"),
            "rating" => intval(request("rate"))
        ]);
    }

    public function destroy($movie)
    {
        // return $this->model::destroy($movie);
        return $this->model::where('id', $movie->id)->delete();
    }

    public function update($request, $movie)
    {
        return $this->model::where('id', $movie->id)->update([
            "name" => request('name'),
            "description" => request('description'),
            "rating" => intval(request("rate"))
        ]);
    }
}
