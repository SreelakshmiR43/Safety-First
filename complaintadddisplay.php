<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="styleA.css">
    <title>Complaint display</title>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
      th {
  height: 50px;
  vertical-align: bottom;
}
td {
  height: 50px;
  vertical-align: bottom;
}
.button {
  background: linear-gradient(120deg,#e68a71, #ff821b);
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
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
            <span class="links_name">Register Complaint</span>
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
          <span class="user_name">User</span>
          <i class='bx bx-chevron-down' ></i>
        </div>
      </nav>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
    <a href="complaint.html" class="button" style = "position:relative; left:710px; top:1px;">Add Complaint</a>
    <table style="width:75%" cellpadding="10" cellspacing="4" border="3" align="center">
              
              <tr>
                  <th>S.No </th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Description</th>
                  <th>Place Of Occurrence</th>
                  <th>Date of Occurrence</th>
                  <th>Proof</th>
                  <th>police sstation</th>
                 <th>Status</th>
                  <th>Edit</th>
                
              </tr>
              <?php
              include 'config.php';
              $query=mysqli_query($conn,"select * from tbl_complaint");
              
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>                                  
              <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <td><?php echo htmlentities($row['full_name']);?></td>
                  <td><?php echo htmlentities($row['email']);?></td>
                  <td><?php echo htmlentities($row['description']);?></td>
                  <td><?php echo htmlentities($row['crime_place']);?></td>
                  <td> <?php echo htmlentities($row['date']);?></td>
                  <td><?php echo htmlentities($row['image']);?></td>
                  <td><?php echo htmlentities($row['pstation']);?></td>
                  
                  <?php
               if($row['status'] ==0){
                                      echo "<td>pending</td>";
                                    }
                                    else if($row['status'] ==1){
                                      echo "<td>rejected</td>";
                                    }
                                    
               ?>
               <td><a href="complaintedit.php?complaint_id=<?php echo $row['complaint_id']?>">Edit</a></td>
              </tr>
               
              </tr>
              <?php $cnt=$cnt+1; } ?>
              
      </table>

    </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  

</body>
</html>

