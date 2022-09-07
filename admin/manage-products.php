<?php
session_start();
$title = "Manage Products";

include('include/header.php');


if (isset($_GET['id'])) {
    mysqli_query($con, "delete from product where id = '" . $_GET['id'] . "'");
    echo "<script>alert('Delete successfully');location.href='manage-products.php';</script>";
}

?>
<div class="container my-4">
    <div class="row">
        <div class="col table-responsive">
            <h3 class="text-primary mb-3">Manage Products</h3>
            <table class="table table-hover table-bordered">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>brand</th>
                    <th>price</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Popular</th>
                    <th>Action</th>

                </tr>
                <?php
                // $gt = $_GET['search'];
                $query = mysqli_query($con, "select * from product");
                $cnt = 0;
                while ($row = mysqli_fetch_array($query)) {
                    $cnt++;

                ?>
                    <tr>
                        <td><?= $cnt; ?></td>

                        <td><img src="../images/<?= $row['img1'] ?>" style="height: 50px; aspect-ration:1/1; object-fir: cover"></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['brand'] ?></td>
                        <td><?= $row['price'] ?></td>
                        <td><?= $row['description']; ?></td>
                        <td><?= $row['checkStatus']; ?></td>

                        <td><?php
                            if ($row['popular'] == '1') {
                                echo "Yes";
                            } else {
                                echo "No";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="edit-product.php?id=<?= $row['id'] ?>"><i class="fa fa-pencil-alt me-3"></i></a>
                            <a href="manage-products.php?id=<?= $row['id'] ?>"><i class="fa fa-trash"></i></a>
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