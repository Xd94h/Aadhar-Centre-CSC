<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/header.php');
if(isset($_POST['appRefNum'])){
 $application_no=$_POST['appRefNum'];
 
 $name=str_replace(" ","%20",$name);
echo $base_url="https://api.printscard.com/rtps_verification.php?appRefNum=$application_no";
  $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $base_url);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_TIMEOUT,500);

$response = curl_exec($ch);
curl_close ($ch);

header('Content-Type: application/pdf');
echo $response;

}

?>
<?php include('header.php'); ?>
      <div class="content-wrap">

            <div class="main">

			    <div class="col-md-12">

					<div class="container-fluid">

						<div class="row">

<h1> </h1>
</div>
<div class="card">
        <div class="card-header"> Advance Rtps Certificate Print </div>
    <div class="card-body">
       <form method="post" action="" autocomplete="off" enctype="multipart/form-data" action="" class="row">
            <div class="form-group col-md-6">
                <label>Enter Rtps No</label>
                <input class="form-control " id="id" name="appRefNum" placeholder="Enter Rtps No." type="text" >
            </div>
            
            
            <div class="form-group col-md-4 align-self-end">
                <button  class="btn btn-primary">Download Certificate</button>
            </div>
            
        </form>
    </div>
</div>
<?php include('footer.php'); ?>