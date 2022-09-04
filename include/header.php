<?php
include('include/config.php');
session_start();

?>

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
                    <?php
                    if (isset($_SESSION["username"])) {
                    ?>
                        <!-- <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button">
                                Dropdown
                            </button>

                        </div> -->
                        <li class="nav-item  ">
                            <a class="nav-link mx-auto" href="my-account.php" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user me-1 "></i>
                                <?= $_SESSION["username"] ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <li><a href="my-profile.php" class="dropdown-item" type="button"><i class="fa fa-user me-2"></i>My profile</a></li>
                                <li><a href="change-password.php" class="dropdown-item" type="button"><i class="fa fa-lock me-2"></i>Change password</a></li>
                                <li><a href="logout.php" class="dropdown-item" type="button"><i class="fa fa-sign-out-alt me-2"></i>Logout</a></li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item ">
                            <a class="nav-link  " href="wishlist.php">
                                <i class="fa fa-heart me-1"></i>
                                Wishlist
                            </a>
                        </li> -->
                        <li class="nav-item ">
                            <a class="nav-link border-0" href="my-cart.php">
                                <i class="fa fa-cart-plus me-1"></i>
                                My Cart
                            </a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item ">
                            <a class="nav-link  border-0" href="login.php">
                                <i class="fa fa-sign-in-alt me-1"></i>
                                SignUp/Login
                            </a>
                        </li>

                    <?php
                    }
                    ?>



                    <!-- <li class="nav-item d-flex justify-content-end w-auto">
                        <button class="btn-sm my-top-btn">Track Order</button>
                    </li> -->
                </ul>
            </div>
            <div class="float-md-right float-lg-right">
                <a href="track-orders.php" class="btn-sm my-top-btn ms-3 ms-sm-3 ms-md-0 text-decoration-none">Track Order</a>
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
                    <script>
                        var a = "";
                    </script>
                    <input type="text" class="form-control" placeholder="Search" oninput="a=this.value">
                    <button class="input-group-text" onclick="location.href='cameras.php?search='+a"><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-11 col-12 d-flex justify-content-end my-sm-2 my-2">
                <?php
                $tttl = 0.00;
                if (isset($_SESSION['id'])) {
                    $uid1 = $_SESSION['id'];
                    $my1 = "SELECT cart.id as id,cart.quantity as quantity,product.name as name,product.img1 as img1,product.price as price from cart JOIN product ON cart.uid='$uid1' and cart.pid=product.id";
                    $q1 = mysqli_query($con, $my1);
                    while ($row1 = mysqli_fetch_array($q1)) {
                        $tttl += $row1['quantity'] * $row1['price'];
                    }
                }

                ?>
                <a href="my-cart.php" class="text-decoration-none">
                    <div class="input-group" style="width: 240px">
                        <div class=" border form-control"> CART - <span class="text-green">Rs <?= $tttl ?></span>
                        </div>
                        <button class="input-group-text">
                            <i class="fa fa-cart-arrow-down"></i>
                        </button>
                    </div>
                </a>
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
                        <a class="nav-link text-white px-3 <?php if ($title == "About") { ?> active <?php } ?>" href=" about.php">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white px-3 <?php if ($title == "Contact") { ?> active <?php } ?>" href=" contact.php">CONTACT</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>