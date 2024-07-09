<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Message;
use Kreait\Firebase\Messaging\Notification;

class FCM {
    // protected static $firebaseUrl = "https://fcm.googleapis.com/v1/projects/project1-5df9d/messages:send";
    // protected static $firebaseKey;

    // public function __construct() {
    //     self::$firebaseKey = config('services.firebase.oauth_key');
    // }

    // public static function to($deviceToken) {
    //     return [
    //         'message' => [
    //             'token' => $deviceToken
    //         ]
    //     ];
    // }

    // public static function notification($title, $body) {
    //     return [
    //         'notification' => [
    //             'title' => $title,
    //             'body' => $body
    //         ]
    //     ];
    // }

    // public static function send($data) {
    //     $firebaseKey = self::$firebaseKey;
    //     $firebaseUrl = self::$firebaseUrl;

    //     $response = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . $firebaseKey,
    //         'Content-Type' => 'application/json',
    //     ])->post($firebaseUrl, $data);

    //     return $response->json();
    // }

    public static function sendFCMNotification($deviceToken, $title, $body)
{
    $messaging = app('firebase.messaging');

    $message = CloudMessage::new()
        ->withNotification(Notification::create($title, $body))
        ->withTarget('token', $deviceToken);

    $messaging->send($message);
}
}

?>