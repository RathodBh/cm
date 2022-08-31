<?php
$title = "Cameras";
include("include/header.php");

include("popular_product.php");
?>

<div class="container my-4">
    <div class="row">
        <div class="col-lg-3 p-2">
            <div class="shadow">
                <img src="images/Canon Eos 550.png" alt="" class="pro-img">
                <h5>Canon Eos 550</h5>
                <h6 class="text-green">Rs. 600</h6>
            </div>
        </div>
        <div class="col-lg-3"></div>
        <div class="col-lg-3"></div>
    </div>
</div>

<?php
include("include/footer.php");
?>

<script>
    // var swiper = new Swiper(".mySwiper", {
    //     slidesPerView: 'auto',
    //     spaceBetween: 100,
    //     centeredSlides: true,
    //     grapCursor: true,
    //     loop: true,
    //     // pagination: {
    //     //     el: ".swiper-pagination",
    //     //     clickable: true,
    //     // },
    //     navigation: {
    //         nextEl: "#brandRight",
    //         prevEl: "#brandLeft",
    //     },
    // });

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