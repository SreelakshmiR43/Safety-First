<?php
include('config.php');
$targetDir="cimages/";
if(isset($_POST["register"]))
{ 
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $mob = $_POST['mob'];
  $crime_type = $_POST['crime_type'];
  $description = $_POST['description'];
  $crime_place = $_POST['crime_place'];
  $date = $_POST['date'];
  $imagee = $_FILES['imagee']['name'];
  $pstation = $_POST['pstation']; 
  $targetFilePath=$targetDir . $imagee;
  move_uploaded_file($_FILES["imagee"]["tmp_name"],$targetFilePath);

  $sql=mysqli_query($conn,"INSERT INTO tbl_complaint(`full_name`,`email`,`mob`,`crime_type`,`description`,`crime_place`,`date`,`image`,`pstation`) VALUES('$full_name','$email','$mob','$crime_type','$description','$crime_place','$date','$imagee','$pstation')");

    if($sql)
      {
       
    echo "<script>alert('Your complaint Added Successfully!!');
     window.location='userhome.php'
    </script>";
      }
    else
      {
    echo "<script>alert('Error');window.location='userhome.php'</script>";
      }
    }
 
?>








