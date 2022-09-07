<?php
session_start();
$title = "All orders";

include('include/header.php');


if (isset($_GET['id'])) {
    mysqli_query($con, "delete from product where id = '" . $_GET['id'] . "'");
    echo "<script>alert('Delete successfully');location.href='manage-products.php';</script>";
}

?>
<div class="container my-4">
    <div class="row">
        <div class="col table-responsive">
            <h3 class="text-primary mb-3">All orders</h3>
            <table class="table table-hover table-bordered">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Shipping Add</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Amount</th>
                    <th>Order Status</th>

                    <th>Order date</th>
                    <th>Action</th>

                </tr>
                <?php
                // $f1 = "00:00:00";
                // $from = date('Y-m-d') . " " . $f1;
                // $t1 = "23:59:59";
                // $to = date('Y-m-d') . " " . $t1;
                $query = mysqli_query($con, "select users.name as username,users.email as useremail,users.contact as usercontact,users.shippingAdd as shippingaddress,users.shippingCity as shippingcity,users.shippingState as shippingstate,users.shippingPincode as shippingpincode,product.name as productname,orders.quantity as quantity,orders.orderStatus as ost,orders.regDate as orderdate,product.price as productprice,orders.id as id from orders join users on  orders.uid=users.id join product on product.id=orders.pid");
                $cnt = 1;
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?= $cnt; ?></td>

                        <!-- <td><img src="../images/<?= $row['img1'] ?>" style="height: 50px; aspect-ration:1/1; object-fir: cover"></td> -->
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['usercontact'] ?></td>
                        <td><?= $row['shippingaddress'] . "," . $row['shippingstate'] . "," . $row['shippingcity'] . "," . $row['shippingpincode'] ?></td>
                        <td><?= $row['productname']; ?></td>
                        <td><?= $row['quantity']; ?></td>

                        <td><?= $row['productprice'] * $row['quantity'] ?>
                        </td>
                        <td><?= $row['ost'] ?></td>

                        <td><?= $row['orderdate'] ?></td>
                        <td>
                            <a href="edit-order.php?id=<?= $row['id'] ?>"><i class="fa fa-pencil-alt me-3"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>