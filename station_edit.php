<?php
session_start();
include ('config.php');

if(isset($_POST['update']))
{
  $station_id=$_POST['station_id'];
  $station_name=$_POST['station_name'];
    $district=$_POST['district'];
    $station_incharge=$_POST['station_incharge'];
    $phn_no=$_POST['phn_no'];
    $station_mail=$_POST['station_mail'];

$query="UPDATE tbl_police_station SET `station_name`='$station_name',`district`='$district',`station_incharge`='$station_icharge',`phn_no`='$phn_no',`station_mail`='$station_mail'  where station_id='$station_id'";
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
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="styleA.css">
    <title>ADMIN PANEL</title>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <style>
    * {
  padding:0;
  margin:0;
  box-sizing: border-box;
 font-family: 'Poppins', sans-serif;
}
body {
 
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background-color: #fff;
}

#create-account-form {
     width: 800px;
    height: 900px; 
    padding:24px;
  background-color: #fff;
}

.title {
  margin-bottom: 20px;
  font-size: 20x;
  font-weight: bold;
  position: relative;
  padding: 60px 0 ;
  height: 100px;
 
}

.input-group {
  margin:15px 0; 
  position:relative;
 }

.input-group label {
  display:inline-block;
  margin-bottom: 5px;
}

.input-group input {
  display:block;
  width: 700px;
  padding:10px;   
}


.btn {
   width: 100px;;
   padding:5px;
   font-size: 20px;
   background-color: orange;
   color:#fff;
   text-transform: uppercase;
   border:none;
}
</style>

<body>
    <div class="sidebar">
        <div class="logo-details">
          <i class='bx bxl-c-plus-plus'></i>
          <span class="logo_name">True Crime</span>
        </div>
          <ul class="nav-links">
          <li>
              <a href="index.html" class="active">
                <i class='bx bx-grid-alt' ></i>
                <span class="links_name">Home</span>
              </a>
            </li>
            <li>
              <a href="#" class="active">
                <i class='bx bx-grid-alt' ></i>
                <span class="links_name">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="policeadddisplay.php">
                <i class='bx bx-box' ></i>
                <span class="links_name">Add Police Station</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name">Add Category</span>
              </a>
            </li>
        
            <li class="log_out">
              <a href="logout.php">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Log out</span>
              </a>
            </li>
          </ul>
      </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="images/profile/profileuser.png"   >
        <span class="admin_name">Admin</span>
        </div>
    </nav>
    <form id="create-account-form"  action="#" autocomplete="off" method="POST">
    <?php
     if(isset($_GET['station_id']))
     {
        $station_id=$_GET['station_id'];
        $query=mysqli_query($conn,"select * from tbl_police_station where station_id='$station_id'");
        while($row=mysqli_fetch_array($query))
{
?>
        
        <div class="title">
            <h2>UPDATE POLICE STATION</h2>
        </div>
        <div class="input-group">
            <label for="name">Station Name</label>
            <input type="text" id="station_name" onkeyup="stnameValidation(this)" name="station_name" placeholder="Station Name" value="<?= $row['station_name'] ?>"  required>
            <span id="sname" class="new" style="color: red; font-size: small;"></span>
            </div>
        
            <div class="input-group">
                <label for="mail">Station Email</label>
                <input type="email" id="station_mail" onkeyup="stmailValidation(this)" name="station_mail" placeholder="Station Email" value="<?= $row['station_mail'] ?>" required>
                <span id="smail" class="new" style="color: red; font-size: small;"></span>
            </div>
        </div>
        <div class="input-group">
            <label for="district">District:</label><br>
            <select id="district" name="district"  style="width: 460px;height: 40px;" value="<?= $row['district'] ?>" >
                <option value="Kottayam">Kottayam</option>
              
            </select>
        </div>
         
        <div class="input-group">
            <label for="phone">Phone Number</label>
            <input type="phone" id="phn_no" onkeyup="mobValidation(this)" maxlength="10" name="phn_no" placeholder="Phone Number " value="<?= $row['phn_no'] ?>" required>
            <span id="mob" class="new" style="color: red; font-size: small;"></span>
          
            </div>

        <div class="input-group">
            <label for="station_incharge">Station Incharge</label>
            <input type="text" id="station_incharge" onkeyup="" name="station_incharge" placeholder="Inspector name" required value="<?= $row['station_incharge'] ?>">
            <span id="crc" class="new" style="color: red; font-size: small;"></span>
        </div>
            

       
       
        <button type="submit" value="UPDATE" name="update" class="btn">UPDATE</button>
        <?php }} ?> 
    </form>



