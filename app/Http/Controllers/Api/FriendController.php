<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = User::select('id','photo','name','school_id')
        ->where('id', '!=', $request->userCredential['id'])
        ->where('role', '!=', 1)
        ->get();

        return $this->sendSuccess($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::select('photo','name','phone','school_id')
        ->find($id)
        ->where('role', '!=', 1)
        ->first();
        return $this->sendSuccess($data);
    }
    
}
