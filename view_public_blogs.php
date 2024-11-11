<?php
include 'config.php';

echo "<h1>Public Blogs</h1>";

// Query to fetch blogs that are marked as 'public'
$result = $conn->query("SELECT * FROM blogs WHERE privacy = 'public' ORDER BY date_of_event");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
        echo "<p>" . htmlspecialchars($row['description']) . "</p>";
        echo "<p>Date of Event: " . htmlspecialchars($row['date_of_event']) . "</p>";
        echo "<hr>";
    }
} else {
    echo "<p>No public blogs available.</p>";
}

$conn->close();
?>
