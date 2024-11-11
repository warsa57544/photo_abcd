<?php
$servername = "localhost";
$username = "root";
$password = ""; // Update if needed
$dbname = "photo_abcd"; // Use your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
