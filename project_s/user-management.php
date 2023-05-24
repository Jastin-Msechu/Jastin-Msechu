<?php
    require ("db.php");

    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $columnToEdit = $_POST['column-to-edit'];
        $newValue = $_POST['new-value'];

        $sqlUpdate = "UPDATE `users` SET `$columnToEdit`='$newValue' WHERE `id`='$id';";
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
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="blob"></div>
    <div class="wrapper">
        <form action="user-management.php" method="POST">
            <h2>Manage Users</h2>
            <div class="input-group">
                <input type="number" name="id" id="" placeholder="Id">
            </div>
            <div class="input-group">
                <select name="column-to-edit" id="">
                    <option>Column to Edit</option>
                    <option value="name">Name</option>
                    <option value="email">Email</option>
                    <option value="password">password</option>
                </select>
            </div>
            <div class="input-group">
                <input type="text" name="new-value" id="" placeholder="New Value">
            </div>
            <button type="submit" class="btn" name="submit">Submit</button>

        </form>
    </div>
    <div class="nav">
        <a href="admin/dashboard.php">Dashboard</a>
        <a href="view-users.php">Back</a>
    </div>

</body>
</html>