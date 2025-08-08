<?php
error_reporting(0);
// include '../includes/database.php'; 
include '../includes/config.php'; 
require_once('lib/Config_HBConnect.php');
require_once('lib/RechPayChecksum.php');
$array = array();
$status = $_POST['status']; 
$txnAmount = $_POST['txnAmount'];
$message = $_POST['message']; 
$hash = $_POST['hash']; 
$checksum = $_POST['checksum'];
if($status=="SUCCESS"){
$paramList = hash_decrypt($hash,$secret);
$verifySignature = RechPayChecksum::verifySignature($paramList, $secret, $checksum);
if($verifySignature){
$array = json_decode($paramList,true);
$userid = $array["sender_note"];
$amt=$array["txnAmount"];
date_default_timezone_set("Asia/Kolkata");
$hkb_date = date('d/m/Y g:i:s');
$udata = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM users WHERE email='$userid'"));

$email =$udata['phone'];
$sql = "UPDATE users SET balance= balance +'$amt' WHERE email='$userid'";
$ins = mysqli_query($ahk_conn, "INSERT INTO `wallet`(`phone`,`amount`,`txn_id`,`email`,`date`,`status`,`PAYMENTMODE`) VALUES ('$email','$amt','DSRK36" . rand(55555, 99999) . "','$userid','$hkb_date','Success','QR')");
$qry =  mysqli_query($ahk_conn,$sql);
    $html = '
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>We Got Your Payment 👍!!<br/> Update Successfully !</p>
      </div>
    </body>
</html>
';	
echo $html

        ?>
   <script>
            setTimeout(()=>{
                window.location.href="https://<?php echo $server=$_SERVER['SERVER_NAME'];?>/admin/wallet.php";
            },2000);
        </script>
        <?php 
    
    
    }
}
else {  $fail = '
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #f20101;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #f76565d4; margin:0 auto;">
        <i class="checkmark">❌</i>
      </div>
        <h1>Payment Fail</h1> 
        <p>Please Pay Again!!<br/>Payment Canclled By User!</p>
      </div>
    </body>
</html>
';	
echo $fail
?>

      <script>
            setTimeout(()=>{
                window.location.href="https://<?php echo $server=$_SERVER['SERVER_NAME'];?>/admin/wallet.php";
            },2000);
        </script>
<?php }




?>