<?php 

namespace App\Middleware;

use Flight;
use App\Core\ErrorLog;

class TokenMiddleware{
    public function before($params){
            $auth = Flight::request()->header('Authorization');
             if ($auth && str_starts_with($auth, 'Bearer ')) {
                $token = trim(substr($auth, 7));
            } else {
                $token = $_COOKIE['token'] ?? null;
            }

            if (!$token) {
                ErrorLog::errorsLog("Empty token received");
                Flight::redirect('/login');
                /* Flight::jsonHalt([
                    "error" => "Empty token"
                ], 401); */
            }
            //$token = trim(str_replace('Bearer',"",$auth));
            $user = validatedToken($token, $_ENV['TOKEN']);
            Flight::set('user', $user);
        }
}