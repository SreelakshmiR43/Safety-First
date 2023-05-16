<?php
include ('config.php');

session_start();
// if($_SESSION['email']){
//     $e=$_SESSION['email'];
//     //  echo $e;
// }else{
//     header("location:index.html");
// }

          
           
         
?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="styleA.css">
    <title>Vehicle DISPLAY</title>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
     <style>
    .container {
        width: 110%;
        margin: auto;
        font-family: Arial, sans-serif;
        background-color: #fff;
        padding: 20px;
        border: 2px solid #000;
        position:absolute;
    }
    .header {
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .details {
        display:flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .details label {
        font-weight: bold;
    }
    .table {
        border-collapse: collapse;
        width: 100%;
    }
    .table th, .table td {
        padding: 10px;
        border: 1px solid #000;
        text-align: center;
    }
    .total {
        display: flex;
        justify-content: flex-end;
        font-weight: bold;
        margin-top: 20px;
    }
    .total label {
        margin-right: 20px;
    }
    .btn-custom {
    background-color: blue; /* Set the background color */
    color: white; /* Set the text color */
    border: none; /* Remove the border */
    padding: 10px 20px; /* Set the padding */
    text-align: center; /* Center the text */
    text-decoration: none; /* Remove text underline */
    display: inline-block; /* Make the button a block element */
    font-size: 10px; /* Set the font size */
    cursor: pointer; /* Change cursor to pointer on hover */
    border-radius: 5px; /* Add rounded corners */
}

.btn-custom:hover {
    background-color: #3e8e41; /* Darken background color on hover */
}

</style>
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
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
          <a href="newsview.php">
            <i class='bx bx-file' ></i>
            <span class="links_name">News Platform</span>
          </a>
        </li>
        
        <li>
          <a href="pay_fine.html">
            <i class='bx bx-file' ></i>
            <span class="links_name">Pay Vehicle Fine</span>
          </a>
        </li>
        <li>
          <a href="feedback.html">
            <i class='bx bx-file' ></i>
            <span class="links_name">Feedback</span>
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
          <input type="text" placeholder="Search...">
          <i class='bx bx-search' ></i>
        </div>
        <div class="profile-details">
          <img src="images/profile/profileuser.png" alt="">
          <span class="admin_name">User</span>
          <i class='bx bx-chevron-down' ></i>
        </div>
      </nav>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
  <form><input type="hidden" id="name1" value="<?php echo $e; ?>">
  <div class="container">
    <div class="header">Fine Information</div>
   <table class="table">
    <tr>
        <th>S.No </th>
        <th>Registration Number</th>
        <th>Owner Name</th>
        <th>Owner Address</th>
        <th>Amount(INR)</th>
        <th>Offence Type</th>
        <th>Fine Date</th>
        <th>Fine Time</th>
        <th>Owner Contact</th>
        <th>Owner Email</th>
        <th>Payment</th>
    </tr>

   

 
<?php

$e=$_SESSION['email'];
$q="select login_id from tbl_login where email='$e'";
$res=mysqli_query($conn,$q);
$row=mysqli_fetch_array($res);
$login_id= $row['login_id'];
echo $login_id;

    $query = mysqli_query($conn, "SELECT * FROM tbl_vehicle  WHERE login_id='$login_id' AND STATUS='active'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
//   $status = $row['status'];
//   if ($status == 'active') {
//     // $status_display = 'Pending';
//   } elseif ($status == 'approved') {
//     $status_display = 'Approved';
//   } elseif ($status == 'rejected') {
//     $status_display = 'Rejected';
//   } else {
//     $status_display = 'Unknown';
//   }
?>
<tr>
  <td><?php echo htmlentities($cnt);?></td>
  <td><?php echo htmlentities($row['registration_number']);?></td>
  <td><?php echo htmlentities($row['owner_name']);?></td>
  <td><?php echo htmlentities($row['owner_address']);?></td> 
  <td><?php echo htmlentities($row['amount']);?></td>
  <td><?php echo htmlentities($row['offence_type']);?></td>
  <td><?php echo htmlentities($row['fine_date']);?></td>
  <td><?php echo htmlentities($row['fine_time']);?></td>
  <td><?php echo htmlentities($row['owner_contact']);?></td>
  <td><?php echo htmlentities($row['owner_email']);?></td>
  <td><?php echo htmlentities($row['status']);?></td>

         
 
 


</tr>

<?php $cnt=$cnt+1; } ?>
              
</table>


</form>

</body>
</html>