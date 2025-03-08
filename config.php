<?php
require_once __DIR__.'/vendor/autoload.php';

use Dotenv\Dotenv;


$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$name = $_ENV['DB_NAME'];
$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASSWORD'];

try{
    $conn = new PDO('mysql:host='.$host.';dbname='.$name, $user, $pass);
    
} catch(PDOException $e){
    print_r($e);
}

?>