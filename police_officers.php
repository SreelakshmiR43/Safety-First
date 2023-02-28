<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="styleA.css">
    <title>Officers</title>
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
      <span class="logo_name">Safety First</span>
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
            <span class="links_name">Police Station</span>
          </a>
        </li>
        <li>
          <a href="police_officers.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Police Officers</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Category</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Sub-Category</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
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
          <span class="admin_name">Admin</span>
          <i class='bx bx-chevron-down' ></i>
        </div>
      </nav>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>

    <a href="police_officers_add.html" class="button" style = "position:relative; left:710px; top:1px;">Add Police Officers</a>
    <table style="width:75%" cellpadding="10" cellspacing="4" border="3" align="center">
              
              <tr>
                  <th>S.No </th>
                  <th>Rank</th>
                  <th>Post</th>
                  <th>Name</th>
                  <th>Mobile Number</th>
                  <th>Police Officers Email</th>
                  <th>Delete</th>
                  <th>Edit</th>
                
              </tr>
              <?php
              include 'config.php';
              $query=mysqli_query($conn,"select * from tbl_police_officers");
              
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>                                  
              <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  
                  <td><?php echo htmlentities($row['rank']);?></td>
                  <td><?php echo htmlentities($row['post']);?></td>
                  <td><?php echo htmlentities($row['name']);?></td>
                  <td><?php echo htmlentities($row['mobile']);?></td>
                  <td><?php echo htmlentities($row['police_email']);?></td>
                  
               <td>
               <?php
                    // if($row['status']==1){
                    //     echo '<p><a href="inactivate.php?id='.$row['station_id'].'$status=1">Disable</a></p>';
                    // }else{
                    //     echo '<p><a href="activate.php?id='.$row['station_id'].'$status=0">Enable</a></p>';
                    // }
                    ?>
               <td><a href="officer_edit.php?police_id=<?php echo $row['police_id']?>">Edit</a></td>
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

