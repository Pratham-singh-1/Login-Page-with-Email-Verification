<?php
session_start();
if (!isset($_SESSION['auth'])) {
    $_SESSION['status'] = "Login to access dashboard";
    header("Location: login.php");
    exit();
}

include("includes/header.php");
include("includes/navbar.php");
?>

<div class="container py-5">
    <h2>Welcome, <?= $_SESSION['auth_user']['name'] ?>!</h2>
    <p>Email: <?= $_SESSION['auth_user']['email'] ?></p>
    <a href="logout.php" class="btn btn-danger">Logout</a>
</div>

<?php include("includes/footer.php"); ?>
