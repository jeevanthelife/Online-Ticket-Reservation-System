<?php

use App\Controllers\SiteController;
use App\Controllers\AuthController;
use App\Core\Application;

require_once __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();



$config = [
    'userClass' => \App\Models\User::class,
    'db' => [
        'dsn' => $_SERVER['DB_DSN'],
        'user' => $_SERVER['DB_USER'],
        'pass' => $_SERVER['DB_PASS'], 
    ]
    ];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact',[SiteController::class, 'contact']);
$app->router->post('/contact',[SiteController::class, 'handleContact']);

$app->router->get('/login',[AuthController::class, 'login']);
$app->router->post('/login',[AuthController::class, 'login']);
$app->router->get('/register',[AuthController::class, 'register']);
$app->router->post('/register',[AuthController::class, 'register']);
$app->router->get('/logout',[AuthController::class, 'logout']);
$app->router->get('/adminLogout',[AuthController::class, 'adminLogout']);
$app->router->get('/profile',[AuthController::class, 'profile']);
$app->router->get('/admin',[AuthController::class, 'adminLogin']);
$app->router->post('/admin',[AuthController::class, 'adminLogin']);
$app->router->get('/dashboard',[AuthController::class, 'dashboard']);



$app->run();

