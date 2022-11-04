<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql3="UPDATE tbl_police_station set status='0' where station_id='$id'";
if(mysqli_query($conn,$sql3))
{
    $_SESSION['msg'] = "Police Station deactivated successfully";
}
header("Location: policeadddisplay.php");
?>