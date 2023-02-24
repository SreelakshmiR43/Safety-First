<?php
include('config.php');
$targetDir="fimages/";
if(isset($_POST["submit"]))
{ 
  $station_name = $_POST['station_name'];
  $fir_report = $_POST['fir_report'];
  $fir_date = $_POST['fir_date'];
  $place = $_POST['place'];
  $ipc_section = $_POST['ipc_section'];
  $crime_subject = $_POST['crime_subject'];
  $mode_of_operation = $_POST['mode_of_operation'];
  $img = $_FILES['img']['name'];
  $complainant_name = $_POST['complainant_name'];
  $officer = $_POST['officer'];
  $targetFilePath=$targetDir . $img;
  move_uploaded_file($_FILES["img"]["tmp_name"],$targetFilePath);

  $sql=mysqli_query($conn,"INSERT INTO tbl_fir(`station_name`,`fir_report`,`fir_date`,`place`,`ipc_section`,`crime_subject`,`mode_of_operation`,`image`,`complainant_name`,`officer`) VALUES('$station_name','$fir_report','$fir_date','$place','$ipc_section','$crime_subject','$mode_of_operation','$img','$complainant_name','$officer')");

    if($sql)
      {
       
    echo "<script>alert('Fir Added Successfully!!');
    // window.location='policehome.php'
    </script>";
      }
    else
      {
    echo "<script>alert('Error');window.location='policehome.php'</script>";
      }
    }
 
?>








