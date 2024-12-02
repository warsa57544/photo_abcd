<?php
// admin_dashboard.php
include 'config.php';
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Query to fetch the total number of blogs grouped by user
$query = "SELECT COUNT(*) as total_blogs, user_id FROM blogs GROUP BY user_id";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <div class="container">
        <h2>User Blog Statistics</h2>
        <div class="admin-stats">
            <?php
            if ($result && $result->num_rows > 0) {
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li>User ID: " . htmlspecialchars($row['user_id']) . " - Blogs Created: " . htmlspecialchars($row['total_blogs']) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No blog data available.</p>";
            }
            ?>
        </div>
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
