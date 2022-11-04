<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="styleA.css">
    <title>NEWS DISPLAY</title>
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
      <span class="logo_name">Crime</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="newsadddisplay.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Add News</span>
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
          <img src="images/profile.jpg" alt="">
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
    <a href="news.php" class="button" style = "position:relative; left:710px; top:1px;">Add News</a>
    <table style="width:75%" cellpadding="10" cellspacing="4" border="3" align="center">
              
              <tr>
                  <th>S.No </th>
                  <th>News Title</th>
                  <th>Image</th>
                  <th>News Description</th>
                  <th>News Date</th>
                  <th>Delete</th>
                  <th>Edit</th>
                
              </tr>
              <?php
              include 'config.php';
              $query=mysqli_query($conn,"select * from tbl_news");
              
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>                                  
              <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <td><?php echo htmlentities($row['news_title']);?></td>
                  <td><?php echo htmlentities($row['image']);?></td>
                  <td><?php echo htmlentities($row['newsdes']);?></td>
                  <td> <?php echo htmlentities($row['news_date']);?></td>
                  <td>
               <?php
                    if($row['status']==1){
                        echo '<p><a href="inactivatenews.php?id='.$row['news_id'].'$status=1">Disable</a></p>';
                    }else{
                        echo '<p><a href="activatenews.php?id='.$row['news_id'].'$status=0">Enable</a></p>';
                    }
                    ?>
               <td><a href="news_edit.php?news_id=<?php echo $row['news_id']?>">Edit</a></td>
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

