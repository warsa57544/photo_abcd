<?php
include 'config.php'; // Use config.php for consistent database configuration

// Query to fetch public blogs sorted alphabetically by title
$sql = "SELECT title, description, event_date, creation_date, modification_date 
        FROM blogs 
        WHERE privacy_flag = 0 
        ORDER BY title ASC"; // Order alphabetically by title

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alphabetical Blog Compilation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Alphabetical Blog Compilation</h1>
    </header>
    <div class="container">
        <?php
        if ($result && $result->num_rows > 0) {
            echo "<div class='blog-container'>";
            
            while ($row = $result->fetch_assoc()) {
                echo "<div class='blog-entry'>";
                echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
                echo "<p><strong>Description:</strong> " . htmlspecialchars($row['description']) . "</p>";
                echo "<p><strong>Event Date:</strong> " . htmlspecialchars($row['event_date']) . "</p>";
                echo "<p><strong>Created on:</strong> " . htmlspecialchars($row['creation_date']) . "</p>";
                echo "<p><strong>Last Modified:</strong> " . htmlspecialchars($row['modification_date']) . "</p>";
                echo "</div>";
            }
            
            echo "</div>";
        } else {
            echo "<p>No public blogs available.</p>";
        }
        ?>
    </div>
    <footer>
        <p>&copy; 2024 Blog Dashboard. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
