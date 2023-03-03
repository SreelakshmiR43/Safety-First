<?php
include('config.php');

if(isset($_POST["submit"]))
{

    $news_title = $_POST['news_title'];
    $i=$_FILES["images"]["name"];
    $newsdes = $_POST['newsdes'];
    $news_date = $_POST['news_date'];
  
    move_uploaded_file($_FILES["images"]["tmp_name"],"newsimg/".$i);
    
    $sql=mysqli_query($conn,"INSERT INTO tbl_news(`news_title`,`image`,`newsdes`,`news_date`) VALUES('$news_title', '$i', '$newsdes','$news_date')");

    if($sql)
      {
       
    echo "<script>alert('News Added Successfully!!');window.location='policehome.php'</script>";
      }
    else
      {
    echo "<script>alert('Error');window.location='policehome.php'</script>";
      }
    }
    
    
    
?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="styleA.css">
    <title>ADD NEWS </title>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a href="complaintview.php">
              <i class='bx bx-file' ></i>
              <span class="links_name">View Complaint</span>
            </a>
          </li>
          <li>
            <a href="firdisplay.php">
              <i class='bx bx-file'  ></i>
              <span class="links_name">FIR</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class='bx bx-file'  ></i>
              <span class="links_name">Crime Details</span>
            </a>
          </li>
          <li>
          <a href="newsadddisplay.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Add News</span>
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
          <span class="admin_name">Police Station</span>
          <i class='bx bx-chevron-down' ></i>
        </div>
      </nav>

	<form id="create-account-form"  action="#"  autocomplete="off" method="POST" enctype="multipart/form-data">
		  <div class="title">
            <h2>Add News </h2>
		 </div>
        <div class="input-group">
            <label for="nttl">News Title</label>
            <input type="text" id="title" onkeyup="titleValidation(this)" name="news_title" placeholder="News Title" required>
            <span id="ttl" class="new" style="color: red; font-size: small;"></span>
		 </div>
		 <div class="input-group">
				<label for="upimg">Upload Image </label>
				<input type="file" id="image" onkeyup="imgValidation(this)" name="images"  required>
				<span id="crc" class="new" style="color: red; font-size: small;"></span>
			</div>
        <div class="input-group">
            <label for="description">News Description</label><br>
            <textarea cols="50" rows="10" type="text" id="newsdes" onkeyup="ndValidation(this)" name="newsdes" row="4" cols="47" placeholder="News Description" required></textarea>
            <span id="newsd" class="new" style="color: red; font-size: small;"></span>
         </div>
        <div class="input-group">
            <label for="date">News Date</label>
            <input type="date" id="date"  name="news_date" max="2023-01-01" placeholder="Enter today's  Date" required>
            <span id="dt" class="new" style="color: red; font-size: small;"></span>
        </div>
        <button type="submit" name="submit"class="btn">Add</button>
    </form>

<!-- JavaScript     -->
<script>

	function titleValidation(){
		
		var regx = /^[a-zA-Z]+$/;
     var textField = document.getElementById("ttl");
         
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
	function ndValidation(){

		var regx = /^[a-zA-Z]+$/;
     var textField = document.getElementById("newsd");
         
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

</script>

  

</body>
</html>





