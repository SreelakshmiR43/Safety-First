<style> 
    .rot {
    width: 100px;
    height: 100px;
    position: relative;
    animation-name: example;
    animation-duration: 3s;  
    animation-iteration-count: infinite;
    }

    @keyframes example {
    from {top: 0px;}
    to {top: 300px;}
    }
</style>

<?php
    include 'config.php';
    $box = "SELECT * FROM `tbl_news` ORDER BY `news_id` DESC";
    $result = mysqli_query($conn,$box);
    if ($result)
    {
        if (mysqli_num_rows($result)>0)
        { 
            $search_data = mysqli_fetch_all($result);
            $_SESSION['allresults']= $search_data;
        } 
        else 
        {
            echo "No matching records found.";
        }
    }
   
?>

<?php
    if(isset($_POST["s1"]))
    {   
        $a=$row[1];   
        if($a)
        {
            echo "<script>window.open('post_feed.php','_self')</script>";
        }
        else
        {
            echo "Error occured";
        }	
    }	 
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./fonts/icomoon/style.css">
        <link rel="stylesheet" href="./css/owl.carousel.min.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="./css/home1.css"> -->
        <link rel="stylesheet" href="./css/home.css">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="css/newsstyle.css">
        <link rel="shortcut icon" href="./icons/favicon/facebook123.jpg" style="border-radius:50%;" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"/>
        
        <title>Crime_News</title>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="https://kit.fontawesome.com/10c6a50922.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/10c6a50922.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="./js/index.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
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

        <section class="main-con" >
            <div class="post-con"  >
                <?php
                    if(isset($_SESSION['allresults']))
                    {   
                        $result= $_SESSION['allresults'];
                        foreach ($result as $row)
                        { 
                            echo' 
                            <div class="post-con--box">
                                <div id="guest_add_main_div">
                                <div class="guest_add_div">
                                    
                                    <div class="guest_add_text_div">
                                        <p class="guest_add_name">'.$row[1].'</p>
                                        <a href="" class="guest_add_date">'. $row[4].'</a>
                                    </div>
                                    
                                </div>
                                </div>
                        
                                <div class="post-con--main">
                                    <img src="./newsimg/'.$row[2].'" alt="" class="post-con--main--img newsview_img">
                                </div>
                                        
                                    
                                <div class="post-con--reaction">
                                    <div id="guest_add_bottom_div">
                                        <p style="font-size: 15px;">'.$row[3].'</p>
                                    </div> 
                                </div>
                            </div>
                            ';
                        }
                    }           
                ?>                            
            </div>
        </section>
                
    </body>
</html>