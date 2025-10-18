<?php 

namespace App\Services;

use App\Core\ErrorLog;
use App\Core\ServiceProvider;

class PatientService extends ServiceProvider{

    public function getData(){
        try {
            $patients = $this->db->select('table_patients', [
                "id",
                "name",
                "last_name",
            ],[
               "ORDER" => ["name" => "ASC"] 
            ]);
            return $patients;
        } catch (\Exception $e) {
            ErrorLog::errorsLog("Error fetching patients: " . $e->getMessage());
        }
    }

    public function createReportClinical($data){
        try {
            $this->db->insert('table_daily_report_of_patient',[
                'id_patient'=>$data['id_patient'],
                'id_user'=>$data['id_user']
            ]);
            $id_report = $this->db->id();
            return $id_report;
        } catch (\Exception $e) {
            ErrorLog::errorsLog("Error creating clinical report: " . $e->getMessage());
        }
    }
}