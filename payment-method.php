<?php
session_start();

error_reporting(0);
$title = "Track Order";
include('include/header.php');

if (!isset($_SESSION['login'])) {

    echo "<script>alert('You have to login first');location.href='login.php'</script>";
} else {
    if (isset($_POST['submit'])) {
        $mode = $_POST['mode'];
        $uid = $_SESSION['id'];
        mysqli_query($con, "update orders set payMode='$mode' where uid='$uid' and payMode is null");
        echo "<script>location.href='order-history.php';</script>";
    }
}
?>


<div class="container my-4">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-7 col-12 shadow p-3">
            <form action="" method="POST" action="">
                <h1 class="text-green">Payment Mode</h1>
                <p class="text-secondary">Select payment method</p>
                <div class="form-check mt-3">
                    <label for="mode1" class="form-label">Internet Banking</label>
                    <input type="radio" class="form-check-input" name="mode" id="mode1" value="Internet Banking" />
                </div>
                <div class="form-check mt-3">
                    <label for="mode2" class="form-label">Credit/Debit Card</label>
                    <input type="radio" class="form-check-input" name="mode" id="mode2" value="Credit/Debit Card" />
                </div>
                <div class="form-check mt-3">
                    <label for="mode3" class="form-label">Cash on Delivery</label>
                    <input type="radio" class="form-check-input" name="mode" id="mode3" value="Cash on Delivery" />
                </div>

                <button class="btn btn-success mt-4" type="submit" name="submit">Submit</button>

            </form>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>