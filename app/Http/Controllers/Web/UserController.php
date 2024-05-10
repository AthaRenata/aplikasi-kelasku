<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Services\SchoolService;

class UserController extends Controller
{
    private $service;
    private $serviceSchool;


    public function __construct(UserService $service, SchoolService $serviceSchool)
    {
        $this->service = $service;
        $this->serviceSchool = $serviceSchool;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index',[
            'admins' => $this->service->getAllAdmins(),
            'students' => $this->service->getAllStudents()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create',[
            'schools' => $this->serviceSchool->getAll()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->role == 1) {
            $validatedData = $request->validate([
                'role'=>'required',
                'name'=>'required',
                'email'=>'required|unique:users,email',
                'password'=>'required',
                'photo'=>'nullable',
            ]);

        }else if ($request->role == 2){
            $validatedData = $request->validate([
                'role'=>'required',
                'name'=>'required',
                'school_id'=>'required',
                'phone'=>'required|unique:users,phone',
                'password'=>'required',
                'photo'=>'nullable',
            ]);

        }

        $this->service->saveData($validatedData);

        return redirect('/users')->with('success',"Pengguna <strong>$request->name</strong> berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',[
            'user' => $this->service->getById($user->id),
            'schools' => $this->serviceSchool->getAll()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->merge(['role' => $user->role]);
        
        if ($user->role == 1) {
        $validatedData = $request->validate([
            'name'=>'required',
            'email'=>['required',Rule::unique('users')->ignore($user->id)],
            'password'=>'nullable',
            'photo' => 'nullable',
            'role'=>'required',
        ]);

        }else if ($user->role == 2) {
            $validatedData = $request->validate([
            'name'=>'required',
            'school_id'=>'required',
            'phone'=>['required',Rule::unique('users')->ignore($user->id)],
            'password'=>'nullable',
            'photo' => 'nullable',
            'role'=>'required',
        ]);
        }
        $validatedData['id'] = $user->id;

        $this->service->updateData($validatedData);

        return redirect('/users')->with('success',"Pengguna <strong>$request->name</strong> berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->service->deleteById($user->id);

        return redirect('/users')->with('success',"Pengguna <strong>$user->email</strong> berhasil dihapus");
    }
}
