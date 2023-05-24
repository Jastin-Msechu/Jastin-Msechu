<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body style="overflow: auto;">
<div class="blob"></div>

<div class="wrapper small-height">
    <form action="view-booking-history.php" method="post">
        <h3>Get user booking history</h3>
        <div class="input-group">
            <select name="email" id="">
                <?php 
                    require("../db.php");
                    $query = "SELECT `email` FROM `users`;";
                    $result = mysqli_query($con, $query);

                ?>
                <option>Email</option>
                <?php while ($email = $result->fetch_assoc()){ 
                    echo "
                        <option value={$email['email']}>{$email['email']}</option>
                    ";                    
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn" name="submit">Submit</button>
    </form>
</div>
    <a class="edit-routes" href="admin-dashboard.php">Dashboard</a>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];

    // Get user information from the database
    $query = "SELECT * FROM users WHERE `email`='$email'";
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_assoc($result);

    $user_id = $user['id'];

    // Get booking history for the user
    $query = "SELECT * FROM booking WHERE user_id='$user_id'";
    $result = mysqli_query($con, $query);
    $booking = mysqli_fetch_all($result, MYSQLI_ASSOC);

    ?>
        <div class="user-results">
        <link rel="stylesheet" href="styles.css">

    <h2>Profile Information</h2>
    <p>Name: <?php echo $user['name']; ?></p>
    <p>Email: <?php echo $user['email']; ?></p>

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
    <?php endif; 
}
    ?>