<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql4="UPDATE tbl_news set status='1' where news_id='$id'";
if(mysqli_query($conn,$sql4))
{
    $_SESSION['msg2'] = "News activated successfully";
}
header("Location: newsadddisplay.php");
?>