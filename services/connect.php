<?php


$env = parse_ini_file('.env');


$conn = new mysqli('127.0.0.1:3300', $env["DB_USER"], $env["DB_PASSWORD"], $env["DB_NAME"]);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}



// $conn = mysqli_connect($host, $user, $pass);
// if (!$conn) {
//     exit('Connection failed: '.mysqli_connect_error().PHP_EOL);
// }
 
// echo 'Successful database connection!'.PHP_EOL;