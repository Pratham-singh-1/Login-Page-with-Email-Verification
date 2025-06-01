<?php
session_start();
include("dbcon.php");
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendemail_verify($name, $email, $verify_token)
{
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = "smtp.gmail.com";
        $mail->SMTPAuth   = true;
        $mail->Username   = "ps.work.787@gmail.com"; // your email
        $mail->Password   = "ozwc pxho cder mnri";    // your App Password (not Gmail password)
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom("ps.work.787@gmail.com", "Job Portal");
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "Email Verification from Job Portal";

        $email_template = "
            <h2>You have registered with Login Page Assignment </h2>
            <h5>Verify your email address to login</h5>
            <a href='http://localhost/Login/verify-email.php?token=$verify_token'>Click Here to Verify</a>
        ";

        $mail->Body = $email_template;
        $mail->send();

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (isset($_POST["register_btn"])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $verify_token = md5(rand());

    // Check if email already exists
    $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['status'] = "Email already exists";
        header("Location: register.php");
        exit();
    } else {
        $query = "INSERT INTO users (name, phone, email, password, verify_token) 
                  VALUES ('$name', '$phone', '$email', '$password', '$verify_token')";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            sendemail_verify($name, $email, $verify_token);
            $_SESSION["status"] = "Registration successful! Please verify your email.";
            header("Location: register.php");
            exit();
        } else {
            $_SESSION["status"] = "Registration failed";
            header("Location: register.php");
            exit();
        }
    }
}
?>
