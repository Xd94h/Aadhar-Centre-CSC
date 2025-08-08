<?php
include('header.php');
?>
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
<style>
    td, th {
    border: 1px solid #0c0a0a;
    text-align: left;
    padding: 5px!important;
    width: 18%!important;
    background: #5bc0de;
}
.bg-white {
    background-color: #!important;
}
</style>

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">AAYUSHMAN CARD PRINT</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">INSTANT PRINT</li>
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

<main id="main" class="main">
<div class="d-flex justify-content-center">
        <div class="col-lg-6">
			<div class="card">
			<div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
              Advance Ayushman Successfully Working On All Devices. 
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <div class="card-body">
            <br>			
							
							 <div class="col-md-12 text-center">
							     	<h3>Ayushman Card Print</h3>
			
                       <form method="post" name="f1">
		       
 <div class="form-group">
                               <label>
                           Select State
                        </label>
                        
                       <select name="s1" id="s1" class="form-control">
                    <option value="">Select State</option>
                    <option value="35">ANDAMAN AND NICOBAR ISLANDS</option>
                    <option value="28">ANDHRA PRADESH</option>
                    

                      
                    <option value="12">ARUNACHAL PRADESH</option>
                    
                    
                      
                    <option value="18">ASSAM</option>
                    
                    
                      
                    <option value="10">BIHAR</option>
                    
                    
                      
                    <option value="4">CHANDIGARH</option>
                    
                    
                      
                    <option value="22">CHHATTISGARH</option>
                    
                    
                      
                    <option value="26">DADRA AND NAGAR HAVELI</option>
                    
                    
                      
                    <option value="25">DAMAN AND DIU</option>
                    
                    
                      
                    <option value="7">DELHI</option>
                    
                    
                      
                    <option value="30">GOA</option>
                    
                    
                      
                    <option value="24">GUJARAT</option>
                    
                    
                      
                    <option value="6">HARYANA</option>
                    
                    
                      
                    <option value="2">HIMACHAL PRADESH</option>
                    
                    
                      
                    <option value="1">JAMMU AND KASHMIR</option>
                    
                    
                      
                    <option value="20">JHARKHAND</option>
                    
                    
                      
                    <option value="29">KARNATAKA</option>
                    
                    
                      
                    <option value="32">KERALA</option>
                    
                    
                      
                    <option value="31">LAKSHADWEEP</option>
                    
                    
                      
                    <option value="23">MADHYA PRADESH</option>
                    
                    
                      
                    <option value="27">MAHARASHTRA</option>
                    
                    
                      
                    <option value="14">MANIPUR</option>
                    
                    
                      
                    <option value="17">MEGHALAYA</option>
                    
                    
                      
                    <option value="15">MIZORAM</option>
                    
                    
                      
                    <option value="13">NAGALAND</option>
                    
                    
                     
                    
                      
                    <option value="21">ODISHA</option>
                    
                    
                      
                    <option value="34">PUDUCHERRY</option>
                    
                    
                      
                    <option value="3">PUNJAB</option>
                    
                    
                      
                    <option value="8">RAJASTHAN</option>
                    
                    
                      
                    <option value="11">SIKKIM</option>
                    
                    
                      
                    <option value="33">TAMIL NADU</option>
                    
                    
                      
                    <option value="36">TELANGANA</option>
                    
                    
                      
                    <option value="16">TRIPURA</option>
                    
                    
                      
                    <option value="5">UTTARAKHAND</option>
                    
                    
                      
                    <option value="9">UTTAR PRADESH</option>
                    
                    
                      
                    <option value="19">WEST BENGAL</option>
                    
                    
                  </select>
                  
                            </div>
                                                     
                              <div class="form-group">
                                  <label>
                            Select Proof
                        </label>
<select name="p3" id="p3" required="" class="form-control">
    <option value="">Select</option>
    <option value="A">AB-PMJAY ID</option>
    <option value="R">Family-ID</option>
    <option value="S">Aadhar Number</option>
  </select>
                                     </div>
                                     <div class="form-group">
                                 <label>
                            Enter parameter
                        </label>
   <input type="text" name="p1" id="p1" placeholder="Enter No parameter" class="form-control" autocomplete="off"> 
    <input type="hidden" name="submit1" value="submit">  

                                     	</form>
                                      <div class="form-group">
                                <button type="submit" class="btn btn-primary" onclick="myFunction()">Get Data</button>

	 
                </section>
	<script>
function myFunction() {
    var state = document.getElementById("s1").value;
    var type= document.getElementById("p3").value;
    var value = document.getElementById("p1").value;
    if(state==''){
        alert("Please Select state");
    }else if(type==''){
        alert('Please select Proof');
    }else if(value==''){
        if(value=='R'){
            var ss = 'Family Id';
            alert('Please enter '+ss+' ');
        }else if(value=='A'){
            var ss1 = 'AB PMJAY ID';
            alert('Please enter '+ss1+' ');
                alert('Please enter '+ss1+' ');
        }else{
            var ss2 = 'Mobile Number';
            alert('Please enter '+ss2+' ');
        }
        
    }else{
        $("#proc_modal").modal('show');
   document.f1.submit();
    }
  
  
}
</script>		
<!-----Page Loader Process-------
<div class="modal fade" id="proc_modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<center>
				<img src="https://dlprint.in/pre.gif">
				<h6>Please wait. we are processing your request ...</h6>
			</center>
		</div>
	</div>
</div>
-Page Loader Process---------->
 <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<?php 
if(isset($_POST['p1']))
{
	$flno = $_POST['p1'];
	 $stid = $_POST['s1'];
	$mob = $_POST['p3'];		
	if($mob == "R"){
	    $type = "familyid";
	}else if($mob=="S"){
	    $type = "mob";
	}


 $v = file_get_contents('https://api.printscard.com/ayushman_verification.php?'.$type.'='.$flno.'&stateid='.$stid.'&apikey=5c2883ff41a4d59e11ec');
 $vk = json_decode($v,true);
$userid= $_SESSION[ 'userid' ];
  echo "
 <center><h4>Ayushman Card List</h4></center>
 <div>
 <table border='1' cellpadding='10px' width='100%'>
  <tbody><tr>
       <th>Id</th>
    <th>Name</th>
    <th>Father Name</th>
    <th>Created Time</th>
    <th>Print</th>
  </tr>
  </tbody>
  </table>
  </div>";
 for ($x = 0; $x <= 250; $x++){
 $status=$vk[$x]['status'];
  $a1=$x+1;
 if($status){
   
 
 $pmrssmid=$vk[$x]['pmrssmid'];
 $userName=$vk[$x]['userName'];
 $fatherName=$vk[$x]['fatherName'];
 $createdOn=$vk[$x]['createdOn'];

 
 
 echo"<div>
 <table border='1' cellpadding='10px' width='100%'>
  <tbody><tr>
       <td>$a1</td>
    <td>$userName</td>
    <td>$fatherName</td>
    <td>$createdOn</td>
    <td><form action='downlord1.php' method='post' target='_blank'>
   <input type='hidden' name='stid' value='$stid'>
   <input type='hidden' name='familyid' value='$flno'>
   <input type='hidden' name='userid' value='$userid'>
  <input type='hidden' name='id' value='$pmrssmid'>
  <input type='submit' name='sumbit' class='btn btn-success' value='Print Card'>
</form></td>
</tr>
</tbody></table>

	
                               </div>";
 
}


}

}?>	
 </div>
<?php include('footer.php'); ?>