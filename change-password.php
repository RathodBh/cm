<?php
session_start();

error_reporting(0);
$title = "Change Password";
include('include/header.php');


date_default_timezone_set('Asia/Kolkata'); // change according timezone
$currentTime = date('d-m-Y h:i:s A', time());

if (isset($_POST['submit'])) {
    $sql = mysqli_query($con, "SELECT password FROM  users where password='" . md5($_POST['cpass']) . "' && id='" . $_SESSION['id'] . "'");
    $num = mysqli_fetch_array($sql);
    if ($num > 0) {
        $con = mysqli_query($con, "update users set password='" . md5($_POST['pass']) . "', uDate='$currentTime' where id='" . $_SESSION['id'] . "'");
        echo "<script>alert('Password Changed Successfully !!');</script>";
    } else {
        echo "<script>alert('Something went wrong!!');</script>";
    }
}

?>


<div class="container my-4">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-7 col-12">
            <form action="" method="POST">
                <h1 class="text-green">Change Password</h1>
                <div class="form-group mt-3">
                    <label for="cpass" class="form-label">Current password</label>
                    <input type="password" class="form-control" id="cpass" name="cpass" placeholder="current password" required />
                </div>
                <div class="form-group mt-3">
                    <label for="pass" class="form-label">New password</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="New password" required />
                </div>
                <button class="btn btn-success mt-4" type="submit" name="submit">Submit</button>

            </form>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>