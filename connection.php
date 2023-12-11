<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'zms';

$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Escape user input for security
//$username = mysqli_real_escape_string($conn, $_POST['username']);

?>
