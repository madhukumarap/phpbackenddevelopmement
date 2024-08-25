<?php 
use Doctrine\DBAL\DriverManager;
require_once '/vendor/autoload.php';
//..
$connectionParams = [
    'dbname' => 'my_db',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
];
$conn = DriverManager::getConnection($connectionParams);