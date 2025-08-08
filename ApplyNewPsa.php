<?php
include('header.php');
?>

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Apply PSA Member</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">New User Add</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
                
				<div class="row">
					<div class="col-xl-10 mx-auto">
						<h6 class="mb-0 text-uppercase">Apply PSA</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">User Details</h5>
								</div>
								<hr>
								<form action="" method="POST" class="row g-3">
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Shop Name</label>
										<input name="shop_name" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value = this.value.toUpperCase();" required type="text"  placeholder="Shop Name"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Name</label>
										<input name="name" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value = this.value.toUpperCase();" required type="text"  placeholder="Name"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Select State</label>
                                        <select class="form-control select" placeholder="State" name="state" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value = this.value.toUpperCase();" required >
                                        <option value="">Select State</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="ANDAMAN AND NICOBAR ISLANDS">ANDAMAN AND NICOBAR ISLANDS</option>
                                            <option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
                                            <option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
                                            <option value="ASSAM">ASSAM</option>
                                            <option value="BIHAR">BIHAR</option>
                                            <option value="CHANDIGARH">CHANDIGARH</option>
                                            <option value="CHHATTISGARH">CHHATTISGARH</option>
                                            <option value="DADRA AND NAGAR HAVELI">DADRA AND NAGAR HAVELI</option>
                                            <option value="DAMAN AND DIU">DAMAN AND DIU</option>
                                            <option value="DELHI">DELHI</option>
                                            <option value="GOA">GOA</option>
                                            <option value="GUJARAT">GUJARAT</option>
                                            <option value="HARYANA">HARYANA</option>
                                            <option value="HIMACHAL PRADESH">HIMACHAL PRADESH</option>
                                            <option value="JAMMU AND KASHMIR">JAMMU AND KASHMIR</option>
                                            <option value="JHARKHAND">JHARKHAND</option>
                                            <option value="KARNATAKA">KARNATAKA</option>
                                            <option value="KERALA">KERALA</option>
                                            <option value="LAKSHADWEEP">LAKSHADWEEP</option>
                                            <option value="MADHYA PRADESH">MADHYA PRADESH</option>
                                            <option value="MAHARASHTRA">MAHARASHTRA</option>
                                            <option value="MANIPUR">MANIPUR</option>
                                            <option value="MEGHALAYA">MEGHALAYA</option>
                                            <option value="MIZORAM">MIZORAM</option>
                                            <option value="NAGALAND">NAGALAND</option>
                                            <option value="ODISHA">ODISHA</option>
                                            <option value="OTHER">OTHER</option>
                                            <option value="PONDICHERRY">PONDICHERRY</option>
                                            <option value="PUNJAB">PUNJAB</option>
                                            <option value="RAJASTHAN">RAJASTHAN</option>
                                            <option value="SIKKIM">SIKKIM</option>
                                            <option value="TAMILNADU">TAMILNADU</option>
                                            <option value="TELANGANA">TELANGANA</option>
                                            <option value="TRIPURA">TRIPURA</option>
                                            <option value="UTTAR PRADESH">UTTAR PRADESH</option>
                                            <option value="UTTARAKHAND">UTTARAKHAND</option>
                                            <option value="WEST BENGAL">WEST BENGAL</option>


                                        </select>
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">District</label>
										<input name="district"  type="text" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value = this.value.toUpperCase();" required placeholder="District"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Address</label>
										<input name="address"  type="text" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value = this.value.toUpperCase();" required placeholder="Address"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Pincode</label>
										<input name="pincode"  type="text" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value = this.value.toUpperCase();" required placeholder="PIN" maxlength="6" minlength="6" class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Mobile No</label>
										<input name="mobile"  type="text" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value = this.value.toUpperCase();" required placeholder="10 Digit Mobile No" maxlength="10" class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Email</label>
										<input name="email"  type="email" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value = this.value.toUpperCase();" required placeholder="Enter Email"  class="form-control" id="inputFirstName">
									</div>
                                    <div class="col-md-3">
										<label for="inputFirstName" class="form-label">Dob</label>
										<input name="dob"  type="text" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value = this.value.toUpperCase();" required placeholder="2002-10-30"  class="form-control" id="inputFirstName">
										<span>YYYY-MM-DD</span>
									</div>
                                    <div class="col-md-3">
										<label for="inputFirstName" class="form-label">PAN No (10 CHARACTER)</label>
										<input name="pan_no"  type="text" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value = this.value.toUpperCase();" required placeholder="Enter Pan card No" maxlength="10" class="form-control" id="inputFirstName">
									</div>
                                    <div class="col-md-3">
										<label for="inputFirstName" class="form-label">AADHAAR No (12 Digit))</label>
										<input name="aadhar_no"  type="text" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value = this.value.toUpperCase();" required maxlength="12" placeholder="Enter AADHAAR card No"  class="form-control" id="inputFirstName">
									</div>
                                    <div class="col-md-3">
										<label for="inputFirstName" class="form-label">Application fee</label>
                                        <?php 
$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='psa_fee' LIMIT 1"));
$amount = $price['price'];
                                        ?>
										<input name="fee"  type="text" disabled  value="<?php echo $amount; ?>"  class="form-control" id="inputFirstName">
									</div>
									
									<div class="col-12">
										<button type="submit" class="btn btn-primary px-5">Create</button>
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
	// $(document).ready(function() {
	
	// $('#eid').inputmask();
	// $('#date').inputmask();
	// $('#timea').inputmask("hh:mm:ss", {
    //     placeholder: "00:00:00", 
    //     insertMode: false, 
    //     showMaskOnHover: false,
    //     hourFormat: 12
    //   });
	// });
</script>
</html>