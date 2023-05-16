<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql4="UPDATE tbl_complaint set status='1' where complaint_id='$id'";
if(mysqli_query($conn,$sql4))
{
    $_SESSION['msg2'] = "Complaint Approved successfully";
}
header("Location: complaintview.php");
?>