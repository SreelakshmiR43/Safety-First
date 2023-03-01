<?php
session_start();
require_once 'FPDF/fpdf.php';
require_once 'config.php';


//    if(isset($_GET['id']))
//    {
//     $id=$_GET['id'];
// $query="SELECT * FROM `tbl_complaint`where complaint_id='$id'";
// $data = mysqli_query($conn,$query);
//     $pdf =new FPDF('p','mm','a4');
//     $pdf->SetFont('Times', 'B', 20);
//     $pdf->AddPage();
    
//     $pdf->SetFont('Times', 'B', 20);
    
    
// $pdf->Rect(10, 8, 190, 280, 'D');

//     while($row = mysqli_fetch_assoc($data))   
//     {
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        // echo($id);
        $query="SELECT * FROM `tbl_complaint`where complaint_id='$id'";
        $data = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($data))
            {
                $pdf =new FPDF('p','mm','a4');
                $pdf->SetFont('Times', 'B', 20);
                $pdf->AddPage();
                $pdf->SetFont('Times', 'B', 20);
                $pdf->Rect(10, 8, 190, 280, 'D');
  $pdf->Cell(30);
$pdf->Cell(60,30,'           SAFETY FIRST-Complaint Details ');
// $pdf->Cell(60,20,"               FARMER'S ASSISTANT ");
            $pdf->Ln();
            $pdf->Line(10,40,200,40);
            $pdf->Ln(15);
            $pdf->SetFont('Times', 'B', 13);
            $pdf->Cell(45,5,'Name :',0,0,'C');
            $pdf->Cell(45,5,$row['full_name'],1,0);
            $pdf->Cell(45,5,'Email :',0,0,'C');
            $pdf->Cell(45,5,$row['email'],1,0);
            $pdf->Ln(10);
            $pdf->Cell(45,5,'Mobile :',0,0,'C');
            $pdf->Cell(45,5,$row['mob'],1,0);
            $pdf->Cell(45,5,'Crime Type :',0,0,'C');
            $pdf->Cell(45,5,$row['crime_type'],1,0);
            $pdf->Ln(30);
          
            $pdf->Cell(45,5,'Description :',0,0,'C');
            $pdf->Cell(45,5,$row['description'],1,0);
            $pdf->Cell(45,5,'crime place :',0,0,'C');
            $pdf->Cell(45,5,$row['crime_place'],1,0);
            $pdf->Ln(10);
            $pdf->Cell(45,5,'Date :',0,0,'C');
            $pdf->Cell(45,5,$row['date'],1,0);
            $pdf->Cell(45,5,'police Station :',0,0,'C');
            $pdf->Cell(45,5,$row['pstation'],1,0);
            // $pdf->Cell(35,5,'       email :',0,0,'C');
            // $pdf->Cell(10);
            // $pdf->Cell(140 ,20,$row['email'],1,0);
            // $pdf->Ln(30);
            // $pdf->Cell(45,5,'description :',0,0,'C');
            // $pdf->Cell(45,5,$row['description'],1,0);
            // $pdf->Ln(10);
            // $pdf->Cell(45,5,' date:',0,0,'C');
            // $pdf->Cell(45,5,$row['date'],1,0);
            $pdf->Ln(10);

$pdf->Ln(5);



$pdf->Line(10,190,200,190);


    }
    $pdf->SetFont('Times','','10');
    // while($row = mysqli_fetch_assoc($data))   
    // {
        // $pdf->Cell(50,5,' squarefeet',0,0);
        // $pdf->cell('30','10',$row['squarefeet'],'1','0','C');
        // $pdf->cell('60','10',$row['garden'],'1','0','C');
        // // $pdf->cell('15','10',$row['email'],'1','0','C');
        // $pdf->cell('60','10',$row['bedroom'],'1','1','C');
    $path="Desktop";
    $pdf->Output();
    // $pdf->Output($_filelocation.$file_name,'F');
    // echo"upload sucessfully"

}
    ?>
