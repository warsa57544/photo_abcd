<?php
$servername = "localhost";
$username = "root";
$password = ""; // Update if necessary
$dbname = "photo_abcd"; // Update if necessary

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
