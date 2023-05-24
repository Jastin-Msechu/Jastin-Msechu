<?php
session_start();
require_once 'db.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (md5($password) === $user['password']) { // Using md5 for password comparison
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            if($user['is_admin']) { // check if user is an admin
                $_SESSION['is_admin'] = true;
                header('Location: admin/admin-dashboard.php'); // redirect to admin dashboard
            } else {
                $_SESSION['is_admin'] = false;
                header('Location: user-dashboard.php'); // redirect to user dashboard
            }
            exit;
        } else {
            $_SESSION['error'] = "Invalid email or password";
        }
    } else {
        $_SESSION['error'] = "Invalid email or password";
    }
}
?>
<link rel="stylesheet" href="styles.css">
<div class="wrapper">
    <form method="post">
        <h2>Login</h2>
        <div class="input-group">
            <input type="email" name="email" placeholder="Enter your email">
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Enter your password">
        </div>
        <button type="submit" name="submit" class='btn'>Login</button>
    </form>
</div>

