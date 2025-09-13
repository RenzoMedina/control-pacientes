<?php  

namespace App\Services;

use Flight;
use Exception;
use App\Core\AppLog;
use App\Core\ErrorLog;
use App\Core\ServiceProvider;

class UserService extends ServiceProvider{
    public function loginUser($email, $field){
        try {
            $data =  $this->db->get('table_users',
            [
                '[><]table_roles' => ['role' => 'id']
            ],
            [
                'table_users.id',
                'table_users.email',
                'table_users.password',
                'table_roles.type'
            ],
            [
                'table_users.email' => $email
            ]

            );
            
            $id = $data['id'];
            $id_rol = $data['type'];
            $user = $data['email'];
            $password = $data['password']; 
            
            if (password_verify($field['password'],$password) && $user == $field['email']){
                AppLog::appLog("User {$email} logged in successfully.");
                return getToken( $id,$id_rol);
            }
            else{
                ErrorLog::errorsLog("401 -> Invalid login attempt for user: {$email}");
                Flight::jsonHalt([
                    "error"=>"Invalid username or password"
                ],401);
            }
        } catch (Exception $e) {
            ErrorLog::errorsLog("401 -> Invalid login attempt for user: {$email} - " . $e->getMessage());
            Flight::jsonHalt([
                    "error"=>"Invalid login",
                    "details"=>$e->getMessage()
                ],401);
            }
    }
}