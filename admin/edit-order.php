<?php
session_start();
$title = "Edit Order";
include('include/header.php');


$oid = intval($_GET['id']);
if (isset($_POST['submit2'])) {
    $status = $_POST['status'];
    $remark = $_POST['remark']; //space char

    $query = mysqli_query($con, "insert into ordertrackhistory(orderid,status,remarks) values('$oid','$status','$remark')");
    $sql = mysqli_query($con, "update orders set orderStatus='$status' where id='$oid'");
    echo "<script>alert('Order updated sucessfully...');location.href='index.php'</script>";
    //}
}


?>
<div class="container my-4">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-7 col-12">
            <form name="updateticket" id="updateticket" method="post">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">

                    <tr height="50">
                        <td colspan="2"  style="padding-left:0px;">
                            <div> <b>Update Order !</b></div>
                        </td>

                    </tr>
                    <tr height="30">
                        <td><b>order Id:</b></td>
                        <td><?php echo $oid; ?></td>
                    </tr>
                    <?php
                    $ret = mysqli_query($con, "SELECT * FROM ordertrackhistory WHERE orderid='$oid'");
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>



                        <tr height="20">
                            <td><b>At Date:</b></td>
                            <td><?php echo $row['postDate']; ?></td>
                        </tr>
                        <tr height="20">
                            <td><b>Status:</b></td>
                            <td><?php echo $row['status']; ?></td>
                        </tr>
                        <tr height="20">
                            <td><b>Remark:</b></td>
                            <td><?php echo $row['remarks']; ?></td>
                        </tr>


                        <tr>
                            <td colspan="2">
                                <hr />
                            </td>
                        </tr>
                    <?php } ?>
                    <?php
                    $st = 'Delivered';
                    $rt = mysqli_query($con, "SELECT * FROM orders WHERE id='$oid'");
                    while ($num = mysqli_fetch_array($rt)) {
                        $currrentSt = $num['orderStatus'];
                    }
                    if ($st == $currrentSt) { ?>
                        <tr>
                            <td colspan="2"><b>
                                    Product Delivered </b></td>
                        <?php } else {
                        ?>

                        <tr height="50">
                            <td>Status: </td>
                            <td><span>
                                    <select name="status" required="required">
                                        <option value="" selected hidden disabled>Select Status</option>
                                        <option value="in Process">In Process</option>
                                        <option value="Delivered">Delivered</option>
                                    </select>
                                </span></td>
                        </tr>

                        <tr>
                            <td>Remark:</td>
                            <td align="justify"><span>
                                    <textarea cols="50" rows="7" name="remark" required="required"></textarea>
                                </span></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td> <input type="submit" name="submit2" value="update" size="40" style="cursor: pointer;" />

                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </form>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>