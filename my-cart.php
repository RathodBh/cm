<?php
$title = "My cart";
include("include/header.php");
session_start();
error_reporting(0);
// code for billing address updation
if (isset($_POST['billing'])) {
    $baddress = $_POST['billingAdd'];
    $bstate = $_POST['billingState'];
    $bcity = $_POST['billingCity'];
    $bpincode = $_POST['billingPin'];
    $query = mysqli_query($con, "update users set billingAdd='$baddress',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode' where id='" . $_SESSION['id'] . "'");
    if ($query) {
        echo "<script>alert('Billing Address has been updated');location.href='my-cart.php'</script>";
    }
}


// code for Shipping address updation
if (isset($_POST['shipping'])) {
    $saddress = $_POST['shippingAdd'];
    $sstate = $_POST['shippingState'];
    $scity = $_POST['shippingCity'];
    $spincode = $_POST['shippingPin'];
    $query = mysqli_query($con, "update users set shippingAdd='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='" . $_SESSION['id'] . "'");
    if ($query) {
        echo "<script>alert('Shipping Address has been updated');location.href='my-cart.php'</script>";
    }
}



?>
<form action="" method="POST">
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-stripped table-hover">

                    <tr class="border">
                        <th class="border">Remove</th>
                        <th class="border">Image</th>
                        <th class="border">Name</th>
                        <th class="border">Quantity</th>
                        <th class="border">Price <br>(per unit)</th>
                        <th class="border">Grand Total</th>
                    </tr>
                    <?php
                    $pdtid = array();
                    $qt = array();
                    $prc = array();
                    $cnt = 0;

                    $uid = $_SESSION['id'];
                    $my = "SELECT cart.id as id,cart.quantity as quantity,product.name as name,product.img1 as img1,product.price as price from cart JOIN product ON cart.uid='$uid' and cart.pid=product.id";
                    $q = mysqli_query($con, $my);
                    while ($row = mysqli_fetch_array($q)) {
                        // $_SESSION['qnty'] = $totalqunty += $quantity;
                        // echo $row['quantity'];
                        array_push($pdtid, $row['id']);
                        $cnt++;


                    ?>
                        <tr>
                            <td>
                                <!-- <button class="btn btn-danger px-3" name="deleteCart" value="<?= $row['id'] ?>">X</button> -->
                                <input type="checkbox" onchange="location.href='my-cart.php?remove=<?= $row['id'] ?>';location.href='my-cart.php';" class="form-check">
                            </td>
                            <td><img src="images/<?= $row['img1'] ?>" alt="" style="width: 200px; aspect-ratio:1/1">
                            </td>
                            <td>
                                <?= $row["name"] ?>
                            </td>
                            <td>
                                <input type="number" min="1" name="quantity<?= $row['id'] ?>" value="<?= $row["quantity"] ?>" oninput="updateQ(<?= $row['id'] ?>,<?= $row['price'] ?>)" id="q<?= $row['id'] ?>">
                            </td>
                            <td>
                                <?= $row['price']; ?>
                            </td>

                            <td>
                                <p class="text-green">
                                    <b id="gt<?= $row['id']; ?>">
                                        <?= $row["quantity"] * $row["price"];
                                        ?>
                                    </b>
                                </p>
                            </td>
                        </tr>

                    <?php
                        array_push($qt, $_POST['quantity' . $row['id']]);
                        array_push($prc, $row['price']);
                    }
                    $_SESSION['pid'] = $pdtid;
                    $_SESSION['quantity'] = $qt;
                    $_SESSION['price'] = $prc;

                    // print_r($qt);
                    if ($cnt == 0) {
                        echo "<tr>
                                <td colspan='6'>
                                    <h3 class='text-green text-center'>Your cart is Empty</h3>
                                </td>
                            </tr>";
                    }
                    ?>
                    <tr class="py-5">
                        <td colspan="3">
                            <a href="cameras.php" class="btn btn-success px-5 text-decoration-none">CONTINUE SHOPPING</a>
                        </td>
                        <?php
                        if ($cnt != 0) {

                        ?>
                            <td colspan="3">
                                <button class="btn btn-success px-5 float-end" name="updateCart">UPDATE CART</button>
                            </td>
                        <?php } ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="container my-4">
        <div class="row d-flex justify-content-around">
            <?php
            $query = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
            while ($row = mysqli_fetch_array($query)) {
            ?>

                <div class="col-lg-4 shadow my-2">

                    <div class="form-group mb-5 ">
                        <h3 class="text-green">Billing Address</h3>
                    </div>
                    <div class="form-group mt-3">
                        <textarea name="billingAdd" id="billingAdd" cols="30" class="form-control" placeholder="Billing Address"><?= $row['billingAdd'] ?></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" id="billingState" name="billingState" placeholder="Billing State" value="<?= $row['billingState'] ?>">
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" id="billingCity" name="billingCity" placeholder="Billing City" value="<?= $row['billingCity'] ?>">
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" id="billingPin" name="billingPin" placeholder="Billing Pincode" value="<?= $row['billingPincode'] ?>">
                    </div>
                    <div class="form-group mt-3">
                        <button name="billing" class="btn btn-success">UPDATE</button>
                    </div>
                </div>
                <div class="col-lg-4 shadow my-2">
                    <div class="form-group mb-5 ">
                        <h3 class="text-green">shipping Address</h3>
                    </div>
                    <div class="form-group mt-3">
                        <textarea name="shippingAdd" id="shippingAdd" cols="30" class="form-control" placeholder="shipping Address"><?= $row['shippingAdd'] ?></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" id="shippingState" name="shippingState" placeholder="shipping State" value="<?= $row['shippingState'] ?>">
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" id="shippingCity" name="shippingCity" placeholder="shipping City" value="<?= $row['shippingCity'] ?>">
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" id="shippingPin" name="shippingPin" placeholder="shipping Pincode" value="<?= $row['shippingPincode'] ?>">
                    </div>
                    <div class="form-group mt-3">
                        <button name="shipping" class="btn btn-success">UPDATE</button>
                    </div>

                </div>
            <?php } ?>

            <div class="col-lg-3 shadow my-2 align-self-start py-2">
                <h3 class="text-green">
                    GRAND TOTAL:
                </h3>
                <?php
                $tttl = 0.00;
                if (isset($_SESSION['id'])) {
                    $uid1 = $_SESSION['id'];
                    $my1 = "SELECT cart.id as id,cart.quantity as quantity,product.name as name,product.img1 as img1,product.price as price from cart JOIN product ON cart.uid='$uid1' and cart.pid=product.id";
                    $q1 = mysqli_query($con, $my1);
                    while ($row1 = mysqli_fetch_array($q1)) {
                        $tttl += $row1['quantity'] * $row1['price'];
                    }
                }

                ?>

                <?php
                if ($cnt != 0) {
                    echo "<h3 class='text-success'>" . $tttl . "</h3>
        <button name='checkout' class='btn btn-success' type='submit'>CHECKOUT</button>";
                } else {
                    echo "<p class='text-danger'>update cart first</p>";
                }
                ?>


            </div>

        </div>
    </div>
