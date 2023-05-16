
<?php
include ('config.php');

session_start();
error_reporting(0); 
    $e=$_SESSION['email'];
    echo $_SESSION['email'];
    
    if(!empty($e)){
        $q="select login_id from tbl_login where email='$e'";
        $res=mysqli_query($conn,$q);
        $row=mysqli_fetch_array($res);
        $login_id= $row['login_id'];
        echo $login_id;
// if($_SESSION['email']){
//     $e=$_SESSION['email'];
    
//     $sql3=mysqli_query($conn,"SELECT login_id from tbl_login where email='$e'");
//     while($row=mysqli_fetch_array($sql3))
//     {
//       $e=$row['login_id'];
//     }
//     // echo $e;
// }else{
//     header("location:index.html");
// }





if(isset($_POST['submit']))
{
    
    $registration_number=$_POST['registration_number'];
    $owner_name=$_POST['owner_name'];
    $owner_address=$_POST['owner_address'];
    $amount=$_POST['amount'];
    $offence_type=$_POST['offence_type'];
    $fine_date=$_POST['fine_date'];
    $fine_time=$_POST['fine_time'];
    $owner_contact=$_POST['owner_contact'];
    $owner_email=$_POST['owner_email'];
    
       
//     $q="select login_id from tbl_login where email='$e'"; 
//     $res=mysqli_query($conn,$q);
// $row=mysqli_fetch_array($res);
// $login_id= $row['login_id'];
// echo $login_id;
    $sql="select * from tbl_vehicle where (registration_number='$registration_number');";

    $res=mysqli_query($conn,$sql);

    if (mysqli_num_rows($res) > 0) {
      
        $row = mysqli_fetch_assoc($res);
      if($registration_number==isset($row['registration_number']))      {
    echo "<script>alert('This vehicle is already registered');window.location='policehome.php'</script>"; 
    }
    
    } 
    else{

      
        $sql=mysqli_query($conn,"insert into tbl_vehicle(login_id,registration_number,owner_name,owner_address,amount,offence_type,fine_date,fine_time,owner_contact,owner_email,status) values('$login_id','$registration_number','$owner_name','$owner_address','$amount','$offence_type','$fine_date','$fine_time','$owner_contact','$owner_email','active')");
       echo "<script>alert('Vehicle added successfully');window.location='vehicle_display.php'</script>";
           }
     }}
    ?>
