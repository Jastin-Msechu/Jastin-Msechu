<?php

// Replace the database credentials with your own
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'online_bus_ticket';

// Connect to the database
$con = mysqli_connect($host, $user, $password, $db_name);

// Check if the connection was successful
if (!$con) {
    die('Connection failed: ' . mysqli_connect_error());
}

?>
