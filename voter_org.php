<?php
include('header.php');
include('../../includes/config.php');
?>
  <?php
  $price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='voter_original_fee' "));
                  $fee = $price['price'];
$balance = $udata['balance'];
if ($balance < $fee+1) {?>
    <script>
                    $(function(){
                        Swal.fire(
                            'Wallet amount is Low Please Maintain Wallet Above From Fee ',
                            '',
                            'error'
                        )
                    })
                    setTimeout(() => {
                        window.location='wallet.php';
                    }, 1000);
                </script>
<?php }
  ?><!--start page wrapper -->
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
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-10 mx-auto">
						<h6 class="mb-0 text-uppercase">INSTANT VOTER PDF DOWNLOAD ALL STATE INSTANT</h6>
			<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-id-card me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">👉 ♻ INSTANT VOTER PDF WITH PHOTO अब आप खुद से  निकल सकते है इंस्टेंट ENTER EPIC नंबर To वोटर PDF
</h5>
								</div>
								<hr>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-id-card me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Enter Voter Details</h5>
								</div>
								<hr>



      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<p width="100%" style="color:;background:;font-size:20px;"><b>Voter Advance 100% Working Now</h1>
								</div>
							</div>
						</div>

						<!-- /# row -->
						<section id="main-content">
							<div class="row">
							 	<form method="post" name="form" autocomplete="off"  enctype="multipart/form-data" action="voteroriginalinfo.php" style="width:100%">
									
									                                           <div class="row dgnform">
																			    <div class="col-md-13 col-sm-12 col-xs-12">
                                                    <label>Epic No.</label>
                                                    <div class="form-group">
                                                        <input class="form-control" name="epicno"  type="text" placeholder="Enter Epic No" required="">
                                                    </div>
                                                </div>
                                              </div>
                                                   <label>MOBILE NO.</label>
                                                    <div class="form-group">
                                                        <input class="form-control" name="MOBILE NO"  type="text" placeholder="Enter MOBILE NO" required="">
                                                    </div>
                                                </div>
                                              </div>
                                              
                                              
										
											<br><br>
											
											</div>
							
											<div class="col-12 ml-2">
								        	<h5 class="text-warning ">Application Fee: <?php  
								        		$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT price FROM pricing WHERE service_name='voter_original_fee'")); 
								        		echo "₹" .$price['price'];
								        		?></h5>
								        		
								        	</div>
							
										    <div class="row" style="margin-left:50px; margin-top:25px;">
												<label>&nbsp;</label>
												<div class="form-group">              
												   <input type="submit" id="submit" name="submit" class="btn btn-success btn-block " style="" value="Submit" </input>
	<div id="result"></div>
<br><br>


	
	<script>
	
	$(document).ready(
    function(){
        $('input:file').change(
            function(){
                if ($(this).val()) {
                    $('input:submit').attr('disabled',false); 
                } 
            }
            );
    });
	</script> </div> 
	
                                            <input type="hidden" id="deviceport" />
                                        </div>
                                    </div>
                                </div>
							<!-- /# row -->
						</section>
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
	$('#pan_no').inputmask();
	$('#timea').inputmask("hh:mm:ss", {
        placeholder: "00:00:00", 
        insertMode: false, 
        showMaskOnHover: false,
        hourFormat: 12
      });
	});
</script>
</html>