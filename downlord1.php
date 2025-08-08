<?php
include('../../includes/config.php');

$familyid = $_POST['familyid'];
$id=$_POST['id'];
$userid=$_POST['userid'];
$stateid=$_POST['stid'];
$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='ayushman_price' "));

    $fee = $price['price'];
    $appliedby = $udata['phone'];
    if($udata['balance']>=$price['price']){
        $fee = $price['price'];
        $debit = mysqli_query($ahk_conn,"UPDATE users SET balance=balance-$fee WHERE phone='$appliedby'");
//print_r($_POST);
//die;
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://$skylineapiurl/serviceApi/V1/Ayus_Down.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('familyid' => $familyid,'id' => $id,'stateid' => $stateid,'apiKey' =>$skyline_key),
));

$response = curl_exec($curl);

curl_close($curl);
header('Content-Type: application/pdf');
echo $response;
 if($submit == true){
           ?>
                <script>
                    $(function(){
                        Swal.fire(
                            'Application Submitted Success',
                            '',
                            'success'
                        )
                    })
                    setTimeout(() => {
                        window.location='';
                    }, 1200);
                </script>
                    <?php
        }else{
            ?>
            <script>
              $(function(){
                 Swal.fire(
                     'Opps',
                     'Try Again',
                     'error'
                 )
             })
             setTimeout(() => {
                    window.location='';
                }, 1200);
            </script>
             <?php
        }
            }
        
   
        ?>
        <script>
          $(function(){
             Swal.fire(
                 'Wallet Balance is Low!',
                 'Please Recharge Now!',
                 'error'
             )
         })
         setTimeout(() => {
                window.location='wallet.php';
            }, 1200);
        </script>
         <?php
    
    



?>