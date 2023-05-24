<?php
// Check if user is logged in as admin
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}

// Connect to database
require_once('db.php');

// Get route details
if (isset($_GET['id'])) {
    $route_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM routes WHERE route_id=$route_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: routes.php");
    exit();
}

// Handle form submission
if (isset($_POST['update_route'])) {
    $route_name = mysqli_real_escape_string($conn, $_POST['route_name']);
    $route_desc = mysqli_real_escape_string($conn, $_POST['route_desc']);

    // Update route in database
    $sql = "UPDATE routes SET route_name='$route_name', route_desc='$route_desc' WHERE route_id=$route_id";
    if (mysqli_query($conn, $sql)) {
        header("Location: routes.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Route</title>
</head>
<body>

<div class="blob"></div>

    <h1>Edit Route</h1>
    <form method="POST">
        <label for="route_name">Route Name:</label>
        <input type="text" name="route_name" value="<?php echo $row['route_name']; ?>" required>
        <br>
        <label for="route_desc">Route Description:</label>
        <textarea name="route_desc" required><?php echo $row['route_desc']; ?></textarea>
        <br>
        <button type="submit" name="update_route">Update Route</button>
    </form>
</body>
</html>
