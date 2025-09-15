<?php 

namespace App\Controllers;

use App\Core\ErrorLog;
use App\Models\Role;
use Error;
use Flight;

class RoleController{

    public function index(){
        $user = Flight::get('user');
        $role = (new Role())->getAllRoles();
        Flight::render('dashboard/settings', ['user' => $user, 'role'=>$role]);
    }

    public function store(){
        $data = Flight::request()->data['type'];
        if(empty($data)){
            ErrorLog::errorsLog("400 -> No data provided for role creation");
            Flight::redirect('/home/settings');
        }
        (new Role())->createRole($data);
        Flight::redirect('/home/settings');
    }
}