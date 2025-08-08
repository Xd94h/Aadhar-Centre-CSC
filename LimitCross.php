<?php
include('header.php');
?>

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">AADHAAR LIMIT CROSS SOLUTIONS</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">New APPLY</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-10 mx-auto">
						<h6 class="mb-0 text-uppercase">AADHAAR LIMIT CROSS</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
                                <div>
                                <h6 class="text-danger ">Attention: Please Marge Application Slip and Declaration Form In a Single PDF file Then Upload it. <br>* In aadhaar Attachment   AADHAAR FRONT and back Side Should  marge in one Single PDF  with Clear Visibility . <br>If Somebody need help then you can Contact with us <?php ahkweb('phone'); ?></h6>
                                
                                <div class="col-md-3">
                                <a class="btn btn-sm btn-success mb-3" download="Delf_declaration" href="sample/english_dec.pdf">Download Form ENGLISH <i class="bx bx-cloud-download"></i></a>
									</div>
                                <div class="col-md-3">
                                <a class="btn btn-sm btn-success ml-2 " download="Delf_declaration" href="sample/self_declaration.pdf">Download Form HINDI <i class="bx bx-cloud-download"></i></a>
									</div>
                                </div>
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-id-card me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Enter Details</h5>
									
								</div>
								<hr>
								<form action="" method="POST" class="row g-3"  enctype="multipart/form-data">
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Full Name</label>
										<input name="name" type="text"  placeholder="Name " required class="form-control" >
									</div>
									
									<div class="col-md-3">
										<label for="inputPassword" class="form-label">Mobile Number</label>
										<input name="mobile" type="text" placeholder="Enter Mobile Number" required  class="form-control" >
									</div>
									
								
									<!--  -->
                                    <div class="col-12 ml-2">
                                    <div class="col-md-3">
										<label for="inputFirstName" class="form-label">Upload Self Declaration with Slip</label>
										<input type="file" name="declaration" accept="application/pdf" required class="form-control" >
									</div>
									
									<div class="col-md-3 mt-4">
										<label for="inputPassword" class="form-label">Upload AADHAAR Front Back PDF <a download="Aadhaar_sample" class="btn btn-sm btn-success" href="sample/AadhaarSample.pdf">Download Sample <i class="bx bx-cloud-download"></i></a></label>
										<input  type="file" name="aadhaar" accept="application/pdf" required  class="form-control" >
									</div>
									</div>
                                    <!--  -->
									
									<div class="col-12 ml-2">
									<h5 class="text-warning ">Application Fee: <?php  
										$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT price FROM pricing WHERE service_name='limitcross_fee'")); 
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


</html>