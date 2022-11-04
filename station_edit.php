<?php
session_start();
include ('config.php');

if(isset($_POST['submit']))
{
  $id=$_POST['station_id'];
  $station_name=$_POST['station_name'];
  $district=$_POST['district'];
  $city=$_POST['city'];
  $circle=$_POST['circle'];
  $phn_no=$_POST['phn_no'];
  $station_mail=$_POST['station_mail'];
        
$query="UPDATE tbl_police_station SET `station_name`='$station_name',`district`='$district',`city`='$city',`circle`='$circle',`phn_no`='$phn_no',`station_mail`='$station_mail'  where station_id='$id'";
$query_run=mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['status'] = "Station updated successfully";
    header('location:policeadddisplay.php');
}
else
{
    echo "no";
}
}

// stationedit
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stationadd.css">
  </head>
  <body>
    <form method="POST" action="#" autocomplete="off">

    <?php
     if(isset($_GET['station_id']))
     {
        $station_id=$_GET['station_id'];
        $query=mysqli_query($conn,"select * from tbl_police_station where station_id='$station_id'");
        while($row=mysqli_fetch_array($query))
{
?>

<div class="container">
    <div class="title">
      UPDATE POLICE STATION DETAILS
    </div>
   
    <div class="input-group">
    <input type="hidden"name="station_id" value="<?= $row['station_id'] ?>">
       <div class="input-group">
          <label>Station Name</label>
          <input type="text" class="input" name="station_name" placeholder="Station Name" value="<?= $row['station_name'] ?>" required>
       </div>   
       <div class="input-group">
        <label>District</label>
        <input type="text" class="input" name="district" placeholder="District" value="<?= $row['district'] ?>" required>
     </div> 
       
      <div class="input-group">
          <label>City</label>
          <input type="text" class="input" name="city" placeholder="City" value="<?= $row['city'] ?>" required>
       </div> 
       <div class="input-group">
        <label>Circle Inspector</label>
        <input type="text" class="input" name="circle" placeholder="Circle" value="<?= $row['circle'] ?>" required>
     </div> 

     <div class="input-group">
        <label>Phone Number</label>
        <input type="phone" class="input" name="phn_no" placeholder="Phone Number" value="<?= $row['phn_no'] ?>" required>
     </div>
     <div class="input-group">
        <label>Station Email</label>
        <input type="email" class="input" name="station_mail" placeholder="Email id" value="<?= $row['station_mail'] ?>" required>
     </div>  
      <div class="input-group">
        <input type="submit" value="UPDATE" name="submit" class="btn">
      </div>
    </div>
    <?php }} ?> 
</div>
</form>
</body>
</html>


