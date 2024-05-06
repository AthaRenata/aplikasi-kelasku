<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = School::select('id','npsn','name')
        ->orderBy('name')
        ->get();

        return $this->sendSuccess($data);
    }
}
