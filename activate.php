<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql4="UPDATE tbl_police_station set status='1' where station_id='$id'";
if(mysqli_query($conn,$sql4))
{
    $_SESSION['msg2'] = "Station activated successfully";
}
header("Location: policeadddisplay.php");
?>