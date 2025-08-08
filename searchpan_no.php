<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/searchpan_no.php');
if(isset($_POST['aadhaar_no']) && !empty($_POST['name']) &&  !empty($_POST['ret_wp_no']) ){
    $name = mysqli_real_escape_string($ahk_conn,$_POST['name']);
    $aadhaar_no = mysqli_real_escape_string($ahk_conn,$_POST['aadhaar_no']);
    $dob = mysqli_real_escape_string($ahk_conn,$_POST['dob']);
    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='pan_no' "));
    $application_no = "KAFILA". rand(000,999);
    $ret_wp_no = mysqli_real_escape_string($ahk_conn,$_POST['ret_wp_no']);
    $fee = $price['price'];
    $appliedby = $udata['phone'];
    if($udata['balance']>=$price['price']){
        $fee = $price['price'];
        $debit = mysqli_query($ahk_conn,"UPDATE users SET balance=balance-$fee WHERE phone='$appliedby'");
        $updatehistory = mysqli_query($ahk_conn,"INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$appliedby','$fee','$nbal','PAN Number Find','1','Debit')");
        if($debit && $updatehistory){
        $submit = mysqli_query($ahk_conn,"INSERT INTO `pan_no` (`application_no`,`appliedby`, `name`, `aadhaar_no`,  `dob`,  `status`, `ret_wp_no`,`fee`) VALUES('$application_no','$appliedby','$name','$aadhaar_no','$dob','pending','$ret_wp_no','$fee')");
        if($submit == true){
           ?>
                <script>
                    $(function(){
                        Swal.fire(
                            'Application Submitted !',
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