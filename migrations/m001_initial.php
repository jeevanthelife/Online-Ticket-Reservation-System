<?php

use App\Core\Application;

class m001_initial
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            gender VARCHAR(1),
            email VARCHAR(255) NOT NULL,
            phone VARCHAR(255),
            username VARCHAR(255) NOT NULL,
            status TINYINT NOT NULL,
            role TINYINT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE users;";
        $db->pdo->exec($SQL);
    }
}

