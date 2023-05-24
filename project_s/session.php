<?php
if($user['is_admin']) { // check if user is an admin
                $_SESSION['is_admin'] = true;
                header('Location: admin-dashboard.php'); // redirect to admin dashboard
            } else {
                $_SESSION['is_admin'] = false;
                header('Location: user-dashboard.php'); // redirect to user dashboard
            }
?>