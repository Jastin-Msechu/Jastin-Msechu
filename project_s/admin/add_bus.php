<?php
session_start();

// Check if the user is an admin
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('Location: admin-dashboard.php'); // Redirect to login page or appropriate page
    exit;
}

require_once 'db.php';

if (isset($_POST['submit'])) {
    $bus_number = $_POST['bus_number'];
    $capacity = $_POST['capacity'];
    $route_name = $_POST['route_name'];

    $query = "INSERT INTO buses (bus_number, capacity, route_name) VALUES ('$bus_number', '$capacity', '$route_name')";
    $result = mysqli_query($con, $query);

    if ($result) {
        $_SESSION['success'] = "Bus added successfully.";
    } else {
        $_SESSION['error'] = "Failed to add bus.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bus</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="wrapper">
        <h2>Add Bus</h2>
        <?php
        if (isset($_SESSION['error'])) {
            echo "<p class='error'>{$_SESSION['error']}</p>";
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo "<p class='success'>{$_SESSION['success']}</p>";
            unset($_SESSION['success']);
        }
        ?>
        <form method="post">
            <div class="input-group">
                <input type="text" name="bus_number" placeholder="Bus Number" required>
            </div>
            <div class="input-group">
                <input type="number" name="capacity" placeholder="Capacity" required>
            </div>
            <div class="input-group">
                <input type="text" name="route_name" placeholder="Route Name" required>
            </div>
            <button type="submit" name="submit" class="btn">Add Bus</button>
        </form>
    </div>
</body>
</html>
