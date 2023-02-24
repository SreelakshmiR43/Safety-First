<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql4="UPDATE tbl_fir set status='1' where fir_id='$id'";
if(mysqli_query($conn,$sql4))
{
    $_SESSION['msg2'] = "FIR activated successfully";
}
header("Location: firdisplay.php");
?>