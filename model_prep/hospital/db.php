<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "covid19";

$con = new mysqli($host, $user, $password, $database);

if ($con->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
}
?>