<?php
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

// SWAGGER REDIRECT ROUTE
$router->get('/', function () {
    return redirect("api/v1/documentation");
});

// AUTH ROUTES
$router->group([
    'prefix' => 'api/v1/auth',
], function ($router) {
    $router->post('/login', 'AuthController@login');
    $router->post('/register', 'AuthController@register');
    $router->post('/guest-register', 'AuthController@guestRegister');
    $router->post('/register-confirm', 'AuthController@registerConfirm');
});


// NORMAL ROUTES(No Token Required)
// $router->group([
//     'prefix' => 'api/v1/',
// ], function ($router) {
//     $router->get('/init', 'InitController@getInitData');
// });

// TOKEN REQUIRED ROUTES
$router->group([
    "prefix" => "api/v1/",
    "middleware" => "jwt",
    ], function($router){
        $router->get('/me', 'CustomerController@me');
        $router->post('/customers/update', 'CustomerController@update');
        $router->post('/customers/logout', 'AuthController@logout');
        $router->patch('/customers/update-password', 'AuthController@updatePassword');
    }
);


$router->get('/deneme', function() {
    echo "deneme";
});
