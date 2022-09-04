<?php
$title = "Order History";
include('include/header.php');
?>
<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12 table-responsive">
            <h2 class="text-green">Order Deatails</h2>
            <table class="table table-hover table-striped">
                <tr class="border text-success">
                    <th class="border text-green">#</th>
                    <th class="border text-green">Image</th>
                    <th class="border text-green">Product Name</th>
                    <th class="border text-green">Quantity</th>
                    <th class="border text-green">Price per unit</th>
                    <th class="border text-green">Total</th>
                    <th class="border text-green">Payment Mode</th>
                    <th class="border text-green">Order date</th>
                    <th class="border text-green">Action</th>
                </tr>

                <?php

                session_start();
                if (!isset($_SESSION['login'])) {
                    echo "<script>alert('Login first');location.href='login.php';</script>";
                } else {
                    $query = mysqli_query($con, "select product.img1 as img1,product.name as name,product.id as pid,orders.pid as opid,orders.quantity as qty,product.price as pprice,orders.payMode as mode,orders.regDate as odate,orders.id as orderid from orders join product on orders.pid=product.id where orders.uid='" . $_SESSION['id'] . "' and orders.payMode is not null");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($query)) {

                ?>
                        <tr>
                            <td><?= $cnt; ?></td>
                            <td><img src="images/<?= $row['img1']; ?>" style="width:200px; aspect-ratio:1/1"></td>
                            <td>
                                <a href="product-details.php?pid=<?php echo $row['opid']; ?>" class="text-decoration-none">
                                    <?= $row['name']; ?>
                                </a>
                            </td>
                            <td><?= $row['qty']; ?></td>
                            <td><?= $row['pprice']; ?></td>
                            <td><?= $row['pprice'] * $row['qty']; ?></td>
                            <td><?= $row['mode']; ?></td>
                            <td><?= $row['odate']; ?></td>
                            <td><a class="text-decoration-none" href="track-order.php?oid=<?= $row['orderid'] ?>">Track</a></td>
                        </tr>

                <?php

                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>