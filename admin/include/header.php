<?php
include("../include/config.php");
// session_start();
if (!isset($_SESSION['alogin'])) {
    echo "<script>alert('Login first');location.href='admin-login.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/fontawesome-free-5.9.0-web/css/all.min.css">
    <link href="css/style.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="offcanvas offcanvas-start show" tabindex="-1" id="offcanvas" data-bs-keyboard="false" data-bs-backdrop="true" data-bs-scroll="true">
        <div class="offcanvas-header border-bottom">
            <a href="index.php" class="d-flex align-items-center text-decoration-none offcanvas-title d-sm-block">
                <h5 style='font-size:18px'>
                    <i class="fa fa-user me-2"></i>
                    Admin
                </h5>
            </a>
        </div>
        <div class="offcanvas-body px-2">
            <ul class="list-unstyled ps-0">
                <li class="mb-1 ">
                    <button class="btn btn-toggle align-items-center rounded <?php if ($title == "Admin Home") { ?> text-primary <?php } ?> " onclick="location.href='index.php'">
                        Home
                    </button>
                </li>
                <li class="border-top my-3"></li>

                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded dropdown-toggle <?php if ($title == "All orders" || $title == "Pending orders" || $title == "Delivered orders") { ?> text-primary <?php } ?>" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                        Order management
                    </button>
                    <div class="collapse" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ">
                            <li><a href="all-orders.php" class="rounded <?php if ($title == "All orders") { ?> text-primary <?php } ?>">All orders</a></li>
                            <li><a href="pending-orders.php" class="rounded <?php if ($title == "Pending orders") { ?> text-primary <?php } ?>">Pending orders</a></li>
                            <li><a href="delivered-orders.php" class="rounded <?php if ($title == "Delivered orders") { ?> text-primary <?php } ?>">Delivered orders</a></li>
                        </ul>
                    </div>
                </li>
                <li class="border-top my-3"></li>

                <li class="mb-1 ">
                    <button class="btn btn-toggle align-items-center rounded <?php if ($title == "Manage Users") { ?> text-primary <?php } ?>" onclick="location.href='manage-users.php'">
                        Manage Users
                    </button>
                </li>

                <li class="border-top my-3"></li>

                <li class="mb-1 ">
                    <button class="btn btn-toggle align-items-center rounded <?php if ($title == "Add Product") { ?> text-primary <?php } ?>" onclick="location.href='add-camera.php'">
                        Add product
                    </button>
                </li>

                <li class="border-top my-3"></li>


                <li class="mb-1 ">
                    <button class="btn btn-toggle align-items-center rounded <?php if ($title == "Manage Products" || $title == "Edit Product") { ?> text-primary <?php } ?>" onclick="location.href='manage-products.php'">
                        Manage product
                    </button>
                </li>

                <li class="border-top my-3"></li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed dropdown-toggle <?php if ($title == "Update Password") { ?> text-primary <?php } ?>" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                        <i class="fa fa-user me-2"></i>
                        My Account
                    </button>
                    <div class="collapse" id="account-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="change-password.php" class="rounded <?php if ($title == "Update Password") { ?> text-primary <?php } ?>">Change password</a></li>
                            <li><a href="logout.php" class="rounded">Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container-fluid main">
        <div class="row">
            <div class="col bg-dark text-white py-2 ps-4">
                <h2>Camera Shop</h2>
            </div>
        </div>
        <div class="row">
            <div class="col p-4">
                <!-- toggler -->
                <button id="sidebarCollapse" class="float-end" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>