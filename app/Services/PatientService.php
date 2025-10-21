<?php 

namespace App\Services;

use App\Core\ErrorLog;
use App\Core\ServiceProvider;
use App\Utils\Pagination;

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
            $id_patient = $data['id_patient'];

            return [
                'id_patient'=>$id_patient,
                'id_report'=>$id_report
            ]; 

        } catch (\Exception $e) {
            ErrorLog::errorsLog("Error creating clinical report: " . $e->getMessage());
        }
    }
    /**
     * Summary of createDetailsClinical
     * @param mixed $data
     * @param mixed $id
     * @return void
     */
    public function createDetailsClinical($data, $id){
        try {
            $this->db->insert('table_details_medicals',[
                'id_patient'=>$id,
                'gttd'=>$data['gttd'],
	            'sng'=>$data['sng'],
	            's_folley' =>$data['s_folley'],
	            'cit' =>$data['cit'],
            ]);
        } catch (\Exception $e) {
            ErrorLog::errorsLog("Error creating createDetailsClinical: " . $e->getMessage());
        }
    }
    /**
     * Summary of createVitalSigns
     * @param mixed $data
     * @param mixed $id
     * @return void
     */
    public function createVitalSigns($data, $id){
        try {
            $this->db->insert('table_vital_signs_report_of_patient',[
                'id_daily_report'=> $id,
                'schedule' => $data['date'],
                'blood_pressure' => $data['arterial'],
                'respiratory_rate' => $data['respiratoria'],
                'heart_rate' => $data['cardiaca'],
                'saturation' =>$data['saturacion'],
                'temperature' =>$data['temperatura'],
                'eva_flacc' =>$data['eva_flacc']
            ]);
        } catch (\Exception $e) {
            ErrorLog::errorsLog("Error creating createVitalSigns: " . $e->getMessage());
        }
    }
    /**
     * Summary of createIntakeControl
     * @param mixed $data
     * @param mixed $id
     * @return void
     */
    public function createIntakeControl($data, $id){
        try {
            $this->db->insert('table_intake_control_report_of_patient',[
                'id_daily_report'=> $id,
                'schedule' => $data['date'],
                'type_food' => $data['alimento'],
                'tolerance' => $data['tolerancia']
            ]);
        } catch (\Exception $e) {
            ErrorLog::errorsLog("Error creating createIntakeControl: " . $e->getMessage());
        }
    }
    /**
     * Summary of createExpenseControl
     * @param mixed $data
     * @param mixed $id
     * @return void
     */
    public function createExpenseControl($data, $id){
        try {
            $this->db->insert('table_expense_control_report_of_patient',[
                'id_daily_report'=> $id,
                'schedule' => $data['date'],
                'urine' => $data['orina'],
                'deposition' => $data['deposicion'],
                'others' => $data['otros']
            ]);
        } catch (\Exception $e) {
            ErrorLog::errorsLog("Error creating createExpenseControl: " . $e->getMessage());
        }
    }
    /**
     * Summary of createOtherInstructions
     * @param mixed $data
     * @param mixed $id
     * @return void
     */
    public function createOtherInstructions($data, $id){
         try {
            $this->db->insert('table_other_instructions_report_of_patient',[
                'id_daily_report'=> $id,
                'schedule' => $data['date'],
                'observations' => $data['frecuencia'],
                'frequency' => $data['observaciones']
            ]);
        } catch (\Exception $e) {
            ErrorLog::errorsLog("Error creating createOtherInstructions: " . $e->getMessage());
        }
    }

    public function getAllReport(int $limit = 8, int $offset = 0){
        try {
            
            $paginated = Pagination::paginate($this->db, 'table_daily_report_of_patient', $limit, $offset, '/reports');

            
            $data = array_map(function($report) {
                $patient = $this->db->get('table_patients', [
                    'rut',
                    'name',
                    'last_name'
                ], ['id' => $report['id_patient']]);

                $user = $this->db->get('table_users', [
                    'name'
                ], ['id' => $report['id_user']]);

                return array_merge($report, [
                    'patient_rut' => $patient['rut'] ?? null,
                    'patient_name' => $patient['name'] ?? null,
                    'patient_last_name' => $patient['last_name'] ?? null,
                    'user_name' => $user['name'] ?? null
                ]);
            }, $paginated['data']);

            
            $paginated['data'] = $data;

            return $paginated;
        } catch (\Exception $e) {
            ErrorLog::errorsLog("Error fetching patients: " . $e->getMessage());
        }
    }
}