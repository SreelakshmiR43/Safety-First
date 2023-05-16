<?php
session_start();
error_reporting(0);
include('config.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $id = $_GET['id'];
   
    $query = mysqli_query($conn, "UPDATE `tbl_complaint` SET `status` = 2 WHERE user_id = '$id'");
  
  if($query)
  {
   
   
require 'vendor/autoload.php';
include 'config.php';
$mail = new PHPMailer(true);


    $id = $_GET['id'];
    $query=mysqli_query($conn,"SELECT email FROM tbl_complaint WHERE user_id='$id'");
    while($row=mysqli_fetch_array($query)){
        $email = $row['email'];
      
        
    }


try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sreelakshmir2023b@mca.ajce.in';
    $mail->Password = 'Sreelakshmi14@';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Email properties
    $mail->setFrom('sreelakshmir2023b@mca.ajce.in', 'Police Station');
    $mail->addAddress($email, 'police');
    $mail->Subject = 'Request Approval ';
    $mail->Body = 'Hello,
                        approved'
                       ;

    // Send email
    $mail->send();
    echo "<script>
        alert('Email sent successfully!');
        window.location.href='policehome.php';
    </script>";
} catch (Exception $e) {
    echo "Email sending failed. Error: " . $mail->ErrorInfo;
}



  }

?>