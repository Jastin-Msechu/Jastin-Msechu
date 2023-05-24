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
<?php
    require("db.php");
    
    $sqlSelect = "SELECT `id`, `name`, `email` FROM `users`;";
    $result = mysqli_query($con, $sqlSelect);
    if($result == true) {
        echo 
        "
        <table border='1px' class='table'>
        <caption>Users</caption>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        ";
        while($row = $result->fetch_assoc()) {
            echo 
            "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
             </tr>
            ";
        }
        echo "</table>";
    }
?>
<div class="nav">
    <a href="admin/admin-dashboard.php">Dashboard</a>
    <a  href="user-management.php">manage Users</a>
</div>

</body>
</html>