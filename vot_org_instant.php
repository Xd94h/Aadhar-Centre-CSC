<?php
include('header.php');
?>
     	<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Home </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">New APPLY</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

    <div class="content-wrap">
      <div class="container-fluid pt-4 px-4">
				<!--end breadcrumb-->
        <div class="main">
            <div class="col-md-12">
                <div class="main-content">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-4">
                        <div class="card card-default ">
                            <div class="card-header bg-warning">
                                <div class="card-title">
                                    <h3><strong>VOTER ORIGINAL PDF DOWNLOAD !</strong></h3>
                                </div>
                            </div>
                            <br>
                            <a href="vote_mob_link.php" class="btn btn-dark w-100">Mobile Number Change Click Here</a>

                        </div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['find']) && !empty($_POST['epic_no'])) {
        $epic_no = $_POST['epic_no'];

        // Make API Request
        $url = file_get_contents("https://$skylineapiurl/serviceApi/V1/VCPFD/Vc_Send_Tp.php?apiKey=$skyline_key&epic=$epic_no");
        $result = json_decode($url, true);
        if ($result) {
            $applicantFullName = $result['name'];
            $epicNumber = $result['voterno'];
            $stateName = $result['stateCd'];
            $statuss = $result['StatusCode'];
            $messages = $result['message'];
            $errors = $result['error'];
        if ($statuss == '100') {
              echo "<script>
                      Swal.fire({
                        title: '$messages',
                        text: 'Success',
                        icon: 'success',
                        confirmButtonText: 'OK'
                      });
                    </script>";
        } else if ($errors) {
              echo "<script>
                      Swal.fire({
                        title: '$errors',
                        text: '$messages',
                        icon: 'error',
                        confirmButtonText: 'OK'
                      });
                    </script>";
           }
        }
    }
}
?>

 <?php
  $price = mysqli_fetch_assoc(mysqli_query($ahk_conn, "SELECT * FROM pricing WHERE service_name='voter_org_fee' "));
  $fee = $price['price'];
  $balance=$udata['balance'];
  $mobile = $udata['phone'];
  $debit_fee =  $balance - $fee;
  if($balance>$fee){
      
        if (isset($_POST['verify_otp']) && !empty($_POST['otp'])) {
            $epic = $_POST['epic'];
            $otp = $_POST['otp'];
            $scode = $_POST['scode'];
            $apiUrl = file_get_contents("https://$skylineapiurl/serviceApi/V1/VCPFD/Vc_Verification_Tp.php?apiKey=$skyline_key&stateCd=$scode&otp=$otp&epic=$epic");

            if ($apiUrl === false) {
                echo '<div class="alert alert-danger" role="alert">
                        cURL request failed
                      </div>';
            } else {
                $data = json_decode($apiUrl, true);
                $status = $data['status'];
                $message = $data['message'];
                $refId = $data['ref'];
                $pdf = $data['pdf'];
                $rerror = $data['error'];

        if ($pdf != '') {
                  mysqli_query($ahk_conn, "UPDATE users SET balance = balance - '$fee' WHERE phone='$mobile'");
                  $new_balance = $balance - $fee;
                  date_default_timezone_set("Asia/Kolkata");
                  $timestamp = date('d/m/Y g:i:s');
                  $updatehistory = mysqli_query($ahk_conn,"INSERT INTO wallethistory(userid, amount, balance, purpose, status, type) VALUES ('$mobile','$fee','$debit_fee','$epic Voter ORG PDF','1','Debit')");
                  
              echo "<script>
                      Swal.fire({
                        title: '$message',
                        text: '$status',
                        icon: 'success',
                        confirmButtonText: 'OK'
                      });
                    </script>";
        } else if ($rerror) {
              echo "<script>
                      Swal.fire({
                        title: '$rerror',
                        text: '$message',
                        icon: 'error',
                        confirmButtonText: 'OK'
                      });
                    </script>";
           }
            curl_close($ch);
        }
        }
  }else{
     $msg="<script>
        Swal.fire({
          title:'Balance Low ! Recharge Now',
          text:  'Warning!',
          icon: 'warning',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = 'wallet.php';
          }
        });
      </script>";
}
        ?>

                            <h6 > <?php echo $msg; ?></h6>
          <!-- Form 1: Enter EPIC number -->
          <div class="card">
             <form id="epic_form" class="user <?php echo ($epicNumber) ? 'hidden' : ''; ?>" method="POST">
                 <div class="form-group">
                     <label for="epic_no">EPIC NO<span class="text-danger">*</span></label>
                     <input id="epic_no" name="epic_no" class="form-control border-success" type="text" value="<?php echo $epicNumber; ?>" required <?php echo ($epicNumber) ? 'disabled' : ''; ?>>
                 </div>
   <br>
                 <button type="submit" name="find" class="btn btn-primary w-100" <?php echo ($epicNumber) ? 'disabled' : ''; ?>>
                     <i class="fa fa-check-circle"></i>Send OTP
                 </button>
                   <div class="col-12 ml-2">
				   	<h5 class="text-warning ">Application Fee: <?php  
				   		$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT price FROM pricing WHERE service_name='voter_org_fee'")); 
				   		echo "₹" .$price['price'];
				   		?></h5>
				   </div>
             </form>


            <!-- Form 2: Displayed upon successful first API response -->
            <form id="additional_fields_form" class="user <?php echo ($epicNumber) ? '' : 'hidden'; ?>" method="POST">
                 <div class="form-group">
                    <label for="">Full Name<span class="text-danger">*</span></label>
                    <input id="" name="" class="form-control" type="" readonly value="<?php echo $applicantFullName; ?>" required>
                </div> 
                <div class="form-group">
                    <label for="otp">Enter OTP<span class="text-danger">*</span></label>
                    <input id="epic" name="epic" class="form-control" type="hidden" value="<?php echo $epicNumber; ?>" required>
                    <input id="otp" name="otp" class="form-control border-primary" type="number" placeholder="ENTER OTP" value="<?php echo $otp; ?>" required>
                    <input id="scode" name="scode" class="form-control border-primary" type="hidden" placeholder="ENTER STATE CODE" value="<?php echo $stateName; ?>" required>
                </div>
                <br>
               <button type="submit" name="verify_otp" class="btn btn-primary w-100"><i class="fa fa-check-circle"></i>Verify</button>
            </form>
        </div>
<?php if ($pdf != "") { ?>
<a href="<?php echo $pdf; ?>" download="<?php echo $refId; ?>" class="btn btn-lg btn-danger w-100">
    <img src="v_org.png" alt="!" style="height:40px; vertical-align: middle; margin-right: 5px;">
    <B>Download PDF</B>
</a>
    </div>
</div>
<?php } ?>
    <!-- Add your footer content here -->

    <script src="../template/ahkweb/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../template/ahkweb/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="../template/ahkweb/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="../template/ahkweb/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="../template/ahkweb/assets/js/app.js"></script>
<script>
    // Hide the success and error alerts after 3 seconds
    setTimeout(function () {
        document.getElementById('success-alert').style.display = 'none';
        // document.getElementById('error-alert').style.display = 'none';
    }, 3000);
</script>

</body>
</html>
<?php
include('footer.php');
?>