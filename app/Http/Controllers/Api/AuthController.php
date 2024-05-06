<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Helpers\JwtToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Validator;

class AuthController extends ApiController
{
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'phone' => 'required',
            'password' => 'required',
        ]);
        $secretApiKey = $request->header('authorization');

        if($validator->fails()){
            return $this->sendBadRequest($validator->messages());
        }

        $credentials = $request->only('phone','password');

        if (Auth::attempt($credentials)) {
            if ($secretApiKey==config('services.api_secret_key')) {
                $token = JwtToken::setData([
                    'id' => Auth::user()->id,
                    'school_id' => Auth::user()->school_id,
                ])
                ->build();
                return $this->sendSuccess($token);
            }else{
                return $this->sendBadRequest("API key tidak valid");
            }
        }else{
            return $this->sendBadRequest("Login gagal");
        }

    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'phone' => 'required',
            'school_id' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendBadRequest($validator->messages());
        }

        User::create([
            'phone'=>preg_replace('/[^0-9]/', '', $request->phone),
            'password'=>Hash::make($request->password),
            'name'=>$request->name,
            'school_id'=>$request->school_id,
        ]);

        return $this->sendMessage("Berhasil registrasi");
    }

    public function logout(){
        JwtToken::blacklist();
        return $this->sendSuccess("Berhasil logout");
    }
}
