<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql3="UPDATE tbl_news set status='0' where news_id='$id'";
if(mysqli_query($conn,$sql3))
{
    $_SESSION['msg'] = "News deactivated successfully";
}
header("Location: newsadddisplay.php");
?>