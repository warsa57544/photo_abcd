<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog Search</title>
</head>
<body>
    <h1>Search Blogs</h1>
    <form action="search.php" method="get">
        <label for="letter">Search by Letter:</label>
        <input type="text" id="letter" name="letter" maxlength="1"><br><br>

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date"><br><br>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date"><br><br>

        <input type="submit" value="Search">
    </form>
</body>
</html>
