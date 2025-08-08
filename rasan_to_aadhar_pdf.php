<?php
include('header.php');
?>

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Rasan Details TO AADHAAR NO</div>
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
				
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-id-card me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">अभी यह सर्विस ASSAM, BIHAR,  GUJARAT, MADHYA PRADESH,  PUNJAB, CHHATTISRH, JHARKHAND, UTTAR PRADESH के लिये LIVE है हम जल्द ही अन्य STATE के लिये LIVE करेंगे |</h5>
								</div>
								<hr>
								<form action="" method="POST" class="row g-3">
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Name</label>
										<input name="name" type="text"  placeholder="Name As Per EID"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputLastName" class="form-label">Rasan No</label>
										<input name="rasan" type="text" id="eid"  data-inputmask="'mask': '999999999999999999999'"   placeholder="rasan no" class="form-control" >
									</div>
									<div class="col-md-3">
										<label for="inputEmail" class="form-label">Enter Family Aadhaar No</label>
										<input name="aadhaar" type="text"  data-inputmask="'mask': '999999999999'"  placeholder="9999999999999" class="form-control" id="date">
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">district</label>
										<input name="district" type="text"  placeholder="district"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">block</label>
										<input name="block" type="text"  placeholder="block"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">village</label>
										<input name="village" type="text"  placeholder="village"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputEmail" class="form-label">STATE</label>
                                         <select name="state" class="form-control" id="state" required>
                                         <option value="">Select State</option>
                                         <option value="Bihar">Bihar</option>
                                         <option value="UP">UP</option>
                                         <option value="Punjab">Punjab</option>
                                         <option value="Gujrat">Gujrat</option>
                                         <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="CHHATISGARH">CHHATISGARH</option>
                                         </select>
                                  </div>
									<div class="col-md-3">
										<label for="inputPassword" class="form-label">Retailer Whatsapp No</label>
										<input name="ret_wp_no" type="text" placeholder="Enter Phone Number" value="<?php echo $udata['phone'] ?>"  class="form-control" id="inputPassword">
									</div>
									
									
									<div class="col-12 ml-2">
									<h5 class="text-warning ">Application Fee: <?php  
										$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT price FROM pricing WHERE service_name='rasan_to_aadhar_pdf'")); 
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