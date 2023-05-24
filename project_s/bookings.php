<?php
session_start();
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="blob"></div>
    <div class="wrapper bookings-height">
<form action="bookings.php" method='post'>
    <h3>Booking</h3>
    <div class="input-group">
        <select name='bus_name'>
            <option>Bus Name</option>
            <option value="name1">name</option>
            <option value="name2">name</option>
            <option value="name3">name</option>
            <option value="name4">name</option>
        </select>
    </div>
    <div class="input-group">
        <select name='bus_number'>
            <option>Bus Number</option>
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
        </select>
    </div>
        <?php
            require ("db.php");
            $sql = "SELECT `name` FROM `route`;";
            $results = mysqli_query($con, $sql);
            echo 
            "
            <div class='input-group'>
            <select name='route'>
            <option>Route</option>
            ";
            if($results == true){
                while($row = $results->fetch_assoc()){
                    echo "<option value='{$row['name']}'>{$row['name']}</option>";
                }
            }
            echo "</select>
            </div>";

            require ("db.php");
            $sql = "SELECT `from_location` FROM `route`;";
            $results = mysqli_query($con, $sql);
            echo 
            "
            <div class='input-group'>
            <select name='fromLocation'>
            <option>From Location</option>
            ";
            if($results == true){
                while($row = $results->fetch_assoc()){
                    echo "<option value='{$row['from_location']}'>{$row['from_location']}</option>";
                }
            }
            echo "</select>
            </div>";

            require ("db.php");
            $sql = "SELECT `to_location` FROM `route`;";
            $results = mysqli_query($con, $sql);
            echo 
            "
            <div class='input-group'>
            <select name='tolocation'>
            <option>Destination</option>
            ";
            if($results == true){
                while($row = $results->fetch_assoc()){
                    echo "<option value='{$row['to_location']}'>{$row['to_location']}</option>";
                }
            }
            echo "</select>
            </div>";
        ?>

    
    <div class='input-group'>
        <input type="date" name='date' placeholder='Date'>
    </div>
    <div class="input-group">
        <input type="time" name='deputuretime' placeholder='Deputure Time'>
    </div>
    
    <div class="input-group">
        <select name='status'>
            <option>Status</option>
            <option value="Confirmed">Confirmed</option>
            <option value="Pending">Pending</option>
        </select>
    </div>
    <button type="submit" name='submit' class='btn'>Submit</button>
</form>
</div>
    <!-- <a class="edit-routes" href="admin/darshboard.html">Dashboard</a> -->

</body>
</html>

<?php 
    require ("db.php");

    if(isset($_POST['submit'])){
        $bus_name = $_POST['bus_name'];
        $bus_number = $_POST['bus_number'];
        $name = $_POST['route'];
        $fromLocation = $_POST['fromLocation'];
        $tolocation = $_POST['tolocation'];
        $date = $_POST['date'];
        $status = $_POST['status']; 
        $deputuretime = $_POST['deputuretime']; 
        $status = $_POST['status']; 

        // echo $bus_name.$bus_number.$name.$fromLocation.$tolocation.$date.$status.$deputuretime.$status;

        $email = $_SESSION['email'];
        $sqlid = "SELECT `id` FROM `users` WHERE `email`='$email';";
        $result = mysqli_query($con, $sqlid);
        $idData = $result->fetch_assoc();
        $user_id = $idData['id'];

        $sql = "INSERT INTO `booking`(`bus_name`, `bus_number`, `user_id`, `route`, `date`, `time`, `from_location`, `to_destination`, `status`) VALUES ('$bus_name', '$bus_number', '$user_id', '$name','$date','$deputuretime', '$fromLocation', '$tolocation', '$status');";
        $result = mysqli_query($con, $sql);
        if ($result == true){
            echo "<p class='success success-long-width'>successful</p>";
        }           
        else{
            echo "<p class='success success-long-width'>failed</p>";
        }
    }
?>
