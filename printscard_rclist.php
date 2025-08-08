<?php include 'userHeader.php';?>

 <main id="main" class="main">

     <div class="card">
            <div class="card-body">
  
  


          <h4 class="card-title"></h4>
            </script>
								<h1> Rc Number To Rc Pdf  List</h1> 
				</div>
 
  
   <br>




  
        <div class="card-content collpase show">
          <div class="card-body card-dashboard table-responsive">
             
           	<section id="main-content">
							<div class="row dgnform"> 
							    <div class="col-md-12 col-sm-12 col-xs-12" style="    margin-left: 14px;">
							
								<table id="ulist" width="100%" cellpadding="10" cellspacing="0" style="font-size:12px;" >
								<thead>
									<tr style="background:#ff0000;">
								
                            	<th style="color:#fff">S.N</th>
                             		<th style="color:#fff">Application No</th>
                            	<th style="color:#fff">Name</th>
                                          	<th style="color:#fff">Rc No</th>
                                            
                                            	<th style="color:#fff">date</th>
                                            
                                           	<th style="color:#fff">Pdf Print</th>
                                        </tr>
                                    </thead>

            
          <!-- Get All User Details  -->
									<?php
								if($_SESSION['userid']==1)
								    
								    $sql = "SELECT * FROM `printscard_dl_rc` order by userid desc";
								else
								    $sql = "SELECT * FROM `printscard_dl_rc` WHERE userid='" . $_SESSION['userid'] . "' order by userid desc";
								$a = mysqli_query($connection, $sql);
								$x = 0; ?>
								<?php while($b = mysqli_fetch_array($a)){ $x++;  $date = date_create($b['date']);?>
                   

			<tr id="a">
										<td align="left" valign="left"> <?=$x?> </td>
											<td align="left" valign="left"> <?=$b['application_no']?> </td>
										<td align="left" valign="left"> <?=$b['name']?> </td>
										
										<td align="left" valign="left"> <?=$b['rc_no']?> </td>
											<td align="left" valign="left"> <?=$b['date']?> </td>
											
												
									      
										
									
											<td align="center" valign="middle">
								
											 
			
									
											<a style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;"  class="btn btn-success active " style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;" href="rc_download.php?id=<?php echo $b['id']?>" target="_blank"><i class="fa fa-print" style="color:black"></i> PDF  DOWNLOAD </a> 
								</td>  
											
										
										

												</form>
											</td>
										
									</tr>
									<?php } ?>
									</tbody>
								</table>
								
									
											
						
								 </div>
								<div class="clearfix"></div>
							 </div>
						</section>
						
    					 </div>
						</section>
					</div>
				</div>
            </div>
        </div>
			
			  

			
<?php include('userFooter.php'); ?>