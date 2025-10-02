<?php 

namespace App\Models;

use App\Core\Model;
use App\Core\AppLog;
use App\Core\ErrorLog;

class Patient extends Model{
    
    public function create($data){
        try {
            $this->db->insert('table_patients', [
                "rut"=>$data['rut'],
                "name"=>$data['name'],
                "last_name"=>$data['last_name'],
                "age"=>$data['age'],
                "weight"=>$data['weight'],
                "size"=>$data['size']
            ]);
            $userId = $this->db->id();
            AppLog::appLog("Creating new client patient with data: " . json_encode([
                "rut"=>$data['rut'],
                "name"=>$data['name'],
                "last_name"=>$data['last_name'],
                "age"=>$data['age'],
                "weight"=>$data['weight'],
                "size"=>$data['size']
            ]));
            return $userId;
        } catch (\Exception $e) {
            ErrorLog::errorsLog("Error creating client patient: " . $e->getMessage());
        }
    }

    public function getAll(){
        try {
            $patients = $this->db->select('table_patients', [
                "id",
                "rut",
                "name",
                "last_name",
                "age",
                "weight",
                "size"
            ],[
               "ORDER" => ["id" => "ASC"] 
            ]);
            return $patients;
        } catch (\Exception $e) {
            ErrorLog::errorsLog("Error fetching patients: " . $e->getMessage());
        }
    }
}