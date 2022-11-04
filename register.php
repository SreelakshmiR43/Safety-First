<?php
include('config.php');

if(isset($_POST['register']))
{
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$house_name = $_POST['house_name'];
$city = $_POST['city'];
$post_office = $_POST['post_office'];
$pin_code = $_POST['pin_code'];
$aadhar_no= $_POST['aadhar_no'];
$phn_no = $_POST['phn_no'];
$password = $_POST['password'];
$sql="select * from tbl_login where (email='$email' or password='$password');";



$sql1 = "INSERT INTO tbl_login (`email`,`password`,`role`) VALUES ('$email','$password','user')";
$result=$conn->query($sql1);
if($result)
 {
  $logid = $conn->insert_id;
  $sql2 = "INSERT INTO tbl_registration(`first_name`,`last_name`,`dob`,`gender`,`house_name`,`city`,`post_office`,`pin_code`,`aadhar_no`,`phn_no`) 
  VALUES('$first_name','$last_name','$dob','$gender','$house_name','$city','$post_office','$pin_code','$aadhar_no','$phn_no')";
  $result = $conn->query($sql2);
  echo "<script>alert('Registration Successful.');window.location.href ='login2.html';</script>"; 
  header("LOCATION:login2.html");
}
}
  
else{
    $message = "error";
  }
?>









