<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/newnsdlekyc.php');

if(isset($_POST['title']) && !empty($_POST['last_name']) && !empty($_POST['mode']) && !empty($_POST['gender']) ){
    $customer_ref_id = rand(00000,99999);
    $title = mysqli_real_escape_string($ahk_conn,$_POST['title']);
    $first_name = mysqli_real_escape_string($ahk_conn,$_POST['first_name']);
    $middle_name = mysqli_real_escape_string($ahk_conn,$_POST['middle_name']);
    $last_name = mysqli_real_escape_string($ahk_conn,$_POST['last_name']);
    $mode = mysqli_real_escape_string($ahk_conn,$_POST['mode']);
    $gender = mysqli_real_escape_string($ahk_conn,$_POST['gender']);
    if($mode == "E"){
        $price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='e_nsdl' "));
    }else if($mode == "P"){
        $price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='p_nsdl' "));
    }
    $appliedby = $udata['phone'];
    if($udata['balance']>=$price['price']){
        $fee = $price['price'];
        $debit = mysqli_query($ahk_conn,"UPDATE users SET balance=balance-$fee WHERE phone='$appliedby'");
        if($debit){
        $submit = mysqli_query($ahk_conn,"INSERT INTO `nsdlekyc` (`appliedby`, `customer_ref_id`, `title`, `first_name`, `middle_name`, `last_name`, `mode`,`gender`,`status`,`fee`) VALUES('$appliedby','$customer_ref_id','$title','$first_name','$middle_name','$last_name','$mode','$gender','pending','$fee')");
        if($submit == true){

        $nsdl_callback_url = $webdata['nsdl_callback_url'];
        //   Call API Here 
        $url = 'https://apizone.in/api/v1/services/nsdl/ekyc?transaction_id='.$customer_ref_id.'&title='.$title.'&first_name='.$first_name.'&middle_name='.$middle_name.'&last_name='.$last_name.'&gender='.$gender.'&mode='.$mode.'&redirect_url='.$webdata["nsdl_callback_url"].'&api_key='.$webdata['nsdl_api_key'];
        // echo $url;
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
         $response;
        
        $data = json_decode($response,true);
        if(!isset($data) ==''){
            if($data['status']==10){
                $fee = $price['price'];
                mysqli_query($ahk_conn,"UPDATE users SET balance=balance+$fee WHERE phone='$appliedby'");
            }else if($data['status'] ==0){
                ?>
                <script>
                $(function(){
                    Swal.fire(
                        '<?php  echo $data['message'];?>',
                        '',
                        'error'
                    )
                })
                </script>
                <?php
            }else if($data['status'] ==1){
                $response_url = $data['data']['response_url'];
                $encdata = $data['data']['encdata'];
                $updt = mysqli_query($ahk_conn,"UPDATE nsdlekyc SET json_response='$response', response_url='$response_url', encdata='$encdata'  WHERE customer_ref_id='$customer_ref_id'");
                ?>
                <form action="<?php echo $data['data']['response_url'] ?>" method="POST" name="f1">
                 <textarea name="encdata" id="" cols="30" rows="10"><?php echo $data['data']['encdata'] ?></textarea>
                </form>
                <?php 
                 // echo $response;
                 ?>
                 <script>
                document.f1.submit();
             </script>
                 <?php 
                 // Redirect to NSDL PORTAL END
                 
             }else{
                ?>
                <script>
                $(function(){
                    Swal.fire(
                        '<?php  echo $data['message'];?>',
                        '',
                        'error'
                    )
                })
                </script>
                <?php
             }
        }
        
        // API END
        }
            }
        
    }else{
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
    }
    
}
?>