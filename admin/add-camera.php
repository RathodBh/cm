<?php
session_start();
$title = "Add Product";
include('include/header.php');


if (isset($_POST['add'])) {
    // $category = $_POST['category'];
    // $subcat = $_POST['subcategory'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $crossPrice = $_POST['crossPrice'];
    $description = $_POST['description'];
    $checkStatus = $_POST['checkStatus'];
    $img1 = $_FILES["img1"]["name"];
    $img2 = $_FILES["img2"]["name"];
    $img3 = $_FILES["img3"]["name"];
    $popular = $_POST['popular'];

    //for getting product id
    // $query = mysqli_query($con, "select max(id) as pid from products");
    // $result = mysqli_fetch_array($query);
    // $productid = $result['pid'] + 1;
    // $dir = "productimages/$productid";
    // if (!is_dir($dir)) {
    //     mkdir("productimages/" . $productid);
    // }

    move_uploaded_file($_FILES["img1"]["tmp_name"], "../images/" . $_FILES["img1"]["name"]);
    move_uploaded_file($_FILES["img2"]["tmp_name"], "../images/" . $_FILES["img2"]["name"]);
    move_uploaded_file($_FILES["img3"]["tmp_name"], "../images/" . $_FILES["img3"]["name"]);
    $q = "insert into product(name,brand,price,crossPrice,description,img1,img2,img3,checkStatus,popular) values('$name','$brand','$price','$crossPrice','$description','$img1','$img2','$img3','$checkStatus','$popular')";
    $sql = mysqli_query($con, $q);
    print_r($q);
    // $_SESSION['msg'] = "Product Inserted Successfully !!";
    echo "<script>alert('Product added successfully');</script>";
}


?>
<div class="container my-4">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-7 col-12">
            <h3 class="text-primary">Add Product</h3>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group mt-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required />
                </div>
                <div class="form-group mt-3">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" class="form-control" id="brand" name="brand" placeholder="brand" required />
                </div>
                <div class="form-group mt-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Current Password" required />
                </div>

                <div class="form-group mt-3">
                    <label for="crossPrice" class="form-label">Cross Price</label>
                    <input type="text" class="form-control" id="crossPrice" name="crossPrice" placeholder=" Cross price" required />
                </div>
                <div class="form-group mt-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="password" class="form-control" id="description" name="description" placeholder="Description" required />
                </div>
                <div class="form-group mt-3">
                    <label for="img1" class="form-label">Image 1</label>
                    <input type="file" class="form-control" id="img1" name="img1" placeholder="Upload Image" required />
                </div>
                <div class="form-group mt-3">
                    <label for="img2" class="form-label">Image 2</label>
                    <input type="file" class="form-control" id="img2" name="img2" placeholder="Upload Image" />
                </div>
                <div class="form-group mt-3">
                    <label for="img3" class="form-label">Image 3</label>
                    <input type="file" class="form-control" id="img3" name="img3" placeholder="Current Password" />
                </div>
                <div class="form-group mt-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="checkStatus" id="status" class="form-control" required>
                        <option value="" selected hidden disabled>Select</option>
                        <option value="In Stock">In Stock</option>
                        <option value="Out of Stock">Out of Stock</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="popular" class="form-label">Add to popular? </label>
                    <select name="popular" id="popular" class="form-control" required>
                        <option value="" selected hidden disabled>Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <button class="btn btn-success mt-4" type="submit" name="add">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>