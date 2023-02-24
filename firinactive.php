<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql3="UPDATE tbl_fir set status='0' where fir_id='$id'";
if(mysqli_query($conn,$sql3))
{
    $_SESSION['msg'] = "FIR deactivated successfully";
}
header("Location: firdisplay.php");
?>