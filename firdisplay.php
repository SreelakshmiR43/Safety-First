<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="styleA.css">
    <title>FIR display</title>
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
          <a href="complaintview.php">
            <i class='bx bx-file' ></i>
            <span class="links_name">View Complaint</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class='bx bx-file'  ></i>
            <span class="links_name">FIR</span>
          </a>
        </li>
        <li>
          <a href="crimedetailsdisplay.php">
            <i class='bx bx-file' ></i>
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
          <input type="text" placeholder="Search...">
          <i class='bx bx-search' ></i>
        </div>
        <div class="profile-details">
          <img src="images/profile/profileuser.png" alt="">
          <span class="user_name">Police Station</span>
          <i class='bx bx-chevron-down' ></i>
        </div>
      </nav>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <h2><u>FIR</u></h2>
    <a href="fir.html" class="button" style = "position:relative; left:710px; top:1px;">Add FIR</a>
    <table style="width:75%" cellpadding="10" cellspacing="4" border="3" align="center">
              
              <tr>

                  <th>S.No </th>
                  <th>Station Name</th>
                  <th>Fir Report</th>
                  <th>Fir date</th>
                  <th>Place Of Occurrence</th>
                  <th>IPC Code(Section)</th>
                  <th>Crime Subject</th>
                  <th>Mode of Operation</th>
                  <th>Evidence</th>
                  <th>Complainant Name</th>
                  <th>Directed(Name of officer)</th>
                 <th>Delete</th>
                  <th>Update</th>
                
              </tr>
              <?php
              include 'config.php';
              $query=mysqli_query($conn,"select * from tbl_fir");
              
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>                                  
              <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <td><?php echo htmlentities($row['station_name']);?></td>
                  <td><?php echo htmlentities($row['fir_report']);?></td>
                  <td><?php echo htmlentities($row['fir_date']);?></td>
                  <td><?php echo htmlentities($row['place']);?></td>
                  <td> <?php echo htmlentities($row['ipc_section']);?></td>
                  <td><?php echo htmlentities($row['crime_subject']);?></td>
                  <td><?php echo htmlentities($row['mode_of_operation']);?></td>
                  <td><?php echo htmlentities($row['image']);?></td>
                  <td><?php echo htmlentities($row['complainant_name']);?></td>
                  <td><?php echo htmlentities($row['officer']);?></td>
                  <!-- <td>?php echo htmlentities($row['status']);?></td> -->
                  <td>
               
               <?php
                    if($row['status']==0){
                        echo '<p><a href="firactive.php?id='.$row['fir_id'].'$status=0">Disable</a></p>';
                    }else{
                        echo '<p><a href="firinactive.php?id='.$row['fir_id'].'$status=1">Enable</a></p>';
                    }
                    ?>
               <td><a href="firedit.php?fir_id=<?php echo $row['fir_id']?>">Edit</a></td>
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

