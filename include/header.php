<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="icon/fontawesome-free-5.9.0-web/css/all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="index">
    <!-- topNav -->
    <nav class="navbar navbar-expand-sm navbar-light" id="topNav">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav top-nav-links">
                    <li class="nav-item  ">
                        <a class="nav-link   mx-auto" href="#">
                            <i class="fa fa-user me-1 "></i>
                            My Account
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link  " href="#">
                            <i class="fa fa-heart me-1"></i>
                            Wishlist
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link  " href="#">
                            <i class="fa fa-cart-plus me-1"></i>
                            My Cart
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link   border-0" href="#">
                            <i class="fa fa-sign-in-alt me-1"></i>
                            SignUp/Login
                        </a>
                    </li>
                    <!-- <li class="nav-item d-flex justify-content-end w-auto">
                        <button class="btn-sm my-top-btn">Track Order</button>
                    </li> -->
                </ul>
            </div>
            <div class="float-md-right float-lg-right">
                <button class="btn-sm my-top-btn ms-3 ms-sm-3 ms-md-0">Track Order</button>
            </div>
        </div>
    </nav>

    <!-- midNav  -->
    <div class="container-fluid midNav">
        <div class="row my-4 d-flex justify-content-between justify-content-sm-center align-items-center">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 d-flex justify-content-center my-sm-2 my-2">
                <h1 class="text-green">Camera Shop</h1>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-11 col-12 my-sm-2 my-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <button class="input-group-text"><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-11 col-12 d-flex justify-content-end my-sm-2 my-2">
                <div class="input-group" style="width: 240px">
                    <div class=" border form-control"> CART - <span class="text-green">Rs 0.00</span>
                    </div>
                    <button class="input-group-text">
                        <i class="fa fa-cart-arrow-down"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- mainNav  -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark py-0 myMainNav">
        <div class="container-fluid">
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="mainNav">
                <ul class="navbar-nav p-0">
                    <li class="nav-item ">
                        <a class="nav-link text-white px-3 <?php if ($title == "Homepage") { ?> active <?php } ?>" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white px-3 <?php if ($title == "Cameras") { ?> active <?php } ?>" href="cameras.php">CAMERAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white px-3" href="about.php">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white px-3" href="contact.php">CONTACT</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>