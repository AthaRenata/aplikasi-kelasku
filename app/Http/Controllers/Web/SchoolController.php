<?php

namespace App\Http\Controllers\Web;

use App\Models\School;
use Illuminate\Http\Request;
use App\Services\SchoolService;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{
    private $service;

    public function __construct(SchoolService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.schools.index',[
            'schools' =>$this->service->getAllPaginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.schools.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'npsn'=>'required|digits:8|unique:schools,npsn',
            'name'=>'required',
        ]);

        $this->service->saveData($validatedData);

        return redirect('/schools')->with('success',"Sekolah <strong>$request->name</strong> berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        return view('admin.schools.edit',[
            'school' => $this->service->getById($school->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        
        $validatedData = $request->validate([
            'npsn'=>['required',Rule::unique('schools')->ignore($school->id)],
            'name'=>'required',
        ]);

        $validatedData['id'] = $school->id;

        $this->service->updateData($validatedData);

        return redirect('/schools')->with('success',"Sekolah <strong>$request->name</strong> berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        $this->service->deleteById($school->id);

        return redirect('/schools')->with('success',"Sekolah <strong>$school->name</strong> berhasil dihapus");
    }
}
