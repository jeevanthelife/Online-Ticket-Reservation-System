<?php

use App\Core\Application;

require_once __DIR__.'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



$config = [
    'db' => [
        'dsn' => $_SERVER['DB_DSN'],
        'user' => $_SERVER['DB_USER'],
        'pass' => $_SERVER['DB_PASS'], 
    ]
];

$app = new Application(__DIR__, $config);


$app->db->applyMigrations();

