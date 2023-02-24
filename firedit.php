<?php
session_start();
include ('config.php');

if(isset($_POST['submit']))
{
  $id=$_POST['fir_id'];
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
        
$query="UPDATE tbl_fir SET `station_name`='$station_name',`fir_report`='$fir_report',`fir_date`='$fir_date',`place`='$place ',`ipc_section`='$ipc_section',`crime_subject`='$crime_subject',`mode_of_operation`='$mode_of_operation',`image`='$img',`complainant_name`='$complainant_name',`officer`='$officer' where fir_id='$id'";
$query_run=mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['status'] = "FIR updated successfully";
    header('location:firdisplay.php');
}
else
{
    echo "no";
}
}
 // complaintedit
 ?>



<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="styleA.css">
   
    <title>POLICE FIR PANEL</title>
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
  min-height: 190vh;
  background-color: #fff;
}

#create-account-form {
     width: 100%;
    height: 900px; 
    padding:25px;
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
.btn{
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
     <span class="logo_name"> True Crime</span>
    </div>
      <ul class="nav-links">
      <li>
            <a href="index.html" class="active">
              <i class='bx bx-home-alt' ></i>
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
          <a href="complaintview.php">
            <i class='bx bx-file' ></i>
            <span class="links_name">View Complaint </span>
          </a>
        </li>
        <li>
          <a href="fir.html">
            <i class='bx bx-file'  ></i>
            <span class="links_name">FIR</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-file'  ></i>
            <span class="links_name">Criminal Details</span>
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
        <img src="images/profile/profileuser.png" alt="">
        <span class="user_name">Police Station</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
    <form id="create-account-form"  action="#"  method="POST" enctype="multipart/form-data">
    <?php
     if(isset($_GET['fir_id']))
     {
        $fir_id=$_GET['fir_id'];
        $query=mysqli_query($conn,"select * from tbl_fir where fir_id='$fir_id'");
        while($row=mysqli_fetch_array($query))
{
?>
             
       <div class="title">
          <br> <h2> First Information Report [FIR]</h2>
       </div>

       <div class="input-group">
       <input type="hidden" name="fir_id" value="<?= $row['fir_id'] ?>">
         <label >District:</label><br>
         <select id="district" name="district"  style="width: 460px;height: 40px;" l >
             <option value="Kottayam">Kottayam</option>
           
         </select>
     </div>
          <div class="input-group">
           <label>Station Name</label>
           <input type="text" id="station_name" onkeyup="stnameValidation(this)" name="station_name" placeholder="Station Name" value= "<?=$row['station_name']?>" required >
           <span id="sname" class="new" style="color: red; font-size: small;"></span>
           </div>
           <div class="input-group">
             <h4><u>FIR :</u></h4>
             <label >Fir Report</label><br>
            <textarea   cols="50" rows="10" id="station_mail" onkeyup="stmailValidation(this)" name="fir_report" placeholder="Report..." value="<?=$row['fir_report']?>" required></textarea>
            <span id="smail" class="new" style="color: red; font-size: small;"></span>
           </div>
           <div class="input-group">
            <label >Fir date</label><br>
            <input type="date" id="fir_date" onkeyup="stmailValidation(this)" name="fir_date" value="<?=$row['fir_date']?>" required>
            <span id="smail" class="new" style="color: red; font-size: small;"></span>
           </div>
         </div>
         <div class="input-group">
           <label >Place Of Occurrence</label>
           <input type="text" id="place"  name="place" placeholder="Place " value="<?=$row['place']?>"required>
           <span id="plc" class="new" style="color: red; font-size: small;"></span>
      </div>
      <div class="input-group">
       <label >IPC Code(Section)</label>
       <input type="varchar" id="code" onkeyup="" name="ipc_section" value="<?=$row['ipc_section']?>" required>
       <span id="cd" class="new" style="color: red; font-size: small;"></span>
   </div>
           <div class="input-group">
             <label >Crime Subject</label>
             <input type="text" id="crime_subject" onkeyup="" name="crime_subject" placeholder="Crime type" value="<?=$row['crime_subject']?>" required>
             <span id="sub" class="new" style="color: red; font-size: small;"></span>
         </div>
     
         
         <div class="input-group">
           <label >Mode of Operation</label>
           <input type="varchar" id="mode_of_operation" onkeyup="" name="mode_of_operation" value="<?=$row['mode_of_operation']?>" required>
       </div>
      <div class="input-group">
       <label >Evidence</label>
       <input type="file" id="img"  name="img" value="<?=$row['image']?>" required>
       <span id="evid" class="new" style="color: red; font-size: small;"></span>
      </div>
       
      <div class="input-group">
       <label >Complainant Name</label>
       <input type="text" id="complainant_name"  name="complainant_name"  placeholder="Name" value="<?=$row['complainant_name']?>" required>
       <span id="plc" class="new" style="color: red; font-size: small;"></span>
       <div class="input-group">
         <h4><u>Officer Incharge,Police Station :</u></h4><br>
           <label >Directed(Name of officer)</label>
           <input type="text" id="officer" onkeyup="" name="officer" placeholder="Officer name" value="<?=$row['officer']?>" required>
           <span id="off" class="new" style="color: red; font-size: small;"></span>
       </div>
        
          <button type="submit" name="submit"class="btn">Update</button>
          <?php }} ?> 
   </form>

 
 
  <!-- <script>

//     // First name //

//     function fnameValidation(inputTxt){
     
//      var regx = /^[a-zA-Z]+$/;
//      var textField = document.getElementById("fame");
         
//      if(inputTxt.value != '' ){
     
//          if(inputTxt.value.length >= 2){
         
//              if(inputTxt.value.match(regx)){
//                  textField.textContent = '';
//                  textField.style.color = "green";
                     
//              }else{
//                  textField.textContent = 'only characters are allowded to insert!';
//                  textField.style.color = "red";
//              }  
//          }else{
//              textField.textContent = 'your input must more than two chracters';
//              textField.style.color = "red";
//          }   
//      }else{
//          textField.textContent = 'your are not allowed  to leave a field  empty';
//          textField.style.color = "red";
//      }
//     }

//  //Last name


//     function lnameValidation(inputTxt){
    
//     var regx = /^[a-zA-Z]+$/;
//     var textField = document.getElementById("lame");
        
//     if(inputTxt.value != '' ){
    
//         if(inputTxt.value.length >= 1){
        
//             if(inputTxt.value.match(regx)){
//                 textField.textContent = '';
//                 textField.style.color = "green";
                    
//             }else{
//                 textField.textContent = 'only characters are allowded to insert!';
//                 textField.style.color = "red";
//             }  
//         }else{
//             textField.textContent = 'your input must me more than two chracters';
//             textField.style.color = "red";
//         }   
//     }else{
//         textField.textContent = 'your are not allowed  to leave a field  empty';
//         textField.style.color = "red";
//     }
// }

// //email//

// function emailValidation(inputTxt){
//     // ^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$
//     var regx = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
//     var textField = document.getElementById("mail");
        
//     if(inputTxt.value != '' ){
//         if(inputTxt.value.match(regx)){
//             textField.textContent = '';
//             textField.style.color = "green";
//         }else{
//             textField.textContent = 'email id  is not valid!!! please insert a valid one';
//             textField.style.color = "red";
//         }  
//     }else{
//         textField.textContent = 'your are not allowed  to leave a field  empty';
//         textField.style.color = "red";
//     }
// }

// //pwd//

// function passwordValidation(inputTxt){
    
//     var regx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}/;
//     var textField = document.getElementById("pwd");
        
//     if(inputTxt.value != '' ){
//             if(inputTxt.value.match(regx)){
//                 textField.textContent = '';
//                 textField.style.color = "green";
                    
//             }else{
//                 textField.textContent = 'Must contain at least one number and one uppercase and lowercase letter and aleast 5 characters';
//                 textField.style.color = "red";
//             }    
//     }else{
//         textField.textContent = 'your are not allowed  to leave a field  empty';
//         textField.style.color = "red";
//     }
// }

// //cpwd//

// function cpasswordValidation(inputTxt){
    
//     var regx =  document.getElementById("pwd").value;
//     var regy =  document.getElementById("pwd1").value;
//     var textField = document.getElementById("pwd1");
//     var textField1 = document.getElementById("pwd");
        
//     if(inputTxt.value != '' ){    
//             if(regx == regy){
//                 textField.textContent = '';
//                 textField.style.color = "green";
                    
//             }else{
//                 textField.textContent = 'Entered to passwords are not same!!';
//                 textField.style.color = "red";
//             }  
//         }else{
//             textField.textContent = '';
//             textField.style.color = "red";
//         }  
// }

// //aadhar//

// function aadhar_noValidation(inputTxt){
   
//     var regx = /^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/;
//     var textField = document.getElementById("aadharno");
        
//     if(inputTxt.value != '' ){
//         if(inputTxt.value.match(regx)){
//             textField.textContent = '';
//             textField.style.color = "green";
//         }else{
//             textField.textContent = 'Your aadhar number  is not valid!!! please provide space after 4 digits';
//             textField.style.color = "red";
//         }  
//     }else{
//         textField.textContent = 'your are not allowed  to leave a field  empty';
//         textField.style.color = "red";
//     }
// }

// //number //

// function phn_noValidation(inputTxt){
   
//    var regx = /^\d{10}$/;
//    var textField = document.getElementById("phn");
       
//    if(inputTxt.value != '' ){
//        if(inputTxt.value.match(regx)){
//            textField.textContent = '';
//            textField.style.color = "green";
//        }else{
//            textField.textContent = 'Your Mobile Number Is Not Valid.';
//            textField.style.color = "red";
//        }  
//    }else{
//        textField.textContent = 'your are not allowed  to leave a field  empty';
//        textField.style.color = "red";
//    }
// }


// //house//

// function house_nameValidation(inputTxt){
     
//      var regx = /^[a-zA-Z]+$/;
//      var textField = document.getElementById("hame");
         
//      if(inputTxt.value != '' ){
     
//          if(inputTxt.value.length >= 2){
         
//              if(inputTxt.value.match(regx)){
//                  textField.textContent = '';
//                  textField.style.color = "green";
                     
//              }else{
//                  textField.textContent = 'only characters are allowded to insert!';
//                  textField.style.color = "red";
//              }  
//          }else{
//              textField.textContent = 'your input must more than two chracters';
//              textField.style.color = "red";
//          }   
//      }else{
//          textField.textContent = 'your are not allowed  to leave a field  empty';
//          textField.style.color = "red";
//      }
//   }

// //city//

//     function cityValidation(inputTxt){
     
//      var regx = /^[a-zA-Z]+$/;
//      var textField = document.getElementById("cty");
         
//      if(inputTxt.value != '' ){
     
//          if(inputTxt.value.length >= 2){
         
//              if(inputTxt.value.match(regx)){
//                  textField.textContent = '';
//                  textField.style.color = "green";
                     
//              }else{
//                  textField.textContent = 'only characters are allowded to insert!';
//                  textField.style.color = "red";
//              }  
//          }else{
//              textField.textContent = 'your input must more than two chracters';
//              textField.style.color = "red";
//          }   
//      }else{
//          textField.textContent = 'your are not allowed  to leave a field  empty';
//          textField.style.color = "red";
//      }
//  }

//  //POffice//


//     function post_officeValidation(inputTxt){
     
//      var regx = /^[a-zA-Z]+$/;
//      var textField = document.getElementById("po");
         
//      if(inputTxt.value != '' ){
     
//          if(inputTxt.value.length >= 2){
         
//              if(inputTxt.value.match(regx)){
//                  textField.textContent = '';
//                  textField.style.color = "green";
                     
//              }else{
//                  textField.textContent = 'only characters are allowded to insert!';
//                  textField.style.color = "red";
//              }  
//          }else{
//              textField.textContent = 'your input must more than two chracters';
//              textField.style.color = "red";
//          }   
//      }else{
//          textField.textContent = 'your are not allowed  to leave a field  empty';
//          textField.style.color = "red";
//      }
//     }

//     //pc//
//     function pin_codeValidation(inputTxt){
   
//    var regx = /^\d{6}$/;
//    var textField = document.getElementById("pc");
       
//    if(inputTxt.value != '' ){
//        if(inputTxt.value.match(regx)){
//            textField.textContent = '';
//            textField.style.color = "green";
//        }else{
//            textField.textContent = 'Your Pin code Is not Valid.';
//            textField.style.color = "red";
//        }  
//    }else{
//        textField.textContent = 'your are not allowed  to leave a field  empty';
//        textField.style.color = "red";
//    }
// }



// </script> -->
</body>
</html>