<?php
include('header.php');
?>

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">EID TO AADHAAR NO</div>
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
					<div class="col-xl-15 mx-auto">
					<h5><b>Please Check below status before Apply : कृपया डाटा लगाने से पहले स्टेटस चेक करें, इस तरह का स्टेटस दिखाने पर ही डाटा लगाएं &znj;।</b></h5>
                    <img src="https://BOXIKART.COM/admin/images/duplicate.png" width="1200" height="150" style="border-style: solid;border-width: 3px">&nbsp;
                   <hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-id-card me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Matching Duplicate To Aadhar No</h5>
								</div>
								<hr>
								<form action="" method="POST" class="row g-3">
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Name</label>
										<input name="name" type="text"  placeholder="Name As Per EID"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputLastName" class="form-label">EID No</label>
										<input name="eid" type="text" id="eid"  data-inputmask="'mask': '9999 99999 99999'"   placeholder="Enter 14 Digit EID no" class="form-control" >
									</div>
									<div class="col-md-3">
										<label for="inputEmail" class="form-label">Date</label>
										<input name="date" type="text"  data-inputmask="'mask': '99/99/9999'"  placeholder="DD/MM/YYYY" class="form-control" id="date">
									</div>
									<div class="col-md-3">
										<label for="inputPassword" class="form-label">Time</label>
										<input name="time" type="text"  placeholder="00:00:00" class="form-control" id="timea">
									</div>
									<div class="col-md-3">
										<label for="inputPassword" class="form-label">Retailer Whatsapp No</label>
										<input name="ret_wp_no" type="text" placeholder="Enter Phone Number" value="<?php echo $udata['phone'] ?>"  class="form-control" id="inputPassword">
									</div>
									
									
									<div class="col-12 ml-2">
									<h5 class="text-warning ">Application Fee: <?php  
										$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT price FROM pricing WHERE service_name='aadhaar_no'")); 
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