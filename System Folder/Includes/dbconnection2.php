<?php
// DB credentials and this name of the database 
// define('DB_HOST', 'HAHAHHA');
// define('DB_USER', 'admin');
// define('DB_PASS', '');
// define('DB_NAME', 'famsmadb');
// define('DB_PORT', 3308);

// // Establish the database connection
// try {
//     $dbh = new PDO("mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));


//     $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Optional: Set the PDO error mode to exception
//     echo "Connected to the " . DB_NAME . " database successfully!";
// } catch (PDOException $e) {
//     exit("Error: " . $e->getMessage());
// }


$host = 'localhost';
$db   = 'famsmadb';
$user = 'root';
$pass = '';
$port = "3308";
$charset = 'utf8mb4';

$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
$pdo = new \PDO($dsn, $user, $pass, $options);
