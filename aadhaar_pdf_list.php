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
                        <h5 class="mb-0">All RASAN PDF FIND LIST</h5>
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
                                <th class="text-center">Apply Date</th>
                                <th class="text-center">AADHAAR No</th>
                               <th class="text-center">Date of Birth</th>
                                <th class="text-center">Aadhaar No</th>
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
          
            $url = 'https://apizone.in/api/v1/services/aadhaar_pdf/track.php?application_no='.$application_no.'&api_key='.$api_key;
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
                $sql = mysqli_query($ahk_conn,"UPDATE aadhaar_pdf SET pdf_link='".$resdata['pdf_link']."', status='success' WHERE application_no='".base64_decode($application_no)."'");
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
                        window.location='aadhaar_no_to_aadhaar_pdf_list.php';
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
$res = mysqli_query($ahk_conn,"SELECT * FROM aadhaar_pdf WHERE appliedby='".$udata['phone']."'  ORDER BY id DESC");
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
                <?php echo strtoupper($data['pan_no']); ?>
                <?php
            }else{
                echo "Under Process";
            }
            ?></td>
            <td class="text-center">
                <?php
                    if($data['status']=="pending"){
                        ?>
                        <div class="badge rounded-pill bg-light-warning text-warning w-100">Plz Wait
                        </div>
                        
                        <?php
                    }else if($data['status']=="success"){
                            ?>
                            <div class="text-center">
                                <a download="<?php echo $data['pan_no'] ?>" href="<?php echo $data['pdf_link'] ?>" class="btn btn-sm btn-success">Download PDF</a>
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