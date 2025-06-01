<?php
session_start();
$page_title = "Registration Form";
include("includes/header.php");
include("includes/navbar.php");
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php if (isset($_SESSION['status'])) : ?>
                    <div class="alert alert-info">
                        <h5><?= $_SESSION['status']; ?></h5>
                    </div>
                    <?php unset($_SESSION['status']); ?>
                <?php endif; ?>

                <div class="card shadow">
                    <div class="card-header">
                        <h5>Registration Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="form-group mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Phone</label>
                                <input type="number" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="register_btn" class="btn btn-primary">Register Now</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>
