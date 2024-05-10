<?php 
namespace App\Services;

use App\Repositories\SchoolRepository;

class SchoolService{
    protected $repository;

    public function __construct(SchoolRepository $repository)
    {
        $this->repository = $repository;
    }

    public function saveData($data)
    {
        $data['name'] = strtoupper($data['name']);
        return $this->repository->save($data);
    }

    public function updateData($data)
    { 
        $data['name'] = strtoupper($data['name']);
        return $this->repository->update($data);
    }

    public function getAll()
    {
        return $this->repository->readAll();
    }

    public function getAllPaginate()
    {
        return $this->repository->readPaginate();
    }

    public function getById($id)
    {
        return $this->repository->readById($id);
    }

    public function deleteById($id)
    {
        return $this->repository->delete($id);
    }
}