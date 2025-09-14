<?php 

use App\Controllers\UserController;
use App\Middleware\AuthMiddleware;
use App\Middleware\TokenMiddleware;

Flight::set('flight.views.path', './app/Views');

Flight::route('/', function(){
    Flight::render('home');
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
    Flight::route(" GET /users", function(){
        $user = Flight::get('user');
        Flight::render('dashboard/user', ['user' => $user]);
    });
    Flight::route(" GET /clients", function(){
        $user = Flight::get('user');
        Flight::render('dashboard/clients', ['user' => $user]);
    });
    Flight::route("POST /users", [UserController::class, 'createUser'])->addMiddleware([new AuthMiddleware()]);
    Flight::route(" GET /products", function(){
        $user = Flight::get('user');
        Flight::render('dashboard/products', ['user' => $user]);
    });
    Flight::route(" GET /reports", function(){
        $user = Flight::get('user');
        Flight::render('dashboard/reports', ['user' => $user]);
    });
    Flight::route(" GET /settings", function(){
        $user = Flight::get('user');
        Flight::render('dashboard/settings', ['user' => $user]);
    });
}, [new TokenMiddleware()]);

Flight::start();