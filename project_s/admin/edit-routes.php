<?php
    require ("../db.php");

    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $columnToEdit = $_POST['column-to-edit'];
        $newValue = $_POST['new-value'];

        $sqlUpdate = "UPDATE `route` SET `$columnToEdit`='$newValue' WHERE `id`='$id';";
        $result = mysqli_query($con, $sqlUpdate);
        if ($result == true){
            echo "<p class='success'>successful</p>";
        }           
        else{
            echo "<p class='success'>failed</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="blob"></div>
    <div class="wrapper">
        <form action="edit-routes.php" method="POST">
            <h2>Edit Routes</h2>
            <div class="input-group">
                <input type="number" name="id" id="" placeholder="Id">
            </div>
            <div class="input-group">
                <select name="column-to-edit" id="">
                    <option>Column to Edit</option>
                    <option value="Id">Id</option>
                    <option value="name">Name</option>
                    <option value="from_location">From Location</option>
                    <option value="to_location">To Location</option>
                    <option value="departure_time">Depature Time</option>
                    <option value="arrival_time">Arrival Time</option>
                    <option value="fare">Fare</option>
                    <option value="created_at">Date </option>
                </select>
            </div>
            <div class="input-group">
                <input type="text" name="new-value" id="" placeholder="New Value">
            </div>
            <button type="submit" class="btn" name="submit">Submit</button>

        </form>
    </div>
    <a class="edit-routes" href="admin-dashboard.php">Dashboard</a>
    <a class="edit-routes back" href="routes-shedules.php">Back</a>
</body>
</html>