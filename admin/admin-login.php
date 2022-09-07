<?php
session_start();
// error_reporting(0);
include("../include/config.php");
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' and password='$password'");
    $num = mysqli_fetch_array($query);
    if ($num > 0) {
        $_SESSION['alogin'] = $username;
        echo "<script>alert('Done');location.href='index.php'</script>";
        // exit();
    } else {
        $_SESSION['errmsg'] = "Invalid username or password";
        echo "<script>alert('Fail');location.href='admin-login.php'</script>";

        // exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css" />
</head>

<body>
    <div class="container my-4">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-7 col-12">
                <form action="" method="POST">
                    <h1 class="text-green">Admin Login</h1>
                    <div class="form-group mt-3">
                        <label for="Username" class="form-label">Username</label>
                        <input type="Username" class="form-control" id="Username" name="username" placeholder="Username" required />
                    </div>
                    <div class="form-group mt-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                    </div>
                    <div class="form-group mt-1">
                        <label for="mes" class="float-end"><a href="forget-password.php" class="text-green text-decoration-none"> Forget Password ?</a></label>
                    </div>
                    <button class="btn btn-success mt-4" type="submit" name="submit">Submit</button>

                    <div class="form-group mt-3">
                        <label for="mes" class="float-start">Don't have an account? <a href="signup.php" class="text-green text-decoration-none ms-1">Sign up now</a></label>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>