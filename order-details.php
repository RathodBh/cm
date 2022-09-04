<?php
$title  = "Order Details";
include('include/header.php');

?>
<div class="container-fluid my-4">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="cart-romove item">#</th>
                <th class="cart-description item">Image</th>
                <th class="cart-product-name item">Product Name</th>

                <th class="cart-qty item">Quantity</th>
                <th class="cart-sub-total item">Price Per unit</th>
                <th class="cart-total item">Grandtotal</th>
                <th class="cart-total item">Payment Method</th>
                <th class="cart-description item">Order Date</th>
                <th class="cart-total last-item">Action</th>
            </tr>
        </thead><!-- /thead -->

        <tbody>
            <?php
            if (isset($_SESSION['id'])) {


                $orderid = $_POST['orderid'];
                $email = $_POST['email'];

                $ret = mysqli_query($con, "select t.email,t.id from (select usr.email,odrs.id from users as usr join orders as odrs on usr.id=odrs.uid) as t where  t.email='$email' and (t.id='$orderid')");
                $num = mysqli_num_rows($ret);
                if ($num > 0) {
                    $query =
                        mysqli_query($con, "select product.img1 as img1,product.name as name,product.id as pid,orders.pid as opid,orders.quantity as qty,product.price as pprice,orders.payMode as mode,orders.regDate as odate,orders.id as orderid from orders join product on orders.pid=product.id where orders.uid='" . $_SESSION['id'] . "' and orders.payMode is not null");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($query)) {
            ?>
                        <tr>
                            <td><?php echo $cnt; ?></td>
                            <td class="cart-image">
                                <a class="text-decoration-none">
                                    <img src="images/<?php echo $row['img1']; ?>" alt="" width="200" style="aspect-ratio:1/1">
                                </a>
                            </td>
                            <td class="cart-product-name-info">
                                <h4 class=''>
                                    <a href="product-details.php?pid=<?php echo $row['opid']; ?>" class="text-decoration-none">
                                        <?php echo $row['name']; ?></a>
                                </h4>


                            </td>
                            <td class="cart-product-quantity">
                                <?php echo $qty = $row['qty']; ?>
                            </td>
                            <td><?php echo $price = $row['pprice']; ?> </td>
                            <td><?php echo $qty * $price; ?></td>
                            <td><?php echo $row['mode']; ?> </td>
                            <td><?php echo $row['odate']; ?> </td>

                            <td>
                                <a href="track-order.php?oid=<?= $row['orderid']; ?>" title="Track order" class="text-decoration-none">
                                    Track
                                </a>
                            </td>
                        </tr>
                    <?php $cnt = $cnt + 1;
                    }
                } else { ?>
                    <tr>
                        <td colspan="8">Either order id or Registered email id is invalid</td>
                    </tr>
            <?php }
            } else {
                echo "<script>alert('Login first');location.href='login.php';</script>";
            }
            ?>
        </tbody><!-- /tbody -->
    </table><!-- /table -->
</div>

<?php
include('include/footer.php');
?>