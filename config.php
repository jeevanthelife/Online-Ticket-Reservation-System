<?php
$host = 'localhost';
$user = '';
$pass = '';
$db = 'ticket_reservation_system';
//create connection
$conn = new mysqli($host, $user,$pass,$db);
if ($conn -> connect_error) {
    die ("Connection Failed: ".$conn -> connect_error);
}