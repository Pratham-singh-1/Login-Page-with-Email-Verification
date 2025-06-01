<?php
session_start();
include("dbcon.php");

if (isset($_GET['token'])) {
    $token = mysqli_real_escape_string($con, $_GET['token']);

    $check_token_query = "SELECT verify_token, email_verified FROM users WHERE verify_token = '$token' LIMIT 1";
    $check_token_query_run = mysqli_query($con, $check_token_query);

    if (mysqli_num_rows($check_token_query_run) > 0) {
        $row = mysqli_fetch_array($check_token_query_run);
        
        if ($row['email_verified'] == 0) {
            $update_query = "UPDATE users SET email_verified = 1 WHERE verify_token = '$token' LIMIT 1";
            $update_query_run = mysqli_query($con, $update_query);

            if ($update_query_run) {
                $_SESSION['status'] = "Your email has been verified successfully. You can now log in.";
                header("Location: login.php");
                exit();
            } else {
                $_SESSION['status'] = "Verification failed. Please try again.";
                header("Location: register.php");
                exit();
            }
        } else {
            $_SESSION['status'] = "Email is already verified. Please log in.";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['status'] = "Invalid verification token.";
        header("Location: register.php");
        exit();
    }
} else {
    $_SESSION['status'] = "No token found.";
    header("Location: register.php");
    exit();
}
?>
