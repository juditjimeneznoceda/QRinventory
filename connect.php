<?php


$host="localhost";
$user="root";
$pass="root";
$db="inventari";

$mysqli = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset( $mysqli, 'utf8');
if (!$mysqli) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


?>