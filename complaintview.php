<?php
require_once("config.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Police</title>

    <style>
        h1 {
            text-align: center;
            font-size: 2.5em;
            font-weight: bold;
            padding-top: 2em;
        }
        

        .mycontainer {
            width: 90%;
            margin: 1.5rem auto;
            min-height: 60vh;
            
        }

        .mycontainer table {
            margin: 1.5rem auto;
            
        }
        .container-fluid{
            min-height: 15vh;
            background: linear-gradient(135deg, #e68a71, #ff821b);
        }
    </style>

</head>

<body>
    <nav class="navbar header-nav navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        
            <a class="navbar-brand" href="policehome.php"><h4>Station Panel</h4></a>
            <!-- <button class="btn-default" onclick="window.location.href='leavehist.php';">Leave History</button> </div> -->
            <!-- <nav class="nav navbar-right">
            <a class="nav-link active" href="#">Active</a>
            
            </nav>

            <button id="logout" onclick="window.location.href='logout.php';">Logout</button> </div> -->

            <ul class="nav justify-content-end">

            <!-- <li class="nav-item">
            <a class="nav-link" href="list_emp.php" style="color:white;">View Employees <span class="badge badge-pill" style="background-color:#2196f3;"><?php include('count_emp.php');?></span></a>
            </li>
             -->
            <li class="nav-item">
            <button id="logout" onclick="window.location.href='logout.php';">Logout</button> </div>
            </li>
            </ul>
            
    </nav>

    <h1>Complaint Details</h1>

    <div class="mycontainer">

        <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped">
                  <thead>
                      <th>SNo.</th>
                      <th>Evidence</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile Number</th>
                      <th>Subject</th>
                      <th>Description</th>
                      <th>Crime place</th>
                      <th>Crime Date</th>
                      <th>Police Station</th>
                      <th>Action</th>
                  </thead>
                  <tbody>
                    <!-- loading all leave applications of the user -->
                    <?php
                          $sql = mysqli_query($conn,"SELECT * FROM tbl_complaint");
                          if($sql){
                            $numrow = mysqli_num_rows($sql);
                            if($numrow!=0){
                                $cnt=1;
                                while($row1 = mysqli_fetch_array($sql)){
                                  $a= 'cimages/'.$row1['image'];
                                  echo "<tr>";
                                    echo "<td>$cnt</td>";
                                          echo"<td>";?>
                                          <img src="<?php echo $a ?> " style="width:150px; height:150px;">
                                         <?php echo " </td>";?>
                                       
                                       <?php echo " <td>{$row1['full_name']}</td>";?>
                                       <?php echo " <td>{$row1['email']}</td>";?>
                                       <?php echo "<td>{$row1['mob']}</td>";?>
                                       <?php echo "<td>{$row1['crime_type']}</td>";?>
                                       <?php echo "<td>{$row1['description']}</td>";?>
                                       <?php echo "<td>{$row1['crime_place']}</td>";?>
                                       <?php echo "<td>{$row1['date']}</td>";?>
                                       <?php echo " <td>{$row1['pstation']}</td>";?>
                                       <td>
               <?php
                    if($row1['status']==1){
                        echo '<p><a href="reject.php?id='.$row1['complaint_id'].'$status=1">Reject</a></p>';
                    }else{
                        echo '<p><a href="approve.php?id='.$row1['complaint_id'].'$status=0">Accept</a></p>';
                    }
                    ?>
                    <a href='pdf.php?id=<?php echo $row1['complaint_id'] ?>' type="button" class="btn btn-primary">download</a>
                                      
               
                     </tr>  <?php
                                         $cnt++; }       
                                    }
                                }
                               
                       ?> 
                            
                  </tbody>
              </table>
          </div>
    </div>

    <footer class="footer navbar navbar-expand-lg navbar-light bg-light" style="color:white;">
    </footer>
</body>

</html>

<?php


ini_set('display_errors', true);
error_reporting(E_ALL);
?>