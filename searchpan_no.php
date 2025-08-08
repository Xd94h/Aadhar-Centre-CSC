<?php
include('header.php');
?>

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Search PAN No</div>
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
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-10 mx-auto">
						<h6 class="mb-0 text-uppercase">Search PAN No</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
							    <div>
                                <h6 class="text-danger ">PAN NUMBER APPROVE TIME 10-15MINT, 9AM TO 7PM</h6>
                                </div>
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-id-card me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Enter Details पैन नंबर का डाटा लगाते समय Apply बटन पर एक बार क्लिक करें दोबारा क्लिक नहीं करें या डाटा लगाने के बाद पेज रिफ्रेश नहीं करें पेज रिफ्रेश करने के बाद डाटा दोबारा लग जाएगा,</h5>
								</div>
								<hr>
								<form action="" method="POST" class="row g-3">
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Name</label>
										<input name="name" type="text"  placeholder="Name As Per Aadhaar"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputLastName" class="form-label">AADHAAR No</label>
										<input name="aadhaar_no" type="text" id="eid"     placeholder="Enter 12 Digit AADHAAR  no" class="form-control" >
									</div>
									
									
									
									<div class="col-md-3">
										<label for="inputPassword" class="form-label">Retailer Whatsapp No</label>
										<input name="ret_wp_no" type="text" placeholder="Enter Phone Number" value="<?php echo $udata['phone'] ?>"  class="form-control" id="inputPassword">
									</div>
									
									
									<div class="col-12 ml-2">
									<h5 class="text-warning ">Application Fee: <?php  
										$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT price FROM pricing WHERE service_name='pan_no'")); 
										echo "₹" .$price['price'];
										?></h5>
										
									</div>
									<div class="col-12">
										<button type="submit" class="btn btn-primary px-5">Apply</button>
									</div>
								</form>
							</div>
						</div>
					
					</div>
				</div>
				
			</div>
		</div>

	<!--end page wrapper -->
	<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">All PAN Search List </h5>
                        <h6 class="mb-0 text-uppercase">Search PAN No <a href="pan_details.php" target="_blank" class="btn btn-success">Pan Card Details</a></h6>
                    </div>
                   
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example2" class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">SL.</th>
                                <th class="text-center">Application No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Apply date</th>
                                
                                <th class="text-center">AADHAAR No</th>
                                <th class="text-center">Date of Birth</th>
                                <th class="text-center">PAN No</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                           
<?php
if(isset($_GET['track']) && $_GET['track'] =="true" && $_GET['application_no']){
    // echo "<pre>";
    // print_r($_GET);
            $application_no = mysqli_real_escape_string($ahk_conn,$_GET['application_no']);
            $api_key = $webdata["nsdl_api_key"];
          
            $url = 'https://apizone.in/api/v1/services/pan_no/track.php?application_no='.$application_no.'&api_key='.$api_key;
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
             $response;
            $resdata = json_decode($response,true);
            if($resdata['status'] == 1){
                $sql = mysqli_query($ahk_conn,"UPDATE pan_no SET pan_no='".$resdata['pan_no']."', status='success' WHERE application_no='".base64_decode($application_no)."'");
                if($sql){
                    ?>
                <script>
                    $(function(){
                        Swal.fire(
                            '<?php echo $resdata['message']; ?>',
                            '<?php echo $resdata['pan_no']; ?>',
                            'success'
                        )
                    })
                    setTimeout(() => {
                        window.location='search_pan_no_list.php';
                    }, 1200);
                </script>
                    <?php
                }else{
                    ?>
                    <script>
                      $(function(){
                         Swal.fire(
                             ' <?php echo $resdata['message'];?>',
                             '<?php echo $resdata['pan_no'];?>',
                             'error'
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
                         'Failed Code > <?php echo $resdata['status'];?>',
                         '<?php echo $resdata['message'];?>',
                         'error'
                     )
                 })
                </script>
                 <?php
            }
            // API
}
$res = mysqli_query($ahk_conn,"SELECT * FROM pan_no WHERE appliedby='".$udata['phone']."'  ORDER BY id DESC");
if(mysqli_num_rows($res)>0){
    $x=0;
    while($data = mysqli_fetch_assoc($res)){
        $x ++;
        ?>
        <tr>
            <td class="text-center"><?= $x;?></td>
            <td class="text-center"><?php echo strtoupper($data['application_no']); ?></td>
            <td class="text-center">
                <div class="d-flex align-items-center">
                    
                    <div class="ms-2">
                        <h6 class="mb-1 font-14"><?php echo strtoupper($data['name']); ?></h6>
                    </div>
                </div>
            </td>
            <td class="text-center"><?php echo strtoupper($data['apply_date']); ?></td>
            <td class="text-center"><?php echo strtoupper($data['aadhaar_no']); ?></td>
            <td class="text-center"><?php echo strtoupper($data['dob']); ?></td>
            
            
            <td class="text-center"><?php
            if(!$data['pan_no'] ==NULL){
                ?>
                <b><?php echo strtoupper($data['pan_no']); ?></b>
                <?php
            }else{
                echo "under process";
            }
            ?></td>
            <td class="text-center">
                <?php
                    if($data['status']=="pending"){
                        ?>
                        <div class="badge rounded-pill bg-light-warning text-warning w-100">Under Process
                        </div>
                       
                        <?php
                    }else if($data['status']=="success"){
                            ?>
                             <div class="badge rounded-pill bg-light-success text-success w-100">Success
                        </div>
                         <?php
                    }else if($data['status']=="reject"){
                            ?>
                             <div class="badge rounded-pill bg-light-danger text-danger w-100">Rejected & refunded
                        </div>
                            <?php
                    }
                ?>
            </td>
        </tr>
        <?php
       
    }
}
?>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
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
        // hourFormat: 24
      });
	});
</script>
</html>