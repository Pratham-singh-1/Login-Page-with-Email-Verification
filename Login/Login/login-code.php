<?php
session_start();
include("dbcon.php");

if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];

    $login_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $user = mysqli_fetch_array($login_query_run);

        if ($user['email_verified'] == 1) {
            if ($user['password'] == $password) { // ⚠️ Use hashed passwords in production
                $_SESSION['auth'] = true;
                $_SESSION['auth_user'] = [
                    'name' => $user['name'],
                    'email' => $user['email']
                ];
                $_SESSION['status'] = "Login successful!";
                header("Location: dashboard.php");
                exit();
            } else {
                $_SESSION['status'] = "Invalid password!";
                header("Location: login.php");
                exit();
            }
        } else {
            $_SESSION['status'] = "Please verify your email before logging in.";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['status'] = "Invalid Email!";
        header("Location: login.php");
        exit();
    }
}
?>
