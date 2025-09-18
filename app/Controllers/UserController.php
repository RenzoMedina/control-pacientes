<?php

namespace App\Controllers;

use Flight;
use Exception;
use App\Core\AppLog;
use App\Models\Role;
use App\Models\User;
use App\Core\ErrorLog;
use App\Services\UserService;

class UserController{

    public function index(){
        $user = Flight::get('user');
        $role = (new Role())->getAllRoles();
        $users = (new User())->getAll();
        Flight::render('dashboard/user', ['user' => $user, 'users'=>$users,'role'=>$role]);
    }
    public function login(){
        $user = Flight::request()->data['email'];
        $field = Flight::request()->data;
        $token = (new UserService())->loginUser($user,$field);
/*         Flight::json([
            "token"=>$token
        ]); */
        AppLog::appLog("User logged in with name: {$user}"); 
        if(!$token){
            Flight::redirect(  '/login');
            return;
        }
        setcookie('token', $token, time() + 3600, '/');
        Flight::redirect(  '/home');
    }
    public function validateProfile(){
        $heades = getallheaders();
        $auth = isset($heades['Authorization']) ? $heades['Authorization'] : null;

        if(!$auth ||!str_starts_with($auth, 'Bearer ') ){
            ErrorLog::errorsLog("401 -> Token not sent!!");
            Flight::jsonHalt([
            "error"=>"Token not sent!!",
            ],401);
           
        }
        $token = substr($auth,7);

        try{
            $decode = validatedToken($token,$_ENV['TOKEN']);
            Flight::json([
                "token"=>$token,
                "validated"=>true,
                "rol"=>$decode->rol
            ]);
            AppLog::appLog("Token validated successfully for user: {$decode->rol}");
        } catch(Exception $e){
            ErrorLog::errorsLog("401 Token invalid!!: " . $e->getMessage());
            Flight::jsonHalt([
                        "error"=>"Token invalid!!",
                        "details"=>$e->getMessage()
                ],500);
            
        }
    }

    public function store(){
       $data = Flight::request()->data;
        if(empty($data)){
            ErrorLog::errorsLog("400 -> No data provided for user creation");
            Flight::redirect('/home/users');
        }
        (new User())->createUser($data);
        Flight::redirect('/home/users');
 
    }

    public function show($id){
        $user = Flight::get('user');
        $userId = (new User())->getById($id);
        Flight::render('dashboard/userShow', ['user' => $user, 'userId'=>$userId]);
    }

}