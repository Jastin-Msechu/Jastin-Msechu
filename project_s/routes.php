<?php
// Check if user is logged in as admin
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }

// Connect to database
require_once('db.php');

// Handle form submissions
if (isset($_POST['add_route'])) {
    $route_name = mysqli_real_escape_string($conn, $_POST['route_name']);
    $route_desc = mysqli_real_escape_string($conn, $_POST['route_desc']);

    // Insert route into database
    $sql = "INSERT INTO routes (route_name, route_desc) VALUES ('$route_name', '$route_desc')";
    if (mysqli_query($conn, $sql)) {
        header("Location: routes.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
 else if (isset($_POST['update_route'])) {
    $route_id = mysqli_real_escape_string($conn, $_POST['route_id']);
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
} else if (isset($_POST['delete_route'])) {
    $route_id = mysqli_real_escape_string($conn, $_POST['route_id']);

    // Delete route from database
    $sql = "DELETE FROM routes WHERE route_id=$route_id";
    if (mysqli_query($conn, $sql)) {
        header("Location: routes.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

//Get all routes from database
$sql = "SELECT * FROM routes";
$result = mysqli_query($conn, $sql);

// Close database connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Bus Routes</title>
</head>
<body>
    <h1>Bus Routes</h1>
    
    <!-- Add Route Form -->
    <h2>Add Route</h2>
    <form method="POST">
        <label for="route_name">Route Name:</label>
        <input type="text" name="route_name" required>
        <br>
        <label for="route_desc">Route Description:</label>
        <textarea name="route_desc" required></textarea>
        <br>
        <button type="submit" name="add_route">Add Route</button>
    </form>
    
    <!-- List of Routes -->
    <h2>List of Routes</h2>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <h3><?php echo $row['route_name']; ?></h3>
        <p><?php echo $row['route_desc']; ?></p>
        <form method="POST" >
            <input type="hidden" name="route_id" value="<?php echo $row['route_id']; ?>">
            <button type="submit" name="delete_route">Delete Route</button>
        </form>
        <button onclick="location.href='edit_route.php?id=<?php echo $row['route_id']; ?>'">Edit Route</button>
    <?php } ?>
</body>
</html>
