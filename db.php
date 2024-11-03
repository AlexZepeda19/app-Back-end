<?php 
$server = 'localhost';
$user = 'applwmka';
$pass = 'MUWYJYkZfQC';
$db = 'applwmka_apployment';

try {
    $pdo = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

?>