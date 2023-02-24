<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="styleA.css">
    <title> POLICE PANEL</title>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
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
            <i class='bx bx-file' ></i>
            <span class="links_name">FIR</span>
          </a>
        </li>
        <li>
          <a href="crimedetailsdisplay.php">
            <i class='bx bx-file' ></i>
            <span class="links_name">Crime Details</span>
          </a>
        </li>
        <li>
          <a href="newsadddisplay.php">
            <i class='bx bx-file' ></i>
            <span class="links_name">News</span>
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

   
     
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>

