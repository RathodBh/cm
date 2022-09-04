<?php
$title = "Homepage";
include('include/header.php');
?>
<div class="container my-5">
    <div id="homeImg" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./images/camera-1.jpg" class="d-block w-100" alt="..." style="height:50vh;object-fit:cover">
            </div>
            <div class="carousel-item">
                <img src="./images/camera-2.jpg" class="d-block w-100" alt="..." style="height:50vh;object-fit:cover">
            </div>
            <div class="carousel-item">
                <img src="./images/camera-3.jpg" class="d-block w-100" alt="..." style="height:50vh;object-fit:cover">
            </div>
            <div class="carousel-item">
                <img src="./images/camera-4.jpg" class="d-block w-100" alt="..." style="height:50vh;object-fit:cover">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#homeImg" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homeImg" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>








<?php
include("our-brands.php");
include("popular_product.php");
include("include/footer.php");
?>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 'auto',
        spaceBetween: 100,
        centeredSlides: true,
        grapCursor: true,
        loop: true,
        // pagination: {
        //     el: ".swiper-pagination",
        //     clickable: true,
        // },
        navigation: {
            nextEl: "#brandRight",
            prevEl: "#brandLeft",
        },
    });

    var swiper2 = new Swiper(".mySwiper2", {
        slidesPerView: 'auto',
        spaceBetween: 110,
        centeredSlides: true,
        grapCursor: true,
        loop: true,
        navigation: {
            nextEl: "#productRight",
            prevEl: "#productLeft",
        },
    });
</script>