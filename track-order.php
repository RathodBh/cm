<?php
$title = "Track Order";
include('include/header.php');
session_start();
$oid = intval($_GET['oid']);

?>

<div class="container my-4">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-7 col-12">
            <form name="updateticket" id="updateticket" method="post">
                <table class="table table-bordered" cellspacing="0" cellpadding="0">

                    <tr height="50">
                        <td colspan="2" class="" style="padding-left:0px;">
                            <div class="text-green h2"> <b>Order Tracking Details !</b></div>
                        </td>

                    </tr>
                    <tr height="30">
                        <td ><b>order Id:</b></td>
                        <td ><?php echo $oid; ?></td>
                    </tr>
                    <?php
                    $ret = mysqli_query($con, "SELECT * FROM ordertrackhistory WHERE orderid='$oid'");
                    $num = mysqli_num_rows($ret);
                    if ($num > 0) {
                        while ($row = mysqli_fetch_array($ret)) {
                    ?>



                            <tr >
                                <td ><b>At Date:</b></td>
                                <td ><?php echo $row['postDate']; ?></td>
                            </tr>
                            <tr >
                                <td ><b>Status:</b></td>
                                <td ><?php echo $row['status']; ?></td>
                            </tr>
                            <tr >
                                <td ><b>Remark:</b></td>
                                <td ><?php echo $row['remarks']; ?></td>
                            </tr>


                            <tr>
                                <td colspan="2">
                                    <hr />
                                </td>
                            </tr>
                        <?php }
                    } else {
                        ?>
                        <tr>
                            <td colspan="2">Order Not Process Yet</td>
                        </tr>
                    <?php  }
                    $st = 'Delivered';
                    $rt = mysqli_query($con, "SELECT * FROM orders WHERE id='$oid'");
                    while ($num = mysqli_fetch_array($rt)) {
                        $currrentSt = $num['orderStatus'];
                    }
                    if ($st == $currrentSt) { ?>
                        <tr>
                            <td colspan="2"><b>
                                    Product Delivered successfully </b></td>
                        <?php }

                        ?>
                </table>
            </form>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>