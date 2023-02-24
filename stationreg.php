<?php
include('config.php');

if(isset($_POST['register']))
{
    $ps_name = $_POST['ps_name'];
    $station_email = $_POST['station_email'];
    $password = $_POST['password'];

$sql="select * from tbl_login where (email='$station_email' or password='$password');";

$res=mysqli_query($conn,$sql);

if(mysqli_num_rows($res)>0){
    $row=mysqli_fetch_assoc($res);
    if($station_email==isset($row['station_email'])){
        echo "<script>alert('already .')</script>"; 
    }
}
else{

$sql1 = "INSERT INTO tbl_login (`email`,`password`,`role`) VALUES ('$station_email','$password','station')";
$result=$conn->query($sql1);
if($result)
 {
  $logid = $conn->insert_id;
  $sql2 = "INSERT INTO tbl_stationreg(`ps_name`,`station_email`) 
  VALUES('$ps_name','$station_email')";
  $result = $conn->query($sql2);

  echo "<script>alert('Registration Successful.');window.location.href ='login2.html';</script>"; 
  header("LOCATION:login2.html");
}
  
else{
    $message = "error";
  }
}
}
?>









