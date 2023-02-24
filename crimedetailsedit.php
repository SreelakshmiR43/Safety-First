<?php
session_start();
include ('config.php');

if(isset($_POST['submit']))
{
    $id=$_POST['crime_id'];
    $station=$_POST['station'];
    $crime_date=$_POST['crime_date'];
    $place_crime=$_POST['place_crime'];
    $ipc_section=$_POST['ipc_section'];
    $crime_description=$_POST['crime_description'];
    $suspect_name=$_POST['suspect_name'];
    $victim_details=$_POST['victim_details'];
        
$query="UPDATE tbl_crimedetails SET `station`='$station',`crime_date`='$crime_date',`place_crime`='$place_crime',`ipc_section`='$ipc_section ',`crime_description`='$crime_description',`suspect_name`='$suspect_name',`victim_details`='$victim_details' where crime_id='$id'";
$query_run=mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['status'] = "Crime Details updated successfully";
    header('location:crimedetailsdisplay.php');
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
          <a href="firdisplay.php">
            <i class='bx bx-file'  ></i>
            <span class="links_name">FIR</span>
          </a>
        </li>
        <li>
          <a href="crimedetailsdisplay.php">
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
    <form id="create-account-form"  action=""  method="POST" enctype="multipart/form-data">
    <?php
     if(isset($_GET['crime_id']))
     {
        $crime_id=$_GET['crime_id'];
        $query=mysqli_query($conn,"select * from tbl_crimedetails where crime_id='$crime_id'");
        while($row=mysqli_fetch_array($query))
{
?>
        
       <div class="title">
          <br> <h2> Crime Details </h2>
       </div>

           <div class="input-group">
           <input type="hidden" name="crime_id" value="<?= $row['crime_id'] ?>">
           <label>Station Name</label>
           <input type="text" id="station_name" onkeyup="stnameValidation(this)" name="station" placeholder="Station Name" value= "<?=$row['station']?>" required>
           <span id="sname" class="new" style="color: red; font-size: small;"></span>
           </div>
         
           <div class="input-group">
            <label >crime Date</label><br>
            <input type="date" id="crime_date" onkeyup="stmailValidation(this)" name="crime_date" value= "<?=$row['crime_date']?>" required>
            <span id="cd" class="new" style="color: red; font-size: small;"></span>
           </div>
         </div>
         <div class="input-group">
           <label >Place Of Occurrence</label>
           <input type="text" id="place"  name="place_crime" placeholder="Place "  value= "<?=$row['place_crime']?>" required>
           <span id="plc" class="new" style="color: red; font-size: small;"></span>
      </div>
      <div class="input-group">
       <label >IPC Code(Section)</label>
       <input type="varchar" id="code" onkeyup="" name="ipc_section" placeholder="IPC Section" value= "<?=$row['ipc_section']?>" required>
       <span id="cd" class="new" style="color: red; font-size: small;"></span>
   </div>
           <div class="input-group">
             <label >Crime Description</label><br>
             <textarea   cols="50" rows="10" type="text" id="crime_des" onkeyup="" name="crime_description" placeholder="Crime Description" value= "<?=$row['crime_description']?>" required></textarea>
             <span id="cd" class="new" style="color: red; font-size: small;"></span>
         </div>
     
         
         <div class="input-group">
           <label >Suspect Name</label>
           <input type="text" id="sname" onkeyup="" name="suspect_name" placeholder="Suspect Name" value= "<?=$row['suspect_name']?>" required>
           <span id="sub" class="new" style="color: red; font-size: small;"></span>
       </div>
     
       <div class="input-group">
           <label >Victim Details </label><br>
           <textarea   cols="50" rows="10" type="text" id="vdetails" onkeyup="" name="victim_details" placeholder="Victim Details" value= "<?=$row['victim_details']?>" required></textarea>
           <span id="vd" class="new" style="color: red; font-size: small;"></span>
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