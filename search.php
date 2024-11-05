<?php
include 'db_connect.php'; // Ensure this line is correct and matches the location of db_connect.php

// Your existing code to handle the search and filter
$search_letter = isset($_GET['letter']) ? $_GET['letter'] : '';
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

// Example query execution
$query = "SELECT * FROM blogs WHERE 1=1";

if ($search_letter) {
    $query .= " AND title LIKE '$search_letter%'";
}
if ($start_date && $end_date) {
    $query .= " AND event_date BETWEEN '$start_date' AND '$end_date'";
}

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h2>" . $row['title'] . "</h2>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<p><strong>Date of Event:</strong> " . $row['event_date'] . "</p>";
        echo "</div>";
    }
} else {
    echo "No results found.";
}

$conn->close();
?>
