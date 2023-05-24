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
    <div class="wrapper change-width">
        <form action="route.php" method='post'>
            <h3>Add Routes</h3>
            <div class="input-group">
                <input type="text" name='routename' placeholder='Route Name'>
            </div>

            <div class="input-group">
                <input type="text" name='fromlocation' placeholder='from Location'>
            </div>

            <div class="input-group">
                <input type="text" name='tolocation' placeholder='to Location'>
            </div>
            <div class="input-group">
                <input type="time" name='deputuretime' placeholder='Deputure Time'>
            </div>
            <div class="input-group">
                <input type="time" name='araivaltime' placeholder='Araival Time'>
            </div>
            <div class="input-group">
                <input type="number" name='fare' placeholder='Fare'>
            </div>
            <button class="btn" type="submit" name='submit'>Submit</button>
            <div></div>
        </form>
    </div>
    <a class="edit-routes" href="admin/darshboard.html">Dashboard</a>
<a class="edit-routes back" href="admin/routes-shedules.php">Back</a>
<a class="edit-routes add" href="admin/edit-routes.php">Edit Routes</a>
</body>
</html>

<?php
    require("db.php");

    if (isset($_POST['submit'])){        
        $routeName = $_POST['routename'];
        $fromLocation = $_POST['fromlocation'];
        $tolocation = $_POST['tolocation'];
        $deputuretime = $_POST['deputuretime'];
        $araivaltime = $_POST['araivaltime'];
        $fare = $_POST['fare'];



        $sqlinsert = "INSERT INTO `route`(`name`, `from_location`, `to_location`, `departure_time`, `arrival_time`, `fare`) VALUES ('$routeName','$fromLocation','$tolocation','$deputuretime','$araivaltime','$fare');";
        $result = mysqli_query($con, $sqlinsert);
        if($result == true) {
            echo "<p class='success success-long-width'>successful</p>";
        }
        else{
            echo "<p class='success success-long-width'>failed</p>";
        }


    }

    


?>