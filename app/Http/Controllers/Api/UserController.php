<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = User::select('photo','name','phone','school_id')
        ->find($request->userCredential['id']);

        return $this->sendSuccess($data);
    }

    public function showProfile(Request $request)
    {
        $data = User::select('photo','name','school_id')
        ->find($request->userCredential['id']);

        return $this->sendSuccess($data);
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'school_id' => 'required',
            'photo' => 'nullable'
        ]);

        if ($validator->fails()) {
            return $this->sendBadRequest($validator->messages());
        }

        if($request->photo == null){
            User::findOrFail($request->userCredential['id'])
            ->update([
                'name'=>$request->name,
                'school_id'=>$request->school_id
            ]);

        }else{
            $dataunlink = User::find($request->userCredential['id'])->photo;
            if ($dataunlink != null) {
                $unlinkimg = substr($dataunlink,strpos($dataunlink,'/')+1);
                Storage::delete($unlinkimg);
            }
            $upload = Storage::put('image',$request->photo);
            $photo = "storage/{$upload}";

            User::findOrFail($request->userCredential['id'])
                ->update([
                    'name'=>$request->name,
                    'school_id'=>$request->school_id,
                    'photo'=>$photo
                ]);
        }

            return $this->sendMessage("Profil berhasil diubah");
        
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
            'new_password_confirmation' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendBadRequest($validator->messages());
        }

        $current_password = User::find($request->userCredential['id'])->password;

        if (!Hash::check($request->old_password, $current_password)) {
            return $this->sendBadRequest("Password lama tidak valid");
        }

        User::findOrFail($request->userCredential['id'])
        ->update(['password'=>Hash::make($request->new_password)]);

        return $this->sendMessage("Password berhasil diubah");
    }

}
