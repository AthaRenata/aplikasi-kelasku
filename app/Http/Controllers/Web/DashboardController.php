<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\SchoolService;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    private $serviceUser;
    private $serviceSchool;


    public function __construct(UserService $serviceUser, SchoolService $serviceSchool)
    {
        $this->serviceUser = $serviceUser;
        $this->serviceSchool = $serviceSchool;
    }

    public function index(){
        return view('admin.dashboard.index',[
            'admins' => $this->serviceUser->getAllAdmins()->total(),
            'students' => $this->serviceUser->getAllStudents()->total(),
            'schools' => $this->serviceSchool->getAllPaginate()->total()
        ]);
    }
}
