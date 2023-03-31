<?php
session_start();
include ('config.php');

if(isset($_POST['register']))
{
    $id=$_POST['feed_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $date = $_POST['date'];
    
        
$query="UPDATE tbl_feedback SET `full_name`='$full_name',`email`='$email',`message`='$message',`date`='$date '  where feed_id='$id'";
$query_run=mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['status'] = "Feedback updated successfully";
    header('location:feedbackdisplay.php');
}
else
{
    echo "Unsuccessful";
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
   
    <title>USER PANEL</title>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <style>
  *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}  
body{
    height: 90vh;
    display:block;
   justify-content: center;
  align-items: center;
 } 
 .container{
   width: 100%;
  height: 800px;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;

}
.container .title{
  font-size: 25px;
  font-weight: bold;
  position: relative;
  padding: 60px 0 ;
  height: 100px;

}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 100%;
  border-radius: 5px;
  background: linear-gradient(135deg, #e68a71, #ff821b);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom:1px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 800;
 font-size:small;
  
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 35px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #e68a71;
}
 
 form .button{
   height: 40px;
   margin: 35px 0
  
 }
 form .button input{
   height: 100%;
   width: 40%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(135deg,#e68a71, #ff821b);
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg,#e68a71, #ff821b);
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }

  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}

</style>
<body>
<div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
     <span class="logo_name"> Safety First</span>
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
          <a href="complaintadddisplay.php">
            <i class='bx bx-file' ></i>
            <span class="links_name">Register Complaint </span>
          </a>
        </li>
        <li>
          <a href="feeddisplay.php">
            <i class='bx bx-file' ></i>
            <span class="links_name">Feedback Form </span>
          </a>
        </li>
        <li>
          <a href="newsadddisplay.php">
            <i class='bx bx-file' ></i>
            <span class="links_name">News Platform </span>
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
        <span class="user_name">User</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="container">
    <div class="title">Feedback display Form</div>
    <div class="content">

      <form  id="form" name="form"  action="#" method="post" autocomplete="off">
      <?php
     if(isset($_GET['feed_id']))
     {
        $feed_id=$_GET['feed_id'];

        $query=mysqli_query($conn,"select * from tbl_feedback where feed_id='$feed_id'");
        while($row=mysqli_fetch_array($query))
{
?>
        <div class="user-details">
        <input type="hidden" name="feed_id" value="<?= $row['feed_id'] ?>">
        <div class="input-box">
                <span class="details">Full Name</span>
                <input type="text" id="full_name" onkeyup="" name="full_name" placeholder="Enter your name" value= "<?=$row['full_name']?>" required>
                <span id="name" class="new" style="color: red; font-size: small;"></span>
              </div>
        
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" id="email" onkeyup="emailValidation(this)" name="email" placeholder="Enter your email" value= "<?=$row['email']?>"  required>
            <span id="mail" class="new" style="color: red; font-size: small;"></span>
          </div>
        
          
            
    </div>
        
            <div class="user-details">
          <div class="input-box">
          <div class="input-box">
                <span class="details">Feedback</span>
                <textarea rows="7" cols="50" id="message" onkeyup="" name="message" placeholder="message..." required><?=$row['message']?></textarea>
                <span id="msg" class="new" style="color: red; font-size: small;"></span>
              </div>
                
               </div>
               <div class="user-details">
        <div class="input-box">
            <span class="details">Date</span>
            <input type="date" id="date" onkeyup="" name="date" placeholder="Date"  value= "<?=$row['date']?>" required>
            <span id="dt" class="new" style="color: red; font-size: small;"></span>
          </div>
          
          </div>
</div>
        <div class="button">
          <input type="submit" name="register" value="Submit" >
          <?php }} ?> 
         </div>
      </form>
    </div>
  </div>
 
//   <!-- <script>

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