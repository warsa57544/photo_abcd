<?php
include 'db_connect.php'; // Make sure db_connect.php has the correct database connection

// Retrieve search parameters
$search_letter = isset($_GET['letter']) ? $_GET['letter'] : '';
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

// Initialize the query with the privacy filter
$query = "SELECT * FROM blogs WHERE privacy = 'public'";

// Add letter search if specified
if ($search_letter) {
    $query .= " AND title LIKE '" . $conn->real_escape_string($search_letter) . "%'";
}

// Add date range filter if both dates are provided
if ($start_date && $end_date) {
    $query .= " AND event_date BETWEEN '" . $conn->real_escape_string($start_date) . "' AND '" . $conn->real_escape_string($end_date) . "'";
}

// Execute the query
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
        echo "<p>" . htmlspecialchars($row['description']) . "</p>";
        echo "<p><strong>Date of Event:</strong> " . htmlspecialchars($row['event_date']) . "</p>";
        echo "</div>";
    }
} else {
    echo "No results found.";
}

$conn->close();
?>
