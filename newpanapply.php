<?php
include('header.php');
?>

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Aadhar Card Update</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Update Aadhar Addres Withoutb Documants by Kafila Uidai Team</li>
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
						<h6 class="mb-0 text-uppercase">AMAN UIDIA AADHAAR ADDRESS UPDATE WITHOUT DOCOMENT ANY STATE IN 2-3 HOURS UPDATE (FULL GRANTY) </h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
							    <div>
                                <h6 class="text-danger ">आधार एड्रेस चेंज करवाने के लिए आधार में मोबाइल नंबर जुरा रहना चाहिए !<br>Mobile number must be valid for Aadhaar address change. any support or more datils  whatsapp toboxikart WORLD 9572953911</h6> 
                                <h6 class="text-primary ">FULL INFOMATION KE LIYEboxikart WORLD TEAM CONTECT KARE FAST 9572953911</h6> 
                                <div class="text-white ms-auto font-70"><img style="max-width: 500px;" src="https://etstatic.tnn.in/photo/msid-100988568,width-100,height-200,resizemode-75/100988568.jpg"  width="200ox" style="border-radius:2px;"> 
                                </div>
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-id-card me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Enter Aadhar Update  applicant info.</h5>
								</div>
								<hr>
								<form action="" method="POST" enctype="multipart/form-data" class="row g-3">
	<div class="col-md-3">							    
    <label for="applicant_name">Name as per aadhar:</label>
    <input type="text" id="applicant_name" name="applicant_name" class="form-control" required>
    </div>
    
    <div class="col-md-3">
    <label for="father_name">Father's/Husband Name:</label>
    <input type="text" id="father_name" name="father_name" class="form-control" required>
    </div>
    
    <div class="col-md-3">
    <label for="date_of_birth">Date of Birth as per aadhar</label>
    <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" required>
    </div>
    
    <div class="col-md-3">
    <label for="mobile">aadhar linked Mobile number:</label>
    <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" class="form-control" required>
    <small>Enter a 10-digit mobile number.</small>
    </div>
    
    <div class="col-md-3">
    <label for="gmail">Aadhar Number ! example : 123456789123@aman.xyz </label>
    <input type="email" id="gmail" name="gmail" class="form-control" required>
    </div>
    
    <div class="col-md-3">
    <label for="address">New Address for aadhar Update:</label>
    <textarea id="address" name="address" class="form-control" required></textarea>
    </div>
    
    <div class="col-md-3">
    <label for="aadhar_pdf">Upload Applicant Photo</label>
    <input type="file" id="aadhar_pdf" name="aadhar_pdf" accept="application/pdf" class="form-control" required>
    </div>

   <div class="col-12 ml-2">
									<h5 class="text-warning ">Application Fee: <?php  
										$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT price FROM pricing WHERE service_name='new_pan_apply'")); 
										echo "₹" .$price['price'];
										?></h5>
										<input type="hidden" name="fee" value="<?php echo $price['price'];  ?>">
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