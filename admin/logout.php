<?php
session_start();
include("../include/config.php");
$_SESSION['alogin'] == "";
session_unset();
?>
<script language="javascript">
    document.location = "admin-login.php";
</script>