</form>

<?php
include("include/footer.php");


// code for cart updation
if (isset($_POST['updateCart'])) {
    // $qtt = $_SESSION['quantity'];
    // echo "up";
    // print_r($_SESSION['quantity']);
    // echo "q is" . $qtt[0];
    // $sstate = $_POST['shippingState'];
    // $scity = $_POST['shippingCity'];
    // $spincode = $_POST['shippingPin'];

    $quantity = $_SESSION['quantity'];
    $pdd = $_SESSION['pid'];
    $pprc = $_SESSION['price'];

    $value = array_combine($pdd, $quantity);
    $prcVal = array_combine($pprc, $quantity);

    foreach ($value as $myid => $qty) {
        mysqli_query($con, "update cart set quantity = '$qty' WHERE id='$myid'");
    }
    $_SESSION['lastPrice'] = 0;
    foreach ($prcVal as $prc => $qty) {
        $_SESSION['lastPrice'] += $prc * $qty;
    }
    echo "<script>alert('Cart updated');location.href='my-cart.php'</script>";
}

// delete cart item
if (isset($_GET['remove'])) {
    $remID = $_GET['remove'];
    mysqli_query($con, "delete from cart WHERE id='$remID'");
    echo "<script>alert('Cart updated');location.href='my-cart.php'</scripalert>";
}



//for order
if (isset($_POST['checkout'])) {

    if (!isset($_SESSION['login'])) {
        echo
        "<script>alert('Login first');location.href='login.php'</script>";
    } else {

        $quantity = $_SESSION['quantity'];
        $pdd = $_SESSION['pid'];
        $value = array_combine($pdd, $quantity);

        $uid1 = $_SESSION['id'];
        $my1 = "SELECT product.id as id,cart.quantity as quantity,product.name as name,product.img1 as img1,product.price as price from cart JOIN product ON cart.uid='$uid1' and cart.pid=product.id";
        $q1 = mysqli_query($con, $my1);
        while ($row1 = mysqli_fetch_array($q1)) {
            $tttl += $row1['quantity'] * $row1['price'];
            $ppid = $row1["id"];
            $qqty = $row1["quantity"];
            mysqli_query($con, "insert into orders(uid,pid,quantity) values('" . $_SESSION['id'] . "','$ppid','$qqty')");
        }

        // foreach ($value as $qty => $val34) {
        //     mysqli_query($con, "insert into orders(uid,pid,quantity) values('" . $_SESSION['id'] . "','$qty','$val34')");
        // }
        foreach ($value as $qty => $val34) {
            mysqli_query($con, "DELETE FROM cart WHERE id = '$qty'");
        }
        echo "<script>alert('Order submitted');location.href='payment-method.php'</script>";
    }
}

?>
<script>
    function updateQ(id, price) {
        var gtotal = document.getElementById("gt" + id);
        var quantity = document.getElementById("q" + id);

        gtotal.innerText = quantity.value * price;
    }
</script>