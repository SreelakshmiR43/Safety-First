<?php 
include('config.php');
if(isset($_POST['submit']))
{
  
    $station_name=$_POST['station_name'];
    $district=$_POST['district'];
    $station_incharge=$_POST['station_incharge'];
    $phn_no=$_POST['phn_no'];
    $station_mail=$_POST['station_mail'];
    
$sql="select * from tbl_police_station where (station_name='$station_name');";

    $res=mysqli_query($conn,$sql);

    if (mysqli_num_rows($res) > 0) {
      
        $row = mysqli_fetch_assoc($res);
      if($station_name==isset($row['station_name']))      {
    echo "<script>alert('This station is already exist');window.location='adminhome.php'</script>"; 
    }
    
    } 
    else{

    
        $sql=mysqli_query($conn,"insert into tbl_police_station(station_name,district,station_incharge,phn_no,station_mail) values('$station_name','$district','$station_incharge','$phn_no','$station_mail')");
       echo "<script>alert('Station added successfully');window.location='policeadddisplay.php'</script>";
           }
     }
    ?>