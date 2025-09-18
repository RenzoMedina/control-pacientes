<?php 

namespace App\Middleware;

use Flight;
use App\Core\AppLog;
use App\Core\ErrorLog;

class AuthMiddleware{
     public function before($params){
            $auth = Flight::request()->header('Authorization');
            //AppLog::appLog("Authorization header received: " . $auth);
            if ($auth && str_starts_with($auth, 'Bearer ')) {
                $token = trim(substr($auth, 7));
            } else {
                $token = $_COOKIE['token'] ?? null;
            }

            if (!$token) {
                ErrorLog::errorsLog("Empty token received");
                Flight::redirect('/login');
                die;
                /* Flight::jsonHalt([
                    "error" => "Empty token"
                ], 401); */
            }
            /* if(!$auth){
                ErrorLog::errorsLog("Empty token received");
                Flight::jsonHalt([
                    "error"=>"Empty token"
                ], 401);
            }
            $token = trim(str_replace('Bearer',"",$auth)); */
            $admin = validatedToken($token, $_ENV['TOKEN']);

            if ($admin->rol != "Administrador"){
                ErrorLog::errorsLog("Access denied. Admin privileges required for user: {$admin->name}");
                Flight::jsonHalt([
                    "error"=>"Access denied. Admin privileges required"
                ], 401);
            }
            
    }
}