<?php
// Check if user is logged in as admin
session_start();
require_once('session.php');
// if (!isset($_SESSION['admin_id'])) {
//     header("Location: index.php");
//     exit();
// }

// Connect to database
require_once('db.php');

// Handle form submission
if (isset($_POST['edit_schedule'])) {
    $schedule_id = mysqli_real_escape_string($conn, $_POST['schedule_id']);
    $route_id = mysqli_real_escape_string($conn, $_POST['route_id']);
    $bus_id = mysqli_real_escape_string($conn, $_POST['bus_id']);
    $dept_time = mysqli_real_escape_string($conn, $_POST['dept_time']);
    $arr_time = mysqli_real_escape_string($conn, $_POST['arr_time']);
    $fare = mysqli_real_escape_string($conn, $_POST['fare']);

    // Update schedule in database
    $sql = "UPDATE schedules SET route_id='$route_id', bus_id='$bus_id', dept_time='$dept_time', arr_time='$arr_time', fare='$fare' WHERE schedule_id='$schedule_id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: schedules.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Get schedule information from database
$schedule_id = mysqli_real_escape_string($conn, $_GET['schedule_id']);
$sql = "SELECT * FROM schedules WHERE schedule_id='$schedule_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Schedule</title>
</head>
<body>
<div class="blob"></div>
    <h1>Edit Schedule</h1>
    <form method="POST">
        <input type="hidden" name="schedule_id" value="<?php echo $row['schedule_id']; ?>">
        <label for="route_id">Route:</label>
        <select name="route_id" required>
            <?php
            // Get list of routes from database
            $sql = "SELECT * FROM routes";
            $result = mysqli_query($conn, $sql);
            while ($route = mysqli_fetch_assoc($result)) {
                $selected = ($route['route_id'] == $row['route_id']) ? 'selected' : '';
                echo "<option value='" . $route['route_id'] . "' " . $selected . ">" . $route['route_name'] . "</option>";
            }
            ?>
        </select>
        <br>
        <label for="bus_id">Bus:</label>
        <select name="bus_id" required>
            <?php
            // Get list of buses from database
            $sql = "SELECT * FROM buses";
            $result = mysqli_query($conn, $sql);
            while ($bus = mysqli_fetch_assoc($result)) {
                $selected = ($bus['bus_id'] == $row['bus_id']) ? 'selected' : '';
                echo "<option value='" . $bus['bus_id'] . "' " . $selected . ">" . $bus['bus_name'] . "</option>";
            }
            ?>
        </select>
        <br>
        <label for="dept_time">Departure Time:</label>
        <input type="datetime-local" name="dept_time" value="<?php echo date('Y-m-d\TH:i:s', strtotime($row['dept_time'])); ?>" required>
        <br>
        <label for="arr_time">Arrival Time:</label>
        <input type="datetime-local" name="arr_time" value="<?php echo date('Y-m-d\TH:i:s', strtotime($row['arr_time'])); ?>" required>
        <br>
        <label for="fare">Fare:</label>
        <input type="number" name="fare" value="<?php echo $row['fare']; ?>" required>
        <br>
        <input type="submit" name="edit_schedule" value="Update Schedule">
    </form>
</body>
</html>
