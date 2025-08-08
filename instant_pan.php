<?php
include('header.php');
?>

<?php
if($_POST['aadhaar_no']){
    $aadhaar = $_POST['aadhaar_no'];
    $application_no = "skyline_pan_".rand(000000,999999);
    $username = $udata['phone'];
    $appliedby= $udata['phone'];
    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='pan_no' "));
    $fee=$price['price'];
    $debit_fee =  $wallet_amount - $fee;
    if($udata['balance']>=$price['price']){
            $url = "https://$skylineapiurl/serviceApi/V1/panFind.php?apiKey=$skyline_key&uidNumber=$aadhaar";
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                $resdata = json_decode($response,true); 
                $pan=$resdata['pan_no'];
                $name=$resdata['name']; 
                $father_name=$resdata['fathername'];
                $gender=$resdata['gender'];
                $dob=$resdata['dob'];
                $clint=$resdata['client_id'];
                // $message_code=$resdata['status_code'];
                $message=$resdata['message'];
                $errore=$resdata['error'];
         if($errore){
                ?>
                 <script>
                      $(function(){
                         Swal.fire(
                            '<?php echo $errore;?>',
                                'Contact Admin',
                                'error'
                         )
                     })
                      setTimeout(() => {
                            window.location='';
                        }, 5000);
                    </script>
                <?php
            } else if($resdata['StatusCode']==="100" or $resdata['StatusCode']==="2000"){

        $debit = mysqli_query($ahk_conn,"UPDATE users SET balance=balance-$fee WHERE phone='$appliedby'");
        
        $updatehistory = mysqli_query($ahk_conn,"INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$appliedby','$fee','$nbal','PAN Number Find','1','Debit')");
        if($debit){
            
            $insert = mysqli_query($ahk_conn, "INSERT INTO instantpan_find (application_no,username,aadhaar_no,pan_no,clint_id, status,status_code,fee,old_balance,new_balance,message) VALUES ('$application_no','$username','$aadhaar', '$pan','$clint', '$message', '$response','" . $fee. "','$wallet_amount','$debit_fee', '$message');");
            if ($insert) {
    
    
                ?>
                <script>
              $(function(){
                 Swal.fire(
                            'Aadhar No  <?php echo $aadhaar;?> <br> is Your Pan no  <?php echo $pan;?>',
                                    '',
                                    'success'
                 )
             })
             
            </script>
                
                <?php
} else {
    echo "Error: " . mysqli_error($ahk_conn);
}
        }else{
            ?>
              <script>
          $(function(){
             Swal.fire(
                 'Balance Debit error',
                 'something went wrong',
                 'error'
             )
         })
         setTimeout(() => {
                window.location='';
            }, 1200);
        </script>
            
            <?php
        }
            
        }else {
            ?>
            <script>
          $(function(){
             Swal.fire(
                        'Aadhar No  <?php echo $aadhaar;?> <br> is Your Pan no  <?php echo $pan;?>',
                                '',
                                'success'
             )
         })
         
        </script>
            
            <?php
        }
        
    }else{
        ?>
        <script>
          $(function(){
             Swal.fire(
                 'Wallet Balance is Low!',
                 'Please Recharge Now!',
                 'error'
             )
         })
         setTimeout(() => {
                window.location='wallet.php';
            }, 1200);
        </script>
      <?php  
    }
                       
                       
                   }
            
            ?>
		<div class="page-wrapper">
			<div class="page-content">
			

<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <!DOCTYPE html>
                    <?php echo $msg; ?>
                    <div class="col-lg-12">
                                         <div class="card" style="margin-left: 10px;    padding-left: 30px;
                                        padding-top: 12px;
                                      box-shadow: 1px 5px 5px 5px;">
                                 <div class="stat-widget-two">
                            <div class="stat-content">
                        <div class="stat-text">
                            <div class="container-fluid">
                              
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                            <div class="alert alert-danger" role="alert">
                                We Are Trying Our Best
                                <a href="" class="alert-link">AADHAR NUMBER TO PAN NUMBER WITH PAN CARD DETAIL........ </a>
                            </div>
                            	<form action="" method="POST" class="row g-3">
                                <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Aadhar Number.</label>
                                              	<input name="aadhaar_no" type="text" id="aadhaar_no" placeholder="Enter 12 Digit AADHAAR  no" class="form-control" >
                                              	 <input type="hidden" name="check" value="aadhaar">
                                                  </div>
                                                   </select>
                                                <hr>
                                             <div class="form-group col-md-10">                           
                                       <input class="form-control " id="text" name="" value="Fee ₹ <?php  
										$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT price FROM pricing WHERE service_name='pan_no'")); 
										echo "₹" .$price['price'];
										?>" placeholder="Rc. No." type="text"  required readonly>
                                       <hr>
                                     
                                    </div>
                                </div>
							<div class="form-actions">
                            <div class="text-left">
                            <button class="form-control btn btn-success" name="submit" id="submit"><i class="fa fa-check-circle"></i> Submit</button>
							</div>
						</div>
                    </form>
                  </div>
               </div>
            </div>
               </div>
                <div class="col-lg-8 col-md-6 col-sm-6">
                    <div class="card" style="height: 290px; background-color: #FCF3CF;">
                        <div class="card-body">
                             <h6>We are giving you this service only for verification and not for misuse. If you misuse it, you will be responsible for it...</h6>
                             <hr>
                             <h6> Aadhaar Number :- <?php echo  $_POST['aadhaar_no']; ?></h6>
                                                       Pan NO:<B> <?php echo $resdata['pan_no']; ?></B><br>
                                                    <?php if($resdata['name'] != '') { ?>
                                                       Name: <?php echo $resdata['name']; ?><br>
                                                       Father's Name: <?php echo $resdata['fathername']; ?><br>
                                                       Gender: <?php echo $resdata['gender']; ?><br>
                                                       Date of Birth: <?php echo $resdata['dob']; ?><br>
                                                   <?php } else { ?>
                                                       Details Not Available.....
                                                   <?php } ?><br>
                             <hr>
                             <div style="display: flex; justify-content:flex-start">
                             <div class="form-group col-md-6">
                          <input class="form-control " id="text" name="" value=" Power Byboxikart WEB DEVLOPER" placeholder="Rc. No." type="text"  required readonly>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
          
       </div>
           <br>
             <br>
               <br>
                 <br>
		
		<!--end page wrapper -->
		<?php 
		include('footer.php');
		?>
	<!-- Bootstrap JS -->
	

	<script src="../template/ahkweb/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<!-- <script src="../template/ahkweb/assets/js/jquery.min.js"></script> -->
	<script src="../template/ahkweb/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="../template/ahkweb/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="../template/ahkweb/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--app JS-->
	<script src="../template/ahkweb/assets/js/app.js"></script>
</body>

<script>
	$(document).ready(function() {
	
	$('#eid').inputmask();
	$('#date').inputmask();
	$('#timea').inputmask("hh:mm:ss", {
        placeholder: "00:00:00", 
        insertMode: false, 
        showMaskOnHover: false,
        hourFormat: 12
      });
	});
</script>
</html>