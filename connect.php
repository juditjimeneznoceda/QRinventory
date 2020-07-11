<?php

// $host="127.0.0.1";
// $user="root";
// $pass="root";
// $db="db667088276";

$host="db5000274950.hosting-data.io";
$user="dbu448476";
$pass="M3d1t3rr@n30";
$db="dbs268356";

$mysqli = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset( $mysqli, 'utf8');
if (!$mysqli) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


?>