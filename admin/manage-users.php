<?php
session_start();
$title = "Manage Users";

include('include/header.php');
?>
<div class="container my-4">
    <div class="row">
        <div class="col table-responsive">
            <h3 class="text-primary mb-3">Manage Users</h3>
            <table class="table table-hover table-bordered">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Shipping Address</th>
                    <th>Billing Address</th>
                    <th>Reg. date</th>
                </tr>
                <?php
                // $gt = $_GET['search'];
                $query = mysqli_query($con, "select * from users");
                $cnt = 0;
                while ($row = mysqli_fetch_array($query)) {
                    $cnt++;

                ?>
                    <tr>
                        <td><?= $cnt; ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['contact'] ?></td>
                        <td><?= $row['shippingAdd'] . "," . $row['shippingState'] . "," . $row['shippingCity'] . "," . $row['shippingPincode'] ?></td>
                        <td><?= $row['billingAdd'] . "," . $row['billingState'] . "," . $row['billingCity'] . "," . $row['billingPincode'] ?></td>

                        <td><?= $row['regDate'] ?></td>
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