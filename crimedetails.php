<?php 
include('config.php');
if(isset($_POST['submit']))
{
  
    $station=$_POST['station'];
    $crime_date=$_POST['crime_date'];
    $place_crime=$_POST['place_crime'];
    $ipc_section=$_POST['ipc_section'];
    $crime_description=$_POST['crime_description'];
    $suspect_name=$_POST['suspect_name'];
    $victim_details=$_POST['victim_details'];
  
    $sql=mysqli_query($conn,"INSERT INTO tbl_crimedetails(`station`,`crime_date`,`place_crime`,`ipc_section`,`crime_description`,`suspect_name`,`victim_details`) VALUES('$station','$crime_date','$place_crime','$ipc_section','$crime_description','$suspect_name','$victim_details')");

    if($sql)
      {
       
    echo "<script>alert('Your Crime details Added Successfully!!');
    // window.location='policehome.php'
    </script>";
      }
    else
      {
    echo "<script>alert('Error');window.location='policehome.php'</script>";
      }
    }
 
?>