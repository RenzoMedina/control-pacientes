<?php 

namespace AppMiddleware;

use Flight;
use App\Core\ErrorLog;

class TokenMiddleware{
    public function before($params){
            $auth = Flight::request()->header('Authorization');
            if(!$auth){
                ErrorLog::errorsLog("Empty token received");
                Flight::jsonHalt([
                    "error"=>"Empty token"
                    ], 401);
                }
                $token = trim(str_replace('Bearer',"",$auth));
                validatedToken($token, $_ENV['TOKEN']);
        }
}