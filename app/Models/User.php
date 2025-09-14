<?php  

namespace App\Models;

use App\Core\Model;

class User extends Model{
    public function getAll(){
        try{
            $users= $this->db->select('table_users',['rut','name','last_name','email','role']);
            $results =[];
            foreach($users as $user){
                $roles = $this->db->select('table_roles',['type']);
                $results[]=[
                    'rut'=>$user['rut'],
                    'name'=>$user['name'],
                    'last_name'=>$user['last_name'],
                    'email'=>$user['email'],
                    'role'=>$roles[0] ?? 'user'
                ];
            }
            return $results;

        }catch(\Exception $e){
            throw $e;
        }
        /* return $this->db->select('table_users',[
            'rut','name','last_name','email','role'
        ]); */
    }
}