<?php
include 'db_connection.php';

$sql = "SELECT title, description, event_date, creation_date, modification_date 
        FROM blogs 
        WHERE privacy = 'public' 
        ORDER BY title ASC"; // Order alphabetically by title

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Alphabetical Blog Compilation</h1>";
    echo "<div class='blog-container'>";
    
    while($row = $result->fetch_assoc()) {
        echo "<div class='blog-entry'>";
        echo "<h2>" . $row['title'] . "</h2>";
        echo "<p><strong>Description:</strong> " . $row['description'] . "</p>";
        echo "<p><strong>Event Date:</strong> " . $row['event_date'] . "</p>";
        echo "<p><strong>Created on:</strong> " . $row['creation_date'] . "</p>";
        echo "<p><strong>Last Modified:</strong> " . $row['modification_date'] . "</p>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No public blogs available.";
}

$conn->close();
?>