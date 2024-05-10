<?php 
namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserService{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function saveData($data)
    {
        if (empty($data['photo'])) {
            unset($data['photo']);
        }else{
            $upload = Storage::put('image',$data['photo']);
            $data['photo'] = "storage/{$upload}";
        }
        
        $data['password'] = Hash::make($data['password']);
        return $this->repository->save($data);
    }

    public function updateData($data)
    { 
        if (empty($data['photo'])) {
            unset($data['photo']);
        }else{
            $dataunlink = $this->repository->readById($data['id']);
            $unlinkimg = substr($dataunlink['photo'],strpos($dataunlink['photo'],'/')+1);
            Storage::delete($unlinkimg);
            $upload = Storage::put('image',$data['photo']);
            $data['photo'] = "storage/{$upload}";
        }

        return $this->repository->update($data);
    }

    public function getAllAdmins()
    {
        return $this->repository->readPaginateAdmins();
    }

    public function getAllStudents()
    {
        return $this->repository->readPaginateStudents();
    }

    public function getById($id)
    {
        return $this->repository->readById($id);
    }

    public function deleteById($id)
    {
        $data = $this->repository->readById($id);
        $unlinkimg = substr($data['photo'],strpos($data['photo'],'/')+1);
        Storage::delete($unlinkimg);
        
        return $this->repository->delete($id);
    }
}