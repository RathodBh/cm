<?php
$title = "Product Info";
include("include/header.php");
session_start();
error_reporting(0);
$pid = intval($_GET['pid']);
$val = intval($_GET['val']);
if ($val == 1) {
    if (!isset($_SESSION['login'])) {
        echo "<script>alert('Please login first');location.href='login.php'</script>";
    } else {
        $uid = $_SESSION['id'];
        $sel = mysqli_query($con, "SELECT * from cart WHERE uid='$uid' and pid='$pid'");
        $num = mysqli_fetch_array($sel);
        if ($num > 0) {
            $cquantity = $num["quantity"] + 1;
            $up = "update cart set quantity='$cquantity' WHERE uid='$uid' and pid='$pid'";
            mysqli_query($con, $up);

            echo "<script>alert('Cart updated');location.href='my-cart.php';</script>";
            echo $cquantity . "<br>" . $num['quantity'] . "<br>" . $up;
        } else {
            $cquantity = 1;
            $query = mysqli_query($con, "insert into cart(uid,pid,quantity) values('$uid','$pid','$cquantity')");
            if ($query) {
                echo "<script>alert('Added to cart');location.href='my-cart.php';</script>";
            } else {
                echo "<script>alert('failed to add cart');</script>";
            }
        }
    }
}


$ret = mysqli_query($con, "select * from product where id='$pid'");
while ($row = mysqli_fetch_array($ret)) {

?>
    <form action="" method="POST">

        <div class="container my-4">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-4 col-md-4 col-sm-4 col-12 my-2">
                    <div class="img-container">
                        <img src="images/Canon Eos 550.png" alt="" class=" w-100">
                    </div>
                </div>
                <div class="col-lg-7col-md-7 col-sm-7 col-12">
                    <h4 class="text-green"><?= $row['brand']; ?></h1>
                        <h2 class="text-secondary"><?= $row['name']; ?></h2>
                        <p class="text-secondary"><?= $row['description']; ?></p>
                        <hr>
                        <h2 class="text-success">Rs. <?= $row['price']; ?> <span class="text-secondary h5 me-4"><s>Rs. <?= $row['crossPrice']; ?></s></span></h2>
                        <hr>
                        <a href="product-details.php?pid=<?php echo $row['id']; ?>&val=1" class="btn btn-outline-success me-4" type="submit">
                            <i class="fa fa-cart-plus me-2"></i>
                            Add to cart
                        </a>
                        <!-- <a href="wishlist.php" class="btn btn-secondary me-4">
                            <i class="fa fa-heart"></i>
                        </a> -->
                </div>
            </div>
        </div>

    </form>
<?php
}
include("popular_product.php");
include("include/footer.php");
?>