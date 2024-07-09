<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Helpers\FCM;
use App\Models\User;

class NotificationController extends ApiController
{

    public function storeToken(Request $request)
    {
        User::find($request->userCredential['id'])
        ->update(['device_key'=>$request->input('token')]);
        return $this->sendMessage('Token successfully stored.');
    }

    public function send(Request $request)
    {
        $target = User::where("phone", $request->phone)->first();
        $deviceToken = $target->device_key;
        $title = "Notif Colek";
        $user = User::find($request->userCredential['id'])->get();
        $body = "$user->name mencolek Anda";

        $result = FCM::sendFCMNotification($deviceToken, $title, $body);

        if ($result === true) {
            return $this->sendSuccess($result,'Notification sent successfully');
        } else {
            return $this->sendBadRequest($result);
        }
    }
}

?>