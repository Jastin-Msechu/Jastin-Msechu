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
<?php
    require("../db.php");
    
    $sqlSelect = "SELECT `Id`, `name`, `from_location`, `to_location`, `departure_time`, `arrival_time`, `fare`, `created_at` FROM `route`;";
    $result = mysqli_query($con, $sqlSelect);
    if($result == true) {
        echo 
        "
        <table border='1px' class='table'>
        <caption>Routes and Schedules</caption>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>From Location</th>
            <th>To Location</th>
            <th>Departure Time</th>
            <th>Arrival Time</th>
            <th>Fare</th>
        </tr>
        ";
        while($row = $result->fetch_assoc()) {
            echo 
            "<tr>
                <td>{$row['Id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['from_location']}</td>
                <td>{$row['to_location']}</td>
                <td>{$row['departure_time']}</td>
                <td>{$row['arrival_time']}</td>
                <td>{$row['fare']}</td>
             </tr>
            ";
        }
        echo "</table>";
    }
?>
<div class="nav">
    <a href="admin-dashboard.php">Dashboard</a>
    <a href="../route.php">Add Routes</a>
    <a href="edit-routes.php">Edit Routes</a>
</div>

</body>
</html>