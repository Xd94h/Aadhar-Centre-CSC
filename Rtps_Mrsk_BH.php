<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/header.php');

if ($udata['balance'] < 100) {
    ?>
    <script>
        Swal.fire({
            title: 'Your ID Not Activate',
            text: 'Please Buy a Plan And Enjoy !! आपकी आईडी सक्रिय नहीं है! कृपया प्लान खरीदें और आनंद लें !!',
            icon: 'error'
        }).then(function () {
            window.location.href = "wallet.php";
        });
    </script>
<?php } else {
if(isset($_POST['name'])){
    
    $application_no = trim($_POST['application_no']);
    $application_date = trim($_POST['application_date']);
    $Signature = trim($_POST['Signature']);
    $name = trim($_POST['name']);
    $name_local = trim($_POST['name_local']);
    $father = trim($_POST['father']);
    $father_local = trim($_POST['father_local']);
    $mother = trim($_POST['mother']);
    $mother_local = trim($_POST['mother_local']);
    $village = trim($_POST['village']);
    $post = trim($_POST['post']);
    $police_station = trim($_POST['police_station']);
    $block = trim($_POST['block']);
    $sub_division = trim($_POST['sub_division']);
    $district = trim($_POST['district']);
    $pincode = trim($_POST['pincode']);
    $cast_type = trim($_POST['cast_type']);
    $type = trim($_POST['type']);
    $userid = $_SESSION['userid'];
    date_default_timezone_set("Asia/Kolkata");
    $timestamp = date('d/m/Y g:i:s');
    $agriculture = trim($_POST['agriculture']);
    $government = trim($_POST['government']);
    $business = trim($_POST['business']);
    $other_s = trim($_POST['other_s']);
    $place = trim($_POST['place']);
    
        $maxFileSize = 30 * 1024; 

if (!empty($_FILES['image']['tmp_name'])) {
    $uploadedFileSize = $_FILES['image']['size'];
    
    if ($uploadedFileSize <= $maxFileSize) {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
        $base64Image = "data:image/png;base64," . base64_encode($imageData);
    } else {
        echo "Error: The uploaded image exceeds the maximum allowed size of 30KB.";
        $base64Image = ''; 
    }
} else {
    $base64Image = '';
}
  
  $balance=$udata['findwallet'];
  $fee = "20";
  $debit_fee =  $balance - $fee;
  if ($balance < $fee) {
            ?>
            <script> 
                swal('Balance Low', 'Please Recharge Now !!', 'warning');
            </script>
            <?php
        } else {
      $debit = mysqli_query($ahk_conn,"UPDATE `users` SET blance='$debit_fee' WHERE userid='$userid'");
      if($debit){
   $q = "INSERT INTO `rtps_manual`(`application_no`, `application_date`, `Signature`, `name`, `name_local`, `father`, `father_local`, `mother`, `mother_local`, `village`, `post`, `police_station`, `block`, `sub_division`, `district`, `pincode`, `cast_type`, `type`, `userid`, `create_date`, `agriculture`, `government`, `business`, `other_s`, `place`, `fee`, `image`) VALUES ('$application_no','$application_date','$Signature','$name','$name_local','$father','$father_local','$mother','$mother_local','$village','$post','$police_station','$block','$sub_division','$district','$pincode','$cast_type','$type','$userid','$timestamp','$agriculture','$government','$business','$other_s','$place','$fee','$base64Image')";
    $summary = mysqli_query($ahk_conn,"INSERT INTO `balance`(`name`, `number`, `status`, `fee`,`type`,`old_balance`,`new_balance`, `date`, `userid`) VALUES ('$name','$application_no','$type','$fee','D','$balance','$debit_fee','$timestamp','$userid')"); 
      }
mysqli_set_charset($ahk_conn, "utf8");

    $res = mysqli_query($ahk_conn,$q);
   // print_r($ahk_conn);
     if ($res) {
                ?>
              <script>
    Swal.fire({
        title: 'Success',
        text: 'Application Successful Saved.',
        icon: 'success'
    });

    setTimeout(function () {
        window.location.href = 'Rtps_Mrsk_List_BH.php';
    }, 2000);
</script>

                <?php
            } else {
                ?>
                  <script>
    Swal.fire({
        title: 'Failed',
        text: 'Failed to save the application. Please try again later.',
        icon: 'success'
    });
                </script>
                <?php
            }
        }
    }
}
?>

       	<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
          <div class="content-wrapper">
					<section id="basic-form-layouts">

  <div class="row">

  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
       <div class="card-body bg-warning">
          <div class="px-3">
									<h1> RTPS CERTIFICATE MANUAL PRINT </h1>
							  </div>
							</div>
						</div>
					 		 
								 

						<!-- /# row -->
						<section id="main-content">
                       <?php if($msgno==1){ ?><div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
                       <script>
                       
                       setTimeout(()=>{
                            window.location.href="#";
                       },200);</script>
                       <?php } ?>
							<div class="row  dgnform">
                            <div class="card">
                           
                           <div class="col-sm-12">
                           <form action="" method="post" accept-charset="UTF-8" enctype="multipart/form-data">  
                           <div class="row">
                         
                                                    <div class="col-sm-3">
                                                        <label>Certificate Type</label>
                                                        <div class="form-group">
                                                            <select name="type" id="type" class="form-control border-primary bg-danger" style="color:white" required>
                                                            <option value="">Choose Certificate</option>
                                                            <option value="Cast">Cast Certificate</option>
                                                            <option value="Residence">Residence Certificate</option>
                                                            <option value="Income">Income Certificate</option>
                                                            </select>
                                                              </div>
                                                         </div>

                                                    <div class="col-sm-3">
                                                        <label> Name</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="" id="name" placeholder="Full Name" autocomplete="off" name="name" type="text" maxlength="60" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Name Local</label>
                                                        <div class="form-group">
                                                            <input class="form-control" value="" id="name_local" placeholder="Full Name Hindi" autocomplete="off" name="name_local" type="text" maxlength="60" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Father Name </label>
                                                        <div class="form-group">
                                                            <input class="form-control" value="" id="father" placeholder="Father Name" name="father" type="text" required="">
														</div>
                                                    </div>    
                                                    <div class="col-sm-3">
                                                        <label>Father Name Local</label>
                                                        <div class="form-group">
                                                            <input class="form-control" value="" id="father_local" placeholder="Father Name Hindi" name="father_local" type="text" required="">
														</div>
                                                    </div>    
                                                    <div class="col-sm-3">
                                                        <label>Mother Name </label>
                                                        <div class="form-group">
                                                            <input class="form-control" value="" id="mother" placeholder="Mother Name" name="mother" type="text" required="">
														</div>
                                                    </div>    
                                                    <div class="col-sm-3">
                                                        <label>Mother Name Local</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="" id="mother_local" placeholder="Mother Name Hindi" name="mother_local" type="text" required="">
														</div>
                                                    </div>    
                                                    <div class="col-sm-3">
                                                        <label>Category type</label>
                                                        <div class="form-group">
                                                       <select name="cast_type" id="cast_type" class="form-control" >
                                                       <option value="">Select Category </option>
                                                       <option value="EBC">अत्यंत पिछड़ा वर्ग (अनुसूची-1)</option>
                                                       <option value="BC">पिछड़ा वर्ग (अनुसूची-2)</option>
                                                       <option value="SC">अनुसूचित जाति</option>
                                                       <option value="ST">अनुसूचित जनजाति</option>
                                                       <option value="GENERAL">गैर आरक्षित</option>
                                                   </select>
                                                   </div>
                                                     </div>
                                                    <div class="col-sm-3">
                                                        <label>Village</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="village" id="village" value="" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Post</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="post" id="post" value="" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Police Station </label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="police_station" id="police_station" value="" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Sub-Division </label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="sub_division" id="sub_division" value="" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Block</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="block" id="block"value="" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>District</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="district" id="district" value="" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Pincode</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="pincode" id="pincode" value="" maxlength="6" type="number" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Income From Government</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="government" id="government" value="" type="number" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Income From Business</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="business" id="business" value="" type="number" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Income From Agriculture</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="agriculture" id="agriculture" value="" type="number" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Income from other sources</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="other_s" id="other_s" value="" type="number" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Application Number</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="application_no" id="application_no" value="" type="text"  required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Application Delivery Date & time</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="application_date" id="application_date" value="" placeholder="example : 2024.09.29 01:20:51" type="text" pattern="\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}" title="Please enter the date and time in the correct format: yyyy-mm-dd hh:mm:ss" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-3">
                                                        <label>Place </label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="place" id="place" value="" type="text"  required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Officer Digital Sign</label>
                                                        <div class="form-group">
                                                            <input class="form-control" name="Signature" id="Signature" value="" type="text"  required>
                                                        </div>
                                                    </div>
                                                    
                                                     <div class="col-md-3">
                                                              <label>Choose Image:<span style="color:red;">*</span></label>
                                                          <div class="form-group">
                                                              <input type="file" name="image" id="image" accept="image/*" >
                                                          </div>
                                                    <div class="form-group">
                                                       <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 150px; max-height: 150px; display: none; border: 1px solid black;">
                                                    </div>
                                                      <input type="hidden" name="base64Image" id="base64Image" value="">
                                                      <input type="hidden" name="imageSize" id="imageSize" value="">
                                                              </div>
                                                         
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <label> </label>
                                                               <div class="form-group">
                                                                   <button class="form-control btn btn-success  ">Submit</button>
                                                               </div>
                                                            </div>
												         </div>
                                                      </div>
                                                 </form>
							                  </div>
                            </section>
					</div>
				</div>
            </div>
        </div>

