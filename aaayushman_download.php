<?php
include("config.php");
$familyid = $_POST['familyid'];
$id=$_POST['id'];
$phone=$_POST['phone'];
$stateid=$_POST['stid'];


//print_r($_POST);
//die;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://roboprint.in/apie2.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('familyid' => $familyid,'id' => $id,'stateid' => $stateid),
));
$response = curl_exec($curl);

if($response ==""){
    echo "no";
}else {
    
include("../includes/database.php");
$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='ayushman_fee' "));
$fee = $price['price'];
$sql = "update 	users SET balance= balance - $fee where phone='$phone'";
    $abs = mysqli_query( $ahk_conn,$sql);
    }
curl_close($curl);
header('Content-Type: application/pdf');
echo $response;



?>
