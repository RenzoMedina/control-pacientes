<?php

namespace App\Controllers;

use Flight;
use App\Core\AppLog;
use App\Services\UserService;

class UserController{

    public function login(){
        $user = Flight::request()->data['email'];
        $field = Flight::request()->data;
        $token = (new UserService())->loginUser($user,$field);
        Flight::json([
            "token"=>$token,
        ]);
        AppLog::appLog("User logged in with name: {$user}"); 
    }
}