<?php
session_start();
$title = "Admin Home";
if (!isset($_SESSION['alogin'])) {
    echo "<script>alert('login required');location.href='admin-login.php'</script>";
}
include('include/header.php');
?>
<h1 class="text-primary">Welcome.. <?= $_SESSION['alogin']; ?></h1>
<?php
include('include/footer.php');
?>