<!-- 
     
    <script>
function stnameValidation(inputTxt){
     
     var regx = /^[a-zA-Z]+$/;
     var textField = document.getElementById("sname");
         
     if(inputTxt.value != '' ){
     
         if(inputTxt.value.length >= 2){
         
             if(inputTxt.value.match(regx)){
                 textField.textContent = '';
                 textField.style.color = "green";
                     
             }else{
                 textField.textContent = 'only characters are allowded to insert!';
                 textField.style.color = "red";
             }  
         }else{
             textField.textContent = 'your input must more than two chracters';
             textField.style.color = "red";
         }   
     }else{
         textField.textContent = 'your are not allowed  to leave a field  empty';
         textField.style.color = "red";
     }
    }

    function cityValidation(inputTxt){
     
     var regx = /^[a-zA-Z]+$/;
     var textField = document.getElementById("cty");
         
     if(inputTxt.value != '' ){
     
         if(inputTxt.value.length >= 2){
         
             if(inputTxt.value.match(regx)){
                 textField.textContent = '';
                 textField.style.color = "green";
                     
             }else{
                 textField.textContent = 'only characters are allowded to insert!';
                 textField.style.color = "red";
             }  
         }else{
             textField.textContent = 'your input must more than two chracters';
             textField.style.color = "red";
         }   
     }else{
         textField.textContent = 'your are not allowed  to leave a field  empty';
         textField.style.color = "red";
     }
    }
    function cityValidation(inputTxt){
    
    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("cty");
        
    if(inputTxt.value != '' ){
    
        if(inputTxt.value.length >= 2){
        
            if(inputTxt.value.match(regx)){
                textField.textContent = '';
                textField.style.color = "green";
                    
            }else{
                textField.textContent = 'only characters are allowded to insert!';
                textField.style.color = "red";
            }  
        }else{
            textField.textContent = 'your input must more than two chracters';
            textField.style.color = "red";
        }   
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function circleValidation(inputTxt){
    
    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("crc");
        
    if(inputTxt.value != '' ){
    
        if(inputTxt.value.length >= 2){
        
            if(inputTxt.value.match(regx)){
                textField.textContent = '';
                textField.style.color = "green";
                    
            }else{
                textField.textContent = 'only characters are allowded to insert!';
                textField.style.color = "red";
            }  
        }else{
            textField.textContent = 'your input must more than two chracters';
            textField.style.color = "red";
        }   
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function mobValidation(inputTxt){
   
    var regx = /^\d{10}$/;  
    var textField = document.getElementById("mob");
        
    if(inputTxt.value != '' ){
        if(inputTxt.value.match(regx)){
            textField.textContent = '';
            textField.style.color = "green";
        }else{
            textField.textContent = 'Your phone number is not valid!!! please insert a valid one';
            textField.style.color = "red";
        }  
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function stmailValidation(inputTxt){
    // ^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$
    var regx = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    var textField = document.getElementById("smail");
        
    if(inputTxt.value != '' ){
        if(inputTxt.value.match(regx)){
            textField.textContent = '';
            textField.style.color = "green";
        }else{
            textField.textContent = 'email id  is not valid!!! please insert a valid one';
            textField.style.color = "red";
        }  
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}


    </script> -->
  
</body>

</html>





