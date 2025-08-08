<?php
include('header.php');
?>

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">SAMAGRA MP PDF</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page"> APPLY</li>
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
						<h6 class="mb-0 text-uppercase">SAMAGRA MP PDF PDF Working ALL Days 9AM TO 8PM</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
							     <div>
							     </div>
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-id-card me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Enter Family ID</h5>
								</div>
								<hr>
								<form action="" method="POST" enctype="multipart/form-data" class="row g-3">
  <div class="col-md-3">
  <label for="samb">ENTER Family ID</label>
  <input type="text" name="samb" class="form-control" required><br>
  </div>
                                    <div class="col-md-3">
										<label for="inputPassword" class="form-label">Retailer Whatsapp No</label>
										<input name="ret_wp_no" type="text" placeholder="Enter Phone Number" value="<?php echo $udata['phone'] ?>"  class="form-control" id="inputPassword">
									</div>
									
									<div class="col-md-3">
									 <!-- <input class="form-control"  placeholder="State" value="" type="text"> -->
                                    <select name="state" id="state" class="form-control" required>
                                    <option value="">Select State</option>
                                    <option value="MADHYA PRADESH">MADHYA PRADESH</option>
                                    </select>
                                       </div>
                                     </div>
  
  <div class="col-12 ml-2">
    <h5 class="text-warning">Application Fee: <?php  
      $price = mysqli_fetch_assoc(mysqli_query($ahk_conn, "SELECT price FROM pricing WHERE service_name='sampay'")); 
      echo "₹" . $price['price'];
    ?></h5>
    <input type="hidden" name="fee" value="<?php echo $price['price']; ?>">
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