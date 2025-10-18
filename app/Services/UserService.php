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
                'table_users.name',
                'table_users.email',
                'table_users.password',
                'table_roles.type'
            ],
            [
                'table_users.email' => $email
            ]

            );
            
            $id_rol = $data['type'];
            $id = $data['id'];
            $user = $data['email'];
            $password = $data['password']; 
            $userName= $data['name'];
            
            if (password_verify($field['password'],$password) && $user == $field['email']){
                AppLog::appLog("User {$email} logged in successfully.");
                return getToken( $id_rol,$id, $userName, $user);
            }
            else{
                ErrorLog::errorsLog("401 -> Invalid login attempt for user: {$email}");
                Flight::redirect('/login');
                /* return null;
                Flight::jsonHalt([
                    "error"=>"Invalid username or password"
                ],401);  */
            }
            } catch (Exception $e) {
            ErrorLog::errorsLog("401 -> Invalid login attempt for user: {$email} - " . $e->getMessage());
             Flight::redirect('/login');
/*                 return null;
             Flight::jsonHalt([
                    "error"=>"Invalid login",
                    "details"=>$e->getMessage()
                ],401);  */
            }
    }
}