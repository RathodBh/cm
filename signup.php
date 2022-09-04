<?php
session_start();

error_reporting(0);
$title = "SignUp";
include('include/header.php');

include('includes/config.php');
// Code user Registration
if (isset($_POST['submit'])) {
    $name = $_POST['fullname'];
    $email = $_POST['emailid'];
    $contact = $_POST['contact'];
    $password = md5($_POST['password']);


    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());

    $query = mysqli_query($con, "insert into users(name,email,contact,password,regDate) values('$name','$email','$contact','$password','$currentTime')");
    if ($query) {
        echo "<script>alert('You are successfully register');location.href='index.php';</script>";
    } else {
        echo "<script>alert('Not register something went wrong');</script>";
    }
}
?>

<div class="container my-4">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-7 col-12">
            <form action="" method="POST">
                <h1 class="text-green">Sign Up</h1>
                <div class="form-group mt-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="fullname" placeholder="Name" required />
                </div>
                <div class="form-group mt-3">
                    <label for="Mobile" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="Mobile" name="contact" placeholder="Contact Number" required />
                </div>
                <div class="form-group mt-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="Email" name="emailid" placeholder="Email" onBlur="userAvailability()" required />
                    <span id="user-availability-status1"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />

                </div>
                <!-- <div class="form-group mt-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" placeholder="Address" class="form-control" required></textarea>
                </div> -->
                <button class="btn btn-success mt-4" type="submit" name="submit" id="submit">Submit</button>

                <div class="form-group mt-3">
                    <label for="mes" class="float-start">Already have an account? <a href="login.php" class="text-green text-decoration-none ms-1">Login now</a></label>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>

<script>
    function userAvailability() {
        // $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'email=' + $("#email").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status1").html(data);
                // $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
</script>