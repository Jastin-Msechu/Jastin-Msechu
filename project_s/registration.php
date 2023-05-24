<?php
session_start();
require_once 'db.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $query = "INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
    $result = mysqli_query($con, $query);
    if ($result) {
        $_SESSION['success'] = "Registration successful";
        header('Location: index.php');
        exit;
    } else {
        echo "<p class='success'>Registration failed</p>";
    }
}
?>
<link rel="stylesheet" href="styles.css">
<div class="blob"></div>
<div class="wrapper">
    <form method="post">
        <h2>Registration</h2>
        <div class="input-group">
            <input type="text" name="name" placeholder="Enter your name">
        </div>
        <div class="input-group">
            <input type="email" name="email" placeholder="Enter your email">
        </div>
        <div class="input-group">
            <input type="password" name="password" placeholder="Enter your password">
        </div>
        <button type="submit" name="submit" class='btn'>Register</button>
    </form>
</div>