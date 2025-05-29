<?php 
$page_title = "Login Form";
include("includes/header.php");
include("includes/navbar.php"); 
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>
                            Login Form
                        </h5>
                        <div class="card-body">
                            <form action="">
                                <div class="form-group mb-3 ">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group mb-3 ">
                                    <label for="">email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group mb-3 ">
                                    <label for="">password</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group mb-3 ">
                                    <label for="">confirm password</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group mb-3 ">
                                    <label for="">Login now</label>
                                    <button type="submit"  class="btn btn-primary"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>