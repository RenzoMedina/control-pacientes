<?php 

use App\Controllers\UserController;
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
        Flight::render('dashboard/home');
    });
}, [new TokenMiddleware()]);

Flight::start();