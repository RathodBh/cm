<div class="container-fluid footer py-4">
    <div class="row d-flex justify-content-around">
        <div class="col-lg-3 my-4">
            <h2 class="text-green">Camera Shopping</h2>
            <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda quisquam laboriosam vero ipsa praesentium, quaerat error accusamus debitis, esse, cum dolore molestias sunt.</p>
            <div class="d-flex social-links">
                <a href="#" class="ms-0"><i class="fab fa-facebook mx-2"></i></a>
                <a href="#"><i class="fab fa-twitter mx-2"></i></a>
                <a href="#"><i class="fab fa-linkedin mx-2"></i></a>
            </div>
        </div>
        <div class="col-lg-3 my-4">
            <h3 class="text-dark mb-2">Opening Time</h3>
            <div class="d-flex justify-content-between w-100">
                <p>Monday to Friday</p>
                <p>08:00 to 18:00</p>
            </div>
            <div class="d-flex justify-content-between w-100">
                <p>Saturday</p>
                <p>08:00 to 18:00</p>
            </div>
            <div class="d-flex justify-content-between w-100">
                <p>Sunday</p>
                <p>10:00 to 18:00</p>
            </div>
        </div>
        <div class="col-lg-3 my-4">
            <h3 class="text-dark mb-2">Information</h3>
            <div class="d-flex align-items-start">
                <a href="" class="me-2 information"><i class="fa fa-map-marker m-2"></i></a>
                <p class="ms-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat voluptatem doloribus quia mollitia. Officiis debitis explicabo, at quod doloremque natus!</p>
            </div>
            <div class="d-flex align-items-start">
                <a href="" class="me-2 information"><i class="fa fa-mobile m-2"></i></a>
                <p class="ms-3">(011) 000000000000
                    <br>
                    (011) 000000000000
                </p>
            </div>
            <div class="d-flex align-items-start">
                <a href="" class="me-2 information"><i class="fa fa-envelope m-2"></i></a>
                <p class="ms-2">camerashoping@gmail.com</p>
            </div>
        </div>
        <div class="col-12">
            <hr class="text-dark">

            <p class="text-center">&copy;Copyright <a href="index.php">Camera shop</a> | Allright reserved</p>

        </div>
    </div>
</div>


<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/swiper-bundle.min.js"></script>
<script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="js/popper.min.js"></script> -->
</body>

</html>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 'auto',
        spaceBetween: 100,
        centeredSlides: true,
        grapCursor: true,
        loop: true,
        // pagination: {
        // el: ".swiper-pagination",
        // clickable: true,
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