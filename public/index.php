<?php

use App\Controllers\SiteController;
use App\Controllers\AuthController;
use App\Core\Application;

require_once __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();



$config = [
    'db' => [
        'dsn' => $_SERVER['DB_DSN'],
        'user' => $_SERVER['DB_USER'],
        'pass' => $_SERVER['DB_PASS'], 
    ]
    ];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [new SiteController, 'home']);
$app->router->get('/contact',[new SiteController, 'contact']);
$app->router->post('/contact',[new SiteController, 'handleContact']);

$app->router->get('/login',[new AuthController, 'login']);
$app->router->post('/login',[new AuthController, 'login']);
$app->router->get('/register',[new AuthController, 'register']);
$app->router->post('/register',[new AuthController, 'register']);

$app->run();

