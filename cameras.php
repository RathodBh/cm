<?php
$title = "Cameras";
include("include/header.php");
// session_start();
error_reporting(0);
//Add to cart process
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


?>

<div class="container my-4">
    <div class="row">
        <div class="col-lg-3 p-2">
            <!-- filter  -->
            <form action="" method="">
                <div class="filter">
                    <button type="button" class="btn btn-success w-100" data-bs-toggle="collapse" data-bs-target="#filter" aria-expanded="false" aria-controls="filter">Filter</button>
                    <div class="" id="filter">
                        <div class="card card-body">

                            <!-- Brand  -->
                            <button type="button" class="btn btn-primary w-100 mt-2" data-bs-toggle="collapse" data-bs-target="#sbrand" aria-expanded="false" aria-controls="sbrand">Brand</button>
                            <!-- <?php if (isset($_GET['price'])) { ?> style="display:none" <?php } ?> -->
                            <div class="collapse" id="sbrand">
                                <div class="card card-body">
                                    <?php
                                    $brandF = mysqli_query($con, "select DISTINCT * from product");

                                    foreach ($brandF as $b) {
                                        $checked = [];
                                        if (isset($_GET['brands'])) {
                                            $checked = $_GET['brands'];
                                        }

                                    ?>
                                        <div class="form-check">
                                            <input type="checkbox" name="brands[]" class="form-check-input" value="<?= $b['brand']; ?>" <?php if (in_array($b['brand'], $checked)) {
                                                                                                                                            echo "checked";
                                                                                                                                        }
                                                                                                                                        ?> />
                                            <label for="" class="form-check-label"><?= $b['brand'] ?></label>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>

                            <!-- price  -->
                            <button type="button" class="btn btn-primary w-100 mt-2" data-bs-toggle="collapse" data-bs-target="#sprice" aria-expanded="false" aria-controls="sprice">Price</button>
                            <!-- <?php if (isset($_GET['brands'])) { ?> style="display:none" <?php } ?> -->
                            <div class="collapse" id="sprice">
                                <div class="card card-body">
                                    <?php
                                    $prices = [];
                                    if (isset($_GET['price'])) {
                                        $prices = $_GET['price'];
                                    }
                                    // print_r($prices);
                                    ?>
                                    <div class="form-check">
                                        <input type="checkbox" name="price[]" class="form-check-input" value="0" <?php
                                                                                                                    if (in_array(0, $prices)) {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?> />
                                        <label for="" class="form-check-label">1000 to 5000</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="price[]" class="form-check-input" value="5000" <?php
                                                                                                                    if (in_array(5000, $prices)) {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?> />
                                        <label for="" class="form-check-label">5000 to 10000</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="price[]" class="form-check-input" value="10000" <?php
                                                                                                                        if (in_array(10000, $prices)) {
                                                                                                                            echo "checked";
                                                                                                                        }
                                                                                                                        ?> />
                                        <label for="" class="form-check-label">10000 or 15000</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="price[]" class="form-check-input" value="15000" <?php
                                                                                                                        if (in_array(15000, $prices)) {
                                                                                                                            echo "checked";
                                                                                                                        }
                                                                                                                        ?> />
                                        <label for="" class="form-check-label">15000 or more</label>
                                    </div>
                                </div>
                            </div>


                            <!-- Discount  -->
                            <!-- <button type="button" class="btn btn-primary w-100 mt-2" data-bs-toggle="collapse" data-bs-target="#sdiscount" aria-expanded="false" aria-controls="sdiscount">Discount</button>
                            <div class="collapse" id="sdiscount">
                                <div class="card card-body">
                                    <div class="form-check">
                                        <input type="checkbox" name="brand" class="form-check-input">
                                        <label for="" class="form-check-label"> upto 10% or more</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="brand" class="form-check-input">
                                        <label for="" class="form-check-label">upto 20% or more</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="brand" class="form-check-input">
                                        <label for="" class="form-check-label">30% or more</label>
                                    </div>
                                </div>
                            </div> -->

                            <button class="btn btn-success w-100 mt-3" type="submit" name="">SEARCH</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-9">
            <div class="row">
                <?php

                if (isset($_GET['search'])) {
                    $se = $_GET['search'];
                    $fil = mysqli_query($con, "select * from product WHERE name like'%$se%'");
                    while ($r = mysqli_fetch_array($fil)) {
                        $cprc++;
                ?>

                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-2">
                            <div class="p-4 ">
                                <a href="product-details.php?pid=<?= $r['id'] ?>" class="text-decoration-none">
                                    <img src="images/<?= ($r['img1']) ?>" alt="" class="pro-img mb-2">
                                    <span class="text-green"><?= $r["brand"] ?></span>
                                    <h6 class="text-secondary "><?= $r['name'] ?></h6>
                                </a>
                                <h6 class="text-green">Rs. <?= $r['price']; ?> <span class="text-secondary ms-3"><s>Rs. <?= $r['crossPrice'] ?></s></span></h6>


                                <?php if ($r['checkStatus'] == 'In Stock') { ?>
                                    <a href="cameras.php?pid=<?php echo $r['id']; ?>&val=1" class="btn btn-success"><i class="fa fa-cart-plus pe-2"></i> Add to cart</a>
                                <?php } else { ?>
                                    <a href="javascript:void(0)" class="btn btn-light btn-disabled text-danger">Out of stock</a>
                                <?php } ?>
                                <!-- <button class="btn btn-secondary ms-2"><i class="fa fa-heart"></i></button> -->

                            </div>
                        </div>
                        <?php
                    }
                    if ($cprc == 0) {
                        echo "<div class='col-lg-4 col-md-6 col-sm-6 col-12 p-2'><h5 class='text-green text-center'>No Cameras found</h5></div>";
                    }
                } else if (isset($_GET['brands']) && isset($_GET['price'])) {

                    $brandChecked = [];
                    $brandChecked = $_GET['brands'];

                    $priceCheck = [];
                    $priceCheck = $_GET['price'];
                    $cprc = 0;
                    $newPrice = $priceCheck[0];
                    foreach ($brandChecked as $newBrand) {

                        $fil = mysqli_query($con, "select * from product WHERE brand='$newBrand' and price BETWEEN $newPrice and $newPrice+5000");
                        while ($r = mysqli_fetch_array($fil)) {
                            $cprc++;
                        ?>

                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-2">
                                <div class="p-4 ">
                                    <a href="product-details.php?pid=<?= $r['id'] ?>" class="text-decoration-none">
                                        <img src="images/<?= ($r['img1']) ?>" alt="" class="pro-img mb-2">
                                        <span class="text-green"><?= $r["brand"] ?></span>
                                        <h6 class="text-secondary "><?= $r['name'] ?></h6>
                                    </a>
                                    <h6 class="text-green">Rs. <?= $r['price']; ?> <span class="text-secondary ms-3"><s>Rs. <?= $r['crossPrice'] ?></s></span></h6>


                                    <?php if ($r['checkStatus'] == 'In Stock') { ?>
                                        <a href="cameras.php?pid=<?php echo $r['id']; ?>&val=1" class="btn btn-success"><i class="fa fa-cart-plus pe-2"></i> Add to cart</a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0)" class="btn btn-light btn-disabled text-danger">Out of stock</a>
                                    <?php } ?>
                                    <!-- <button class="btn btn-secondary ms-2"><i class="fa fa-heart"></i></button> -->

                                </div>
                            </div>
                        <?php
                        }
                        if ($cprc == 0) {
                            echo "<div class='col-lg-4 col-md-6 col-sm-6 col-12 p-2'><h5 class='text-green text-center'>No Cameras found</h5></div>";
                        }
                    }
                } else if (isset($_GET['brands'])) {
                    $brandChecked = [];
                    $brandChecked = $_GET['brands'];
                    $cbrand = 0;
                    foreach ($brandChecked as $newBrand) {
                        $fil = mysqli_query($con, "select * from product WHERE brand='$newBrand' ");
                        while ($r = mysqli_fetch_array($fil)) {
                            $cbrand++;
                        ?>

                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-2">
                                <div class="p-4 ">
                                    <a href="product-details.php?pid=<?= $r['id'] ?>" class="text-decoration-none">
                                        <img src="images/<?= ($r['img1']) ?>" alt="" class="pro-img mb-2">
                                        <span class="text-green"><?= $r["brand"] ?></span>
                                        <h6 class="text-secondary "><?= $r['name'] ?></h6>
                                    </a>
                                    <h6 class="text-green">Rs. <?= $r['price']; ?> <span class="text-secondary ms-3"><s>Rs. <?= $r['crossPrice'] ?></s></span></h6>


                                    <?php if ($r['checkStatus'] == 'In Stock') { ?>
                                        <a href="cameras.php?pid=<?php echo $r['id']; ?>&val=1" class="btn btn-success"><i class="fa fa-cart-plus pe-2"></i> Add to cart</a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0)" class="btn btn-light btn-disabled text-danger">Out of stock</a>
                                    <?php } ?>
                                    <!-- <button class="btn btn-secondary ms-2"><i class="fa fa-heart"></i></button> -->

                                </div>
                            </div>
                        <?php
                        }
                        if ($cbrand == 0) {
                            echo "<div class='col-lg-4 col-md-6 col-sm-6 col-12 p-2'><h5 class='text-green text-center'>No Cameras found</h5></div>";
                        }
                    }
                } else if (isset($_GET['price'])) {
                    $priceCheck = [];
                    $priceCheck = $_GET['price'];
                    $cprc = 0;
                    foreach ($priceCheck as $newPrice) {
                        $prr = mysqli_query($con, "select DISTINCT * from product WHERE price BETWEEN $newPrice and $newPrice+5000");
                        while ($r = mysqli_fetch_array($prr)) {
                            $cprc++;
                        ?>

                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-2">
                                <div class="p-4 ">
                                    <a href="product-details.php?pid=<?= $r['id'] ?>" class="text-decoration-none">
                                        <img src="images/<?= ($r['img1']) ?>" alt="" class="pro-img mb-2">
                                        <span class="text-green"><?= $r["brand"] ?></span>
                                        <h6 class="text-secondary "><?= $r['name'] ?></h6>
                                    </a>
                                    <h6 class="text-green">Rs. <?= $r['price']; ?> <span class="text-secondary ms-3"><s>Rs. <?= $r['crossPrice'] ?></s></span></h6>


                                    <?php if ($r['checkStatus'] == 'In Stock') { ?>
                                        <a href="cameras.php?pid=<?php echo $r['id']; ?>&val=1" class="btn btn-success"><i class="fa fa-cart-plus pe-2"></i> Add to cart</a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0)" class="btn btn-light btn-disabled text-danger">Out of stock</a>
                                    <?php } ?>
                                    <!-- <button class="btn btn-secondary ms-2"><i class="fa fa-heart"></i></button> -->

                                </div>
                            </div>
                        <?php
                        }
                        if ($cprc == 0) {
                            echo "<div class='col-lg-4 col-md-6 col-sm-6 col-12 p-2'><h5 class='text-green text-center'>No Cameras found</h5></div>";
                        }
                    }
                } else {
                    $ret = mysqli_query($con, "select * from product");
                    while ($row = mysqli_fetch_array($ret)) {
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-2">
                            <div class="p-4 ">
                                <a href="product-details.php?pid=<?= $row['id'] ?>" class="text-decoration-none">
                                    <img src="images/<?= ($row['img1']) ?>" alt="" class="pro-img mb-2">
                                    <span class="text-green"><?= $row["brand"] ?></span>
                                    <h6 class="text-secondary "><?= $row['name'] ?></h6>
                                </a>
                                <h6 class="text-green">Rs. <?= $row['price']; ?> <span class="text-secondary ms-3"><s>Rs. <?= $row['crossPrice'] ?></s></span></h6>


                                <?php if ($row['checkStatus'] == 'In Stock') { ?>
                                    <a href="cameras.php?pid=<?php echo $row['id']; ?>&val=1" class="btn btn-success"><i class="fa fa-cart-plus pe-2"></i> Add to cart</a>
                                <?php } else { ?>
                                    <a href="javascript:void(0)" class="btn btn-light btn-disabled text-danger">Out of stock</a>
                                <?php } ?>
                                <!-- <button class="btn btn-secondary ms-2"><i class="fa fa-heart"></i></button> -->

                            </div>
                        </div>
                <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>

<?php

include("popular_product.php");
include("include/footer.php");
?>
<script>

</script>