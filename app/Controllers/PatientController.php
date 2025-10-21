<?php 

namespace App\Controllers;

use App\Models\Patient;
use App\Services\PatientService;
use Flight;
use App\Core\ErrorLog;

class PatientController{
    
    public function index(){
        $user = Flight::get('user');
        Flight::render('dashboard/clients', ['user' => $user]);
    }
    public function store(){
        session_start();
        $data = Flight::request()->data;
        if(empty($data)){
            ErrorLog::errorsLog("400 -> No data provided for user creation");
            Flight::redirect('/home');
        }
        (new Patient())->create($data);
        Flight::redirect('/home/clients/?success-client');
    }

    public function show(){
        $user = Flight::get('user');
        $limit = Flight::request()->query['limit'] ?? 8;    
        $offset = Flight::request()->query['offset'] ?? 0;
        $client= (new Patient())->getAll((int)$limit, (int)$offset);

        Flight::render('dashboard/clientShow', [
            'user' => $user,  
            'client' => $client['data'],
            'pagination'=>$client['pagination']
        ]);
    
    }

    public function addReportClinical(){
        $user = Flight::get('user');
        $client= (new PatientService())->getData();
        Flight::render('dashboard/reportsclinical', ['user' => $user,  'client' => $client]);

    }

    public function storeReportClinical(){
        $data=Flight::request()->data;
        $user = Flight::get('user');
        $id_report = (new PatientService())->createReportClinical($data);
        Flight::render('dashboard/reportsclinicaldetails', ['user' => $user,  'id_report' => $id_report]);
    }

    public function storeDetailReport(){
        $data= Flight::request()->data;
        $user = Flight::get('user');
        $details = Flight::request()->data['detailmedic'];
        $vitals = Flight::request()->data['vitals'];
        $intake = Flight::request()->data['ingesta'];
        $expense = Flight::request()->data['egreso'];
        $ohters = Flight::request()->data['indicaciones'];

        (new PatientService())->createDetailsClinical($details, $data['id_patient']);
        (new PatientService())->createVitalSigns($vitals, $data['id_report']);
        (new PatientService())->createIntakeControl($intake, $data['id_report']);
        (new PatientService())->createExpenseControl($expense, $data['id_report']);
        (new PatientService())->createOtherInstructions($ohters, $data['id_report']);
        $limit = Flight::request()->query['limit'] ?? 8;
        $offset = Flight::request()->query['offset'] ?? 0;
        $client= (new PatientService())->getAllReport((int) $limit, (int)$offset);
        Flight::render('dashboard/reportShow', [
            'user' => $user,  
            'client' => $client['data'],
            'pagination'=>$client['pagination']
        ]);
    }

    public function listDetails(){
        $user = Flight::get('user');
        $limit = Flight::request()->query['limit'] ?? 8;
        $offset = Flight::request()->query['offset'] ?? 0;
        $client= (new PatientService())->getAllReport((int) $limit, (int)$offset);
        Flight::render('dashboard/reportShow', [
            'user' => $user,  
            'client' => $client['data'],
            'pagination'=>$client['pagination']
        ]);
    }
}
