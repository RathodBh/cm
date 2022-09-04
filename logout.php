<?php
session_start();
include("include/config.php");
$_SESSION['login'] == "";
session_unset();
$_SESSION['errmsg'] = "You have successfully logout";
?>
<script language="javascript">
    document.location = "index.php";
</script>