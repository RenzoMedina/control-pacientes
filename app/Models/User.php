<?php  

namespace App\Models;

use App\Core\Model;
use App\Core\AppLog;
use App\Core\ErrorLog;
use App\Utils\Pagination;

class User extends Model{
    public function getAll(int $limit = 8, int $offset =0 ){
        try {
        
        $paginated = Pagination::paginate($this->db, 'table_users', $limit, $offset, "home/users");
        $users = $paginated['data'];
        $results = [];

       
        foreach ($users as $user) {
            $roles = $this->db->select('table_roles', ['type'], ['id' => $user['role']]);
            $results[] = [
                'id' => $user['id'],
                'rut' => $user['rut'],
                'name' => $user['name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'status' => $user['status'],
                'role' => $roles[0] ?? ['type' => 'Sin rol']
            ];
        }

        AppLog::appLog("Fetching paginated users from database");

        return [
            'data' => $results,
            'pagination' => $paginated['pagination']
        ];

        }catch(\Exception $e){
            ErrorLog::errorsLog("Error getAll user: " . $e->getMessage());
        }
    }

    public function createUser($data){
        try {
            $this->db->insert('table_users', [
                'rut'=>$data['rut'],
                'name'=>$data['name'],
                'last_name'=>$data['last_name'],
                'email'=>$data['email'],
                'role'=>$data['role'],
                'password'=>password_hash($data['password'], PASSWORD_BCRYPT)
            ]);
            $userId = $this->db->id();
            AppLog::appLog("Creating new user with data: " . json_encode([
                'id'=>$data['id'],
                'rut'=>$data['rut'],
                'name'=>$data['name'],
                'last_name'=>$data['last_name'],
                'email'=>$data['email'],
                'role'=>$data['role'],
                'password'=>password_hash($data['password'], PASSWORD_BCRYPT)
            ]));
            return $userId;
        } catch (\Exception $e) {
            ErrorLog::errorsLog("Error creating user: " . $e->getMessage());
        }
    }

    public function getById($id){
        try{
            $user= $this->db->get('table_users',['id','rut','name','last_name','email','role','status'],['id'=>$id]);
            if($user){
                $roles = $this->db->select('table_roles',['type'],['id'=>$user['role']]);
                $results=[
                    'id'=>$user['id'],
                    'rut'=>$user['rut'],
                    'name'=>$user['name'],
                    'last_name'=>$user['last_name'],
                    'email'=>$user['email'],
                    'status'=>$user['status'],
                    'role'=>$roles[0]
                ];
            }
            AppLog::appLog("Fetching all users by id from database");
            return $results;

        }catch(\Exception $e){
            ErrorLog::errorsLog("Error getById user: " . $e->getMessage());
        }
    }

}