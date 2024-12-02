<?php
// dashboard.php
include 'config.php';
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: register_login.php");
    exit();
}

$user_email = $_SESSION['user_email'];

// Fetch blogs created by the logged-in user
$stmt = $conn->prepare("SELECT * FROM blogs WHERE user_email = ?");
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result = $stmt->get_result();

// Display the user's blogs
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>My Blogs</h1>
    </header>
    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            echo "<div class='blog-container'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='blog-entry'>";
                echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
                echo "<p>" . htmlspecialchars(substr($row['description'], 0, 150)) . "...</p>";
                echo "<small><strong>Date of Event:</strong> " . htmlspecialchars($row['event_date']) . "</small><br>";
                echo "<a href='view_public_blogs.php?id=" . $row['blog_id'] . "' class='btn'>Read More</a>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p>You have not created any blogs yet. <a href='create_blog.php'>Create one now!</a></p>";
        }
        ?>
    </div>
    <footer>
        <p>&copy; 2024 Blog Dashboard. All rights reserved.</p>
    </footer>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>
