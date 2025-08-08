<?php 
include('../includes/config.php');
if(isset($_GET['aadhaar_no']) && $_GET['application_no'] && $_GET['pdf_link']){
    $application_no = mysqli_real_escape_string($ahk_conn,$_GET['application_no']);
    $aadhaar_no = base64_decode(mysqli_real_escape_string($ahk_conn,$_GET['aadhaar_no']));
    $pdf_link = base64_decode(mysqli_real_escape_string($ahk_conn,$_GET['pdf_link']));
    $check = mysqli_query($ahk_conn,"SELECT * FROM aadhaarpdf WHERE application_no='$application_no'");
    if(mysqli_num_rows($check)==1){
        $update = mysqli_query($ahk_conn,"UPDATE aadhaarpdf SET aadhaar_no='$aadhaar_no',status='success', pdf_link='$pdf_link' WHERE application_no='$application_no'");
    }
}
?>