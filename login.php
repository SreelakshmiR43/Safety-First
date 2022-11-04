<?php
session_start();
include('config.php');

if(isset($_POST['submit']))
{
  $email=$_POST["email"];
  $password=$_POST["password"];

  $sql="select * from tbl_login where (email='$email' and password='$password');";
  $result = mysqli_query($conn, $sql);


  if (mysqli_num_rows($result) > 0){

    foreach($result as $data)
    {
      $email=$data['email'];
      $password=$data['password'];
      $role=$data['role'];
    }
    $_SESSION['role']="$role";
    $_SESSION['email']="$email";
    $_SESSION['auth_user']=[
      'email'=>$email,
      'password'=>$password
    ];

    if($_SESSION['role']=='admin')
    {
      $_SESSION['message']="Welcome";
      header("location:adminhome.php");
      exit(0);
    }
    else if($_SESSION['role']=='user')
    {
      $_SESSION['message']="Welcome";
       header("location:userhome.php");
      exit(0);
    }
    else if($_SESSION['role']=='station')
    {
      $_SESSION['message']="Welcome";
       header("location:#");
      exit(0);
    }
}
  else
  {

    echo "<h1>Login Failed!!!!. Invalid account details</h1>";

  }
}
?>