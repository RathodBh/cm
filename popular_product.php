<div class="container my-4">
    <div class="row">
        <div class="col-12 d-flex justify-content-between ">
            <h2 class="text-success">Popular Products</h2>
            <div class="p-1">
                <i class="fa fa-arrow-left swiper-arr mx-3 p-2 border" id="productLeft"></i>
                <i class="fa fa-arrow-right swiper-arr p-2 border" id="productRight"></i>
            </div>
        </div>
        <hr class="text-secondary">
    </div>
    <div class="swiper mySwiper2">
        <div class="swiper-wrapper">
            <?php
            // include('include/config.php');
            error_reporting(0);
            $ret = mysqli_query($con, "select * from product WHERE popular='1'");
            while ($row = mysqli_fetch_array($ret)) {
            ?>
                <!-- class="d-block w-100 " alt="..." style="height: 150px; object-fit:contain;" -->
                <div class="swiper-slide">
                    <a href="product-details.php?pid=<?php echo $row['id']; ?>" class="text-decoration-none">
                        <img src="images/<?= $row['img1'] ?>">
                        <div class="info">
                            <h5><?= $row['name'] ?></h5>
                    </a>
                    <p class="text-green">Rs. <?= $row['price'] ?> <span class="ms-1 text-secondary"><s>Rs. <?= $row['crossPrice'] ?></s></span></p>
                    <a href="product-details.php?pid=<?php echo $row['id']; ?>&val=1" class="btn btn-success w-100">Add to cart</a>
                </div>
        </div>
    <?php } ?>
    </div>
    <!-- <div class="swiper-pagination"></div> -->
</div>
</div>