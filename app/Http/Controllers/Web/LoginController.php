<?php

namespace App\Http\Controllers\Web;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                if (Auth::user()->role===1) {
                    return redirect()->intended('/dashboard');
                }else{
                    return back()->with('loginError','Anda tidak memiliki hak akses untuk login');
                }

            }

        return back()->with('loginError','Login gagal');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
