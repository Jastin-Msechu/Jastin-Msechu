<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

require_once 'db.php';

$user_id = $_SESSION['user_id'];

// Get user information from the database
$query = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);

// Get booking history for the user
$query = "SELECT * FROM booking WHERE user_id='$user_id'";
$result = mysqli_query($con, $query);
$booking = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<html>
    <body>  
    <div class="blob"></div>
        <div class="new-div">
    <link rel="stylesheet" href="styles.css">
<h1 class='welcome'>Welcome, <?php echo $user['name']; ?></h1>
<div class="names">
    <h2>Profile Information</h2>
    <p>Name: <?php echo $user['name']; ?></p>
    <p>Email: <?php echo $user['email']; ?></p>
</div>
<h2 class='booking'>Booking History</h2>
<?php if (!empty($booking)): ?>
    <table border='1px' class='table'>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Route</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($booking as $booking): ?>
                <tr>
                    <td><?php echo $booking['id']; ?></td>
                    <td><?php echo $booking['route']; ?></td>
                    <td><?php echo $booking['date']; ?></td>
                    <td><?php echo $booking['time']; ?></td>
                    <td><?php echo $booking['status']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No booking found.</p>
<?php endif; ?>
 <a href="bookings.php">Book Now!</a>

<h2 class='routes'>Routes Avalable</h2>
<table border='1px' class='table'>
    <tr>
        <th>Route Destination</th>
        <th>From Location</th>
        <th>To Location</th>
        <th>Deputure Time</th>
        <th>Araival Time</th>
        <th>Fare</th>
    </tr>

<?php
    $sqlSelect = "SELECT * FROM `route`;";
    $result = mysqli_query($con, $sqlSelect);
    if($result == true){
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['from_location']}</td>";
            echo "<td>{$row['to_location']}</td>";
            echo "<td>{$row['departure_time']}</td>";
            echo "<td>{$row['arrival_time']}</td>";
            echo "<td>{$row['fare']}</td>";
            echo "</tr>";
        }
    }
?>
</table>
<div class='resert-password'>
    <h2 class='routes'>Change Password</h2>
    <form method="post">
        <input type="password" name="current_password" placeholder="Current Password">
        <input type="password" name="new_password" placeholder="New Password">
        <input type="password" name="confirm_password" placeholder="Confirm Password">
        <button type="submit" name="submit">Change Password</button>
    </form>
</div>
<?php
if (isset($_POST['submit'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate current password
    if (!password_verify($current_password, $user['password'])) {
        $_SESSION['error'] = "Invalid current password";
    }

    // Validate new password
    if ($new_password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match";
    } elseif (strlen($new_password) < 8) {
        $_SESSION['error'] = "Password must be at least 8 characters";
    }

    if (!isset($_SESSION['error'])) {
        // Update password in the database
        $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
        $query = "UPDATE users SET password='$new_password_hash' WHERE id='$user_id'";
        $result = mysqli_query($con, $query);
        if ($result) {
            $_SESSION['success'] = "Password updated successfully";
        } else {
            $_SESSION['error'] = "Password update failed";
        }
    }

    header('Location: user-dashboard.php');
    exit;
}
?>
</div>
</body>
</html>