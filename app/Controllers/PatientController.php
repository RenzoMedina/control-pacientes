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
        Flight::redirect('/home/clients');
    }

    public function show(){
        $user = Flight::get('user');
        $client= (new Patient())->getAll();
        Flight::render('dashboard/clientShow', ['user' => $user,  'client' => $client]);
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
}
