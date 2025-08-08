<?php 
	include('header.php');
   ?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">All PROBLEMS LIST</h5>
                    </div>
                   
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example2" class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">SL.</th>
                                <th class="text-center">Appliedby</th>
                                <th class="text-center">Retailer Email</th>
                                <th class="text-center">Subject</th>
                                <th class="text-center">Meesage</th>
                                <th class="text-center">status</th>
                                
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
<?php
$res = mysqli_query($ahk_conn,"SELECT * FROM contact  ORDER BY id DESC");
if(mysqli_num_rows($res)>0){
    $x=0;
    while($data = mysqli_fetch_assoc($res)){
        $x ++;
        ?>
        <tr>
            <td class="text-center"><?= $x;?></td>
            <td class="text-center"><?= $data['name'];?></td>
            <td class="text-center"><?= $data['email'];?></td>
            <td class="text-center"><?= $data['sub'];?></td>
            <td class="text-center">
                  <div class="ms-2">
                        <h6 class="mb-1 font-14"><?php echo strtoupper($data['mess']); ?></h6>
                    </div>
            </td>
            <td class="text-center">
                <?php
                    if($data['status']=="pending"){
                        ?>
                        <div class="badge rounded-pill bg-light-warning text-warning w-100">Pending...
                        </div>
                       
                        <?php
                    }else if($data['status']=="success"){
                            ?>
                             <div class="badge rounded-pill bg-light-success text-success w-100">Success
                        </div>
                        
                            <?php
                    }
                ?>
            </td>
            
            
            <td  class="text-center">
                <?php
                    if($data['status']=="pending"){
                        ?>
                       <div style="width:250px;">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <input class="form-control mb-2" type="text"  name="reply" required  placeholder="Enter message here">
                            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                            
                            <button class="btn  px-6 btn-success">Update</button>
                        </form>
                       </div>
                        <?php
                    }else if($data['status']=="success"){
                            ?>
                             <div class="badge square-pill bg-light-danger text-danger w-100"><?php echo strtoupper($data['reply']); ?>
                        </div>
                            <div class="text-center text-primary">
                            Problem Solved 
                              
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
<script src="../template/ahkweb/assets/js/jquery.min.js"></script>
<script src="../template/ahkweb/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="../template/ahkweb/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="../template/ahkweb/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="../template/ahkweb/assets/plugins/chartjs/chart.min.js"></script>
<script src="../template/ahkweb/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="../template/ahkweb/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../template/ahkweb/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="../template/ahkweb/assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
<script src="../template/ahkweb/assets/plugins/jquery-knob/excanvas.js"></script>
<script src="../template/ahkweb/assets/plugins/jquery-knob/jquery.knob.js"></script>
<script>
$(function() {
    $(".knob").knob();
});
</script>
<script src="../template/ahkweb/assets/js/index.js"></script>
<!--app JS-->
<script src="../template/ahkweb/assets/js/app.js"></script>
<!-- datatable -->
<script src="../template/ahkweb/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="../template/ahkweb/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
		$(document).ready(function() {
			$('#example').DataTable();
            $('#aadh').inputmask();
		  } );
	</script>
	
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );


	</script>
	
</body>



</html>