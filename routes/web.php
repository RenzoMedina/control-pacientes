<?php 

use App\Controllers\PatientController;
use App\Controllers\RoleController;
use App\Controllers\UserController;
use App\Middleware\AuthMiddleware;
use App\Middleware\TokenMiddleware;

Flight::set('flight.views.path', './app/Views');

Flight::route('/', function(){
    Flight::render('home');
});
Flight::route("/about", function(){
    Flight::render("about");
});
Flight::route("/services", function(){
    Flight::render("services");
});
Flight::route("/contact", function(){
    Flight::render("contact");
});
Flight::route('/login', function(){
    Flight::render('login');
});

/**
 * ? login process
 */
Flight::route('POST /login-process', [UserController::class, 'login']);
Flight::route('GET /logout', function() {
    setcookie('token', '', time() - 3600, '/');
    Flight::redirect('/login');
});

/**
 * ? route not found or 404
 */
Flight::map('notFound', function(){
    Flight::render('404');
});

/**
 * ? start the framework
 */
Flight::group("/home", function(){

    Flight::route(" GET /", function(){
        $user = Flight::get('user');
        Flight::render('dashboard/home', ['user' => $user]);
    });
    /**
     * ? group routes of users
     */
    Flight::group("/users", function(){
        Flight::route(" GET /", [UserController::class, 'index']);
        Flight::route(" POST /", [UserController::class, 'store']);
        Flight::route("GET /@id", [UserController::class,'show']);
    },[new AuthMiddleware()]);

    /**
     * ? group routes of patients
     */
    Flight::group("/clients", function(){
        Flight::route(" GET /", [PatientController::class, 'index']);
        Flight::route("POST /", [PatientController::class, 'store']);
        Flight::route(" GET /list", [PatientController::class, 'show']);
    });

    Flight::route(" GET /products", function(){
        $user = Flight::get('user');
        Flight::render('dashboard/products', ['user' => $user]);
    });
    Flight::route(" GET /reports", function(){
        $user = Flight::get('user');
        Flight::render('dashboard/reports', ['user' => $user]);
    });
     /**
     * ? group routes of settings with role and preferences
     */
    Flight::group("/settings", function(){
            flight::route("POST /role", [RoleController::class, 'store']);
            Flight::route(" GET /", [RoleController::class, 'index']);
    },[new AuthMiddleware()]);
    
    /**
     * ? group routes of clinical reports
     */
    Flight::group("/reportsclinical", function(){
        Flight::route("GET /", [PatientController::class, 'addReportClinical']);
        Flight::route("POST /", [PatientController::class, 'storeReportClinical']);
        Flight::route("POST /detailsClinical",[PatientController::class, 'storeDetailReport']);
    });

}, [new TokenMiddleware()]);

Flight::start();