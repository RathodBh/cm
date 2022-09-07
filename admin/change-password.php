<?php

session_start();
$title="Update Password";
include('include/header.php');

date_default_timezone_set('Asia/Kolkata'); // change according timezone
$currentTime = date('d-m-Y h:i:s A', time());


if (isset($_POST['submit'])) {
    $sql = mysqli_query($con, "SELECT password FROM  admin where password='" . md5($_POST['cpass']) . "' && username='" . $_SESSION['alogin'] . "'");
    $num = mysqli_fetch_array($sql);
    if ($num > 0) {
        $con = mysqli_query($con, "update admin set password='" . md5($_POST['password']) . "', udate='$currentTime' where username='" . $_SESSION['alogin'] . "'");

        echo "<script>alert('Password Changed Successfully !!');</script>";
    } else {
        echo "<script>alert('Old Password not match !!');</script>";
    }
}
?>
<div class="container my-4">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-7 col-12">
            <form action="" method="POST">
                <h1 class="text-green">Change Password</h1>
                <div class="form-group mt-3">
                    <label for="cpass" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Current Password" required />
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                </div>
                <button class="btn btn-success mt-4" type="submit" name="submit">Submit</button>

                <!-- <div class="form-group mt-3">
                    <label for="mes" class="float-start">Don't have an account? <a href="signup.php" class="text-green text-decoration-none ms-1">Sign up now</a></label>
                </div> -->
            </form>
        </div>
    </div>
</div>

<?php
include('include/footer.php');
?>