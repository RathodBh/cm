<?php
session_start();

error_reporting(0);
$title = "Track Orders";
include('include/header.php');


// date_default_timezone_set('Asia/Kolkata'); // change according timezone
// $currentTime = date('d-m-Y h:i:s A', time());

// if (isset($_POST['submit'])) {
//     $sql = mysqli_query($con, "SELECT password FROM  users where password='" . md5($_POST['cpass']) . "' && id='" . $_SESSION['id'] . "'");
//     $num = mysqli_fetch_array($sql);
//     if ($num > 0) {
//         $con = mysqli_query($con, "update users set password='" . md5($_POST['pass']) . "', uDate='$currentTime' where id='" . $_SESSION['id'] . "'");
//         echo "<script>alert('Password Changed Successfully !!');</script>";
//     } else {
//         echo "<script>alert('Something went wrong!!');</script>";
//     }
// }

?>


<div class="container my-4">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-7 col-12">
            <form method="POST" action="order-details.php">
                <h1 class="text-green">Track Order</h1>
                <p class="text-secondary">Please enter your Order ID in the box below and press Enter. This was given to you on your receipt and in the confirmation email you should have received.</p>
                <div class="form-group mt-3">
                    <label for="orderid" class="form-label">Order ID</label>
                    <input type="text" class="form-control" id="orderid" name="orderid" placeholder="Order ID" required />
                </div>
                <div class="form-group mt-3">
                    <label for="email" class="form-label">Registered email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required />
                </div>
                <button class="btn btn-success mt-4" type="submit" name="submit">Submit</button>

            </form>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>