<?php
session_start();
$title = "Edit Product";
include('include/header.php');


if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $crossPrice = $_POST['crossPrice'];
    $description = $_POST['description'];
    $checkStatus = $_POST['checkStatus'];
    // $img1 = $_FILES["img1"]["name"];
    // $img2 = $_FILES["img2"]["name"];
    // $img3 = $_FILES["img3"]["name"];
    $popular = $_POST['popular'];


    // move_uploaded_file($_FILES["img1"]["tmp_name"], "../images/" . $_FILES["img1"]["name"]);
    // move_uploaded_file($_FILES["img2"]["tmp_name"], "../images/" . $_FILES["img2"]["name"]);
    // move_uploaded_file($_FILES["img3"]["tmp_name"], "../images/" . $_FILES["img3"]["name"]);
    $q = "update product set name = '$name', brand='$brand', price='$price',crossPrice='$crossPrice',description='$description',checkStatus='$checkStatus',popular='$popular' WHERE id='". $_GET['id'] ."'";
    $sql = mysqli_query($con, $q);
    print_r($q);
    // $_SESSION['msg'] = "Product Inserted Successfully !!";
    echo "<script>alert('Product updated successfully');location.href='manage-products.php';</script>";
}


?>
<div class="container my-4">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-7 col-12">
            <form action="" class="w-100" method="POST" enctype="multipart/form-data">
                <h3 class="text-primary">Edit Product</h3>

                <?php

                $res = mysqli_query($con, "SELECT * FROM product WHERE id='" . $_GET['id'] . "'");
                while ($row = mysqli_fetch_array($res)) {
                ?>
                    <div class="form-group mt-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="<?= $row['name'] ?>" class="form-control" id="name" name="name" placeholder="Name" required />
                    </div>
                    <div class="form-group mt-3">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" value="<?= $row['brand'] ?>" class="form-control" id="brand" name="brand" placeholder="brand" required />
                    </div>
                    <div class="form-group mt-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" value="<?= $row['price'] ?>" class="form-control" id="price" name="price" placeholder="Current Password" required />
                    </div>

                    <div class="form-group mt-3">
                        <label for="crossPrice" class="form-label">Cross Price</label>
                        <input type="text" value="<?= $row['crossPrice'] ?>" class="form-control" id="crossPrice" name="crossPrice" placeholder=" Cross price" required />
                    </div>
                    <div class="form-group mt-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" value="<?= $row['description'] ?>" class="form-control" id="description" name="description" placeholder="Description" required />
                    </div>
                    <div class="form-group mt-3">
                        <label for="img1" class="form-label w-100">Image 1</label>
                        <img src="../images/<?= $row['img1'] ?>" alt="" style="height:200px; aspect-ration:1/1; object-fit:cover">
                        <!-- <input type="file" class="form-control mt-2" id="img1" name="img1" placeholder="Upload Image" required /> -->
                    </div>
                    <!-- <div class="form-group mt-3">
                        <label for="img2" class="form-label">Image 2</label>
                        <input type="file" class="form-control" id="img2" name="img2" placeholder="Upload Image" />
                    </div>
                    <div class="form-group mt-3">
                        <label for="img3" class="form-label">Image 3</label>
                        <input type="file" class="form-control" id="img3" name="img3" placeholder="Current Password" />
                    </div> -->
                    <div class="form-group mt-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="checkStatus" id="status" class="form-control" required>
                            <option value="" selected hidden disabled>Select</option>
                            <option value="In Stock" <?php if ($row['checkStatus'] == "In Stock") { ?> selected <?php } ?>>In Stock</option>
                            <option value="Out of Stock" <?php if ($row['checkStatus'] == "Out of Stock") { ?> selected <?php } ?>>Out of Stock</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="popular" class="form-label">Add to popular? </label>
                        <select name="popular" id="popular" class="form-control" required>
                            <option value="" selected hidden disabled>Select</option>
                            <option value="1" <?php if ($row['popular'] == "1") { ?> selected <?php } ?>>Yes</option>
                            <option value="0" <?php if ($row['popular'] == "0") { ?> selected <?php } ?>>No</option>
                        </select>
                    </div>
                <?php } ?>
                <button class="btn btn-success mt-4" type="submit" name="edit">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>