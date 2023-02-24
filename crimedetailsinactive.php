<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql3="UPDATE tbl_crimedetails set status='0' where crime_id='$id'";
if(mysqli_query($conn,$sql3))
{
    $_SESSION['msg'] = "Crime details deactivated successfully";
}
header("Location: crimedetailsdisplay.php");
?>