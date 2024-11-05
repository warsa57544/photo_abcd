<?php
$host = 'localhost';
$user = 'root'; // Your MySQL username
$password = ''; // Your MySQL password (default is blank in XAMPP)
$dbname = 'photo_abcd'; // The correct database name

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>