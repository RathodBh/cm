<?php
session_start();

error_reporting(0);
$title = "Forget Password";
include('include/header.php');

if (isset($_POST['change'])) {
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = md5($_POST['password']);

    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());

    $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' and contact='$contact'");
    $num = mysqli_fetch_array($query);
    if ($num > 0) {
        mysqli_query($con, "update users set password='$password', uDate = '$currentTime' WHERE email='$email' and contact='$contact' ");
        echo "<script>alert('Password Changed Successfully.. You can login now');location.href='login.php';</script>";
        $_SESSION['errmsg'] = "Password Changed Successfully";
        exit();
    } else {
        $extra = "forgot-password.php";
        echo "<script>alert('Invalid email id or Contact no');location.href='forget-password.php';</script>";
        $_SESSION['errmsg'] = "Invalid email id or Contact no";
        exit();
    }
}

?>


<div class="container my-4">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-7 col-12">
            <form action="" method="POST">
                <h1 class="text-green">Forget Password</h1>
                <div class="form-group mt-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="Email" name="email" placeholder="Email" required />
                </div>
                <div class="form-group mt-3">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" required />
                </div>

                <div class="form-group mt-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                </div>
                <button class="btn btn-success mt-4" type="submit" name="change">Submit</button>

                <div class="form-group mt-3">
                    <label for="mes" class="float-start"> <a href="login.php" class="text-green text-decoration-none ms-1">Login now</a></label>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>