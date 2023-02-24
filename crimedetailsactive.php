<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql4="UPDATE tbl_crimedetails set status='1' where crime_id='$id'";
if(mysqli_query($conn,$sql4))
{
    $_SESSION['msg2'] = "Crime details activated successfully";
}
header("Location: crimedetailsdisplay.php");
?>