<script>
    // Add event listener to the "Village" input field
    document.getElementById("village").addEventListener("keyup", function(event) {
        // Check if the pressed key is a space
        if (event.key === " ") {
            // Get the input value
            const villageValue = this.value;

            // Translate the input value to Hindi
            translateText(villageValue, 'hi').then(translatedText => {
                // Display the translated text in the "Village" input field
                this.value = translatedText;
            });
        }
    });
    
    // Add event listener to the "post" input field
    document.getElementById("post").addEventListener("keyup", function(event) {
        // Check if the pressed key is a space
        if (event.key === " ") {
            // Get the input value
            const postValue = this.value;

            // Translate the input value to Hindi
            translateText(postValue, 'hi').then(translatedText => {
                // Display the translated text in the "post" input field
                this.value = translatedText;
            });
        }
    });
    
    // Add event listener to the "police_station" input field
    document.getElementById("police_station").addEventListener("keyup", function(event) {
        // Check if the pressed key is a space
        if (event.key === " ") {
            // Get the input value
            const police_stationValue = this.value;

            // Translate the input value to Hindi
            translateText(police_stationValue, 'hi').then(translatedText => {
                // Display the translated text in the "police_station" input field
                this.value = translatedText;
            });
        }
    });
    
    // Add event listener to the "sub_division" input field
    document.getElementById("sub_division").addEventListener("keyup", function(event) {
        // Check if the pressed key is a space
        if (event.key === " ") {
            // Get the input value
            const sub_divisionValue = this.value;

            // Translate the input value to Hindi
            translateText(sub_divisionValue, 'hi').then(translatedText => {
                // Display the translated text in the "sub_division" input field
                this.value = translatedText;
            });
        }
    });
    
    // Add event listener to the "block" input field
    document.getElementById("block").addEventListener("keyup", function(event) {
        // Check if the pressed key is a space
        if (event.key === " ") {
            // Get the input value
            const blockValue = this.value;

            // Translate the input value to Hindi
            translateText(blockValue, 'hi').then(translatedText => {
                // Display the translated text in the "block" input field
                this.value = translatedText;
            });
        }
    });
    
    // Add event listener to the "district" input field
    document.getElementById("district").addEventListener("keyup", function(event) {
        // Check if the pressed key is a space
        if (event.key === " ") {
            // Get the input value
            const districtValue = this.value;

            // Translate the input value to Hindi
            translateText(districtValue, 'hi').then(translatedText => {
                // Display the translated text in the "district" input field
                this.value = translatedText;
            });
        }
    });
    
    // Add event listener to the "place" input field
    document.getElementById("place").addEventListener("keyup", function(event) {
        // Check if the pressed key is a space
        if (event.key === " ") {
            // Get the input value
            const placeValue = this.value;

            // Translate the input value to Hindi
            translateText(placeValue, 'hi').then(translatedText => {
                // Display the translated text in the "place" input field
                this.value = translatedText;
            });
        }
    });

    function translateText(text, targetLanguage) {
        // Google Translate API endpoint
        const apiUrl = `https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=${targetLanguage}&dt=t&q=${text}`;

        return new Promise((resolve, reject) => {
            // Fetch translation from Google Translate API
            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    // Extract translated text from the API response
                    const translatedText = data[0][0][0];
                    // Resolve the Promise with the translated text
                    resolve(translatedText);
                })
                .catch(error => {
                    // Handle errors
                    console.error(error);
                    reject(error);
                });
        });
    }
</script>
<script>
    $('#name').on('input', function () {
        const name = $('#name').val();
        translateText(name, 'hi').then(nameHindi => {
            $('#name_local').val(nameHindi);
        });
    });

    $('#father').on('input', function () {
        const father = $('#father').val();
        translateText(father, 'hi').then(fatherHindi => {
            $('#father_local').val(fatherHindi);
        });
    });

    $('#mother').on('input', function () {
        const mother = $('#mother').val();
        translateText(mother, 'hi').then(motherHindi => {
            $('#mother_local').val(motherHindi);
        });
    });

    function translateText(text, targetLanguage) {
        const apiUrl = `https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=${targetLanguage}&dt=t&q=${text}`;

        return new Promise((resolve, reject) => {
            $.ajax({
                url: apiUrl,
                method: 'GET',
                success: function (response) {
                    resolve(response[0][0][0]);
                },
                error: function (error) {
                    console.error(error);
                    reject(error);
                }
            });
        });
    }
</script>


<script>
  // Get the select element and relevant form groups
var certificateTypeSelect = document.getElementById('type');
var castTypeFormGroup = document.querySelector('.col-sm-3:has(#cast_type)');
var imageFormGroup = document.querySelector('.col-md-3:has(#image)');
var agricultureFormGroup = document.querySelector('.col-sm-3:has(#agriculture)');
var governmentFormGroup = document.querySelector('.col-sm-3:has(#government)');
var businessFormGroup = document.querySelector('.col-sm-3:has(#business)');
var otherSFormGroup = document.querySelector('.col-sm-3:has(#other_s)');

// Add event listener to the certificate type select element
certificateTypeSelect.addEventListener('change', function () {
    var selectedOption = certificateTypeSelect.value;

    // Reset all form groups to be visible and enabled
    castTypeFormGroup.style.display = 'block';
    castTypeFormGroup.querySelector('select').disabled = false;

    imageFormGroup.style.display = 'block';
    imageFormGroup.querySelector('input').disabled = false;

    agricultureFormGroup.style.display = 'block';
    agricultureFormGroup.querySelector('input').disabled = false;

    governmentFormGroup.style.display = 'block';
    governmentFormGroup.querySelector('input').disabled = false;

    businessFormGroup.style.display = 'block';
    businessFormGroup.querySelector('input').disabled = false;

    otherSFormGroup.style.display = 'block';
    otherSFormGroup.querySelector('input').disabled = false;

    // Check the selected option and hide/disable relevant form groups
    if (selectedOption === 'Cast') {
        imageFormGroup.style.display = 'none';
        imageFormGroup.querySelector('input').disabled = true;

        agricultureFormGroup.style.display = 'none';
        agricultureFormGroup.querySelector('input').disabled = true;

        governmentFormGroup.style.display = 'none';
        governmentFormGroup.querySelector('input').disabled = true;

        businessFormGroup.style.display = 'none';
        businessFormGroup.querySelector('input').disabled = true;

        otherSFormGroup.style.display = 'none';
        otherSFormGroup.querySelector('input').disabled = true;
    } else if (selectedOption === 'Income') {
        castTypeFormGroup.style.display = 'none';
        castTypeFormGroup.querySelector('select').disabled = true;

        imageFormGroup.style.display = 'none';
        imageFormGroup.querySelector('input').disabled = true;
        
    } else if (selectedOption === 'Residence') {
    // Hide and disable select element inside castTypeFormGroup
    castTypeFormGroup.style.display = 'none';
    castTypeFormGroup.querySelector('select').disabled = true;

    // Hide and disable input elements inside other form groups
    agricultureFormGroup.style.display = 'none';
    agricultureFormGroup.querySelector('input').disabled = true;

    governmentFormGroup.style.display = 'none';
    governmentFormGroup.querySelector('input').disabled = true;

    businessFormGroup.style.display = 'none';
    businessFormGroup.querySelector('input').disabled = true;

    otherSFormGroup.style.display = 'none';
    otherSFormGroup.querySelector('input').disabled = true;
}

});


</script>

        
<script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('image').addEventListener('change', function () {
                const fileInput = this;
                const imagePreview = document.getElementById('imagePreview');
                const base64ImageInput = document.getElementById('base64Image');
                const imageSizeInput = document.getElementById('imageSize');
                const maxFileSize = 30 * 1024; // 30KB

                if (fileInput.files && fileInput.files[0]) {
                    const file = fileInput.files[0];
                    const fileSize = file.size;

                    if (fileSize <= maxFileSize) {
                        const reader = new FileReader();

                        reader.onload = function (e) {
                            imagePreview.src = e.target.result;
                            imagePreview.style.display = 'block';
                            base64ImageInput.value = e.target.result; // Store base64 image data
                            imageSizeInput.value = fileSize; // Store image size
                        };

                        reader.readAsDataURL(file);
                    } else {
                        fileInput.value = '';
                        imagePreview.style.display = 'none';
                        base64ImageInput.value = '';
                        imageSizeInput.value = '';

                        Swal.fire({
                            title: 'Error',
                            text: 'Please upload an image with a maximum size of 30KB.',
                            icon: 'error'
                        });
                    }
                }
            });
        });
    </script>
<script>
    // Preview image before upload
    document.getElementById('image').addEventListener('change', function (e) {
        var imagePreview = document.getElementById('imagePreview');
        imagePreview.style.display = 'block';
        imagePreview.src = URL.createObjectURL(e.target.files[0]);
    });
</script>
<?php include('../template/ahkweb/footer.php'); ?>