<?php

namespace App\Models;

use Error;
use App\Core\Model;
use App\Core\AppLog;
use App\Core\ErrorLog;

class Role extends Model {
    
    public function getAllRoles(){
        AppLog::appLog("Fetching all roles from database");
        return $this->db->select('table_roles', ['id', 'type','status']);
    }
    public function createRole($data){
        try {
            $this->db->insert('table_roles', [
                'type'=>$data
            ]);
            $roleid = $this->db->id();
            AppLog::appLog("Creating new role with data: " . json_encode($data));
            return $roleid;
        } catch (\Exception $e) {
            ErrorLog::errorsLog("Error creating role: " . $e->getMessage());
        }
    }
}