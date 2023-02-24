<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql3="UPDATE tbl_complaint set status='0' where complaint_id='$id'";
if(mysqli_query($conn,$sql3))
{
    $_SESSION['msg'] = "Complaint rejected successfully";
}
header("Location: complaintview.php");
?>