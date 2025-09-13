<?php 

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Core\ErrorLog;
use Firebase\JWT\ExpiredException;

/**
 * Summary of getToken with JWT
 * @param mixed $data
 * @param mixed $admin
 * @return string
 */
function getToken($admin, $name, $email){
    $now = strtotime("now");
    $key = trim($_ENV['TOKEN']);
    $payload = [
        'exp'=>$now + 3600,
        'rol'=>$admin,
        'name'=> $name,
        'email'=> $email
    ];
    $jwt = JWT::encode($payload, $key, 'HS256');
    return $jwt;
}

/**
 * Summary of validatedToken 
 * @param mixed $token
 * @param mixed $key
 * later validated return token
 */
function validatedToken($token,$key){
    try {
        $decodeJWT = JWT::decode($token, new Key($key, 'HS256'));
        return $decodeJWT;
    } catch (ExpiredException $e) {
        ErrorLog::errorsLog("401 - Expired token: " . $e->getMessage());
        Flight::jsonHalt([
            "error"=>"Expired token",
            "details"=>$e->getMessage()
        ],401);
    }catch(Exception $e) {
        ErrorLog::errorsLog("401 - Invalid token: " . $e->getMessage());
        Flight::jsonHalt([
            "error"=>"Invalid token",
            "details"=>$e->getMessage()
        ],401);
    }
}