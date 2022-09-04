<?php
session_start();

error_reporting(0);
$title = "Login";
include('include/header.php');

// Code for User login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' and password='$password'");
    $num = mysqli_fetch_array($query);
    if ($num > 0) {
        // $extra = "my-cart.php";
        $_SESSION['login'] = $_POST['email'];
        $_SESSION['id'] = $num['id'];
        $_SESSION['username'] = $num['name'];

        echo "<script>alert('Login Successfully');location.href='index.php'</script>";
        exit();
    } else {
        // $email = $_POST['email'];
        echo "<script>alert('Invalid email id or Password');location.href='login.php'</script>";
        $_SESSION['errmsg'] = "Invalid email id or Password";
        exit();
    }
}

?>


<div class="container my-4">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-7 col-12">
            <form action="" method="POST">
                <h1 class="text-green">Login</h1>
                <div class="form-group mt-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="Email" name="email" placeholder="Email" required />
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                </div>
                <div class="form-group mt-1">
                    <label for="mes" class="float-end"><a href="forget-password.php" class="text-green text-decoration-none"> Forget Password ?</a></label>
                </div>
                <button class="btn btn-success mt-4" type="submit" name="login">Submit</button>

                <div class="form-group mt-3">
                    <label for="mes" class="float-start">Don't have an account? <a href="signup.php" class="text-green text-decoration-none ms-1">Sign up now</a></label>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>