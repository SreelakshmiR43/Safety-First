<?php 
include('config.php');
if(isset($_POST['submit']))
{
  
    $rank=$_POST['rank'];
    $post=$_POST['post'];
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $police_email=$_POST['police_email'];
    
$sql="select * from tbl_police_officers where (rank='$rank');";

    $res=mysqli_query($conn,$sql);

    if (mysqli_num_rows($res) > 0) {
      
        $row = mysqli_fetch_assoc($res);
      if($rank==isset($row['rank']))      {
    echo "<script>alert('This officer is already exist');window.location='adminhome.php'</script>"; 
    }
    
    } 
    else{

    
        $sql=mysqli_query($conn,"insert into tbl_police_officers(rank,post,name,mobile,police_email) values('$rank','$post','$name','$mobile','$police_email')");
       echo "<script>alert('Police Officer added successfully');window.location='police_officers.php'</script>";
           }
     }
    ?>