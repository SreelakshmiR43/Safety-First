<?php
session_start();
include ('config.php');

if(isset($_POST['submit']))
{
    $id=$_POST['news_id'];
    $news_title = $_POST['news_title'];
    $image=$_FILES["image"]["name"];
    $newsdes = $_POST['newsdes'];
    $news_date = $_POST['news_date'];
        
$query="UPDATE tbl_news SET `news_title`='$news_title',`image`='$image',`newsdes`='$newsdes',`news_date`='$news_date'  where news_id='$id'";
$query_run=mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['status'] = "News updated successfully";
    header('location:newsadddisplay.php');
}
else
{
    echo "no";
}
}

// stationedit
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/news.css">
  </head>
  <body>
    <form method="POST" action="#" autocomplete="off">

    <?php
     if(isset($_GET['news_id']))
     {
        $news_id=$_GET['news_id'];
        $query=mysqli_query($conn,"select * from tbl_news where news_id='$news_id'");
        while($row=mysqli_fetch_array($query))
{
?>

<div class="container">
    <div class="title">
      UPDATE NEWS
    </div>
   
    <div class="input-group">
    <input type="hidden" name="news_id" value="<?= $row['news_id'] ?>">
       <div class="input-group">
          <label>News Title</label>
          <input type="text" class="input" name="news_title" placeholder="News Title" value="<?= $row['news_title'] ?>" required>
       </div>   
       <div class="input-group">
       <label for="upimg">Upload Image </label>
        <input type="file" class="input" name="image"  value="<?= $row['image'] ?>" required>
     </div> 
       
      <div class="input-group">
          <label>News Description</label>
          <input type="text" class="input" name="newsdes" placeholder="Enter news Description" value="<?= $row['newsdes'] ?>" required>
       </div> 
       <div class="input-group">
        <label>News Date</label>
        <input type="date" class="input" name="news_date"  value="<?= $row['news_date'] ?>" required>
     </div> 

     
      <div class="input-group">
        <input type="submit" value="UPDATE" name="submit" class="btn">
      </div>
    </div>
    <?php }} ?> 
</div>
</form>
</body>
</html>


