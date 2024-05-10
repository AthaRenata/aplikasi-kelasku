<?php 
namespace App\Repositories;

use App\Models\School;

class SchoolRepository{
    protected $model;

    public function __construct(School $model)
    {
        $this->model = $model;
    }

    public function save($data)
    {
       return $this->model::create($data);
    }

    public function update($data)
    {
        $user = $this->model::findOrFail($data['id'])
        ->update([
            'npsn' => $data['npsn'],
            'name' => $data['name']
        ]);

        return $user;
    }

    public function readAll()
    {
        return $this->model::orderBy('npsn')->get();
    }

    public function readPaginate()
    {
        return $this->model::latest()->paginate(10)->withQueryString();
    }

    public function readById($id)
    {
        return $this->model::find($id);
    }

    public function delete($id)
    {
        return $this->model::findOrFail($id)
                    ->delete();
    }
}