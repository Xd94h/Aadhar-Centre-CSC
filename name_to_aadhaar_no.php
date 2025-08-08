<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/name_to_aadhaar_no.php');
if(isset($_POST['name']) && !empty($_POST['name']) && !empty($_POST['mobile']) ){
    $name = mysqli_real_escape_string($ahk_conn,$_POST['name']);
    $mobile = mysqli_real_escape_string($ahk_conn,$_POST['mobile']);
    $application_no = "AHK". rand(00000000,99999999);
    $appliedby = $udata['phone'];
    $date = date("jS \of F Y h:i:s A");
    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='name_to_aadhaar' "));
    if($udata['balance']>=$price['price']){
        $fee = $price['price'];
        $nbal = $udata['balance']-$price['price'];
        $debit = mysqli_query($ahk_conn,"UPDATE users SET balance=balance-$fee WHERE phone='$appliedby'");
        $updatehistory = mysqli_query($ahk_conn,"INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$appliedby','$fee','$nbal','Name to Aadhaar Number Find','1','Debit')");
        if($debit && $updatehistory ){
        $submit = mysqli_query($ahk_conn,"INSERT INTO `name_to_aadhaar` (`appliedby`, `application_no`, `name`, `mobile`, `status`, `fee`,`date`) VALUES('$appliedby','$application_no','$name','$mobile','pending','$fee','$date')");
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
                     'Try Again1',
                     'error'
                 )
             })
             setTimeout(() => {
                    window.location='';
                }, 1200);
            </script>
             <?php
        }
            }else{
                ?>
                <script>
                  $(function(){
                     Swal.fire(
                         'Opps',
                         'Try Again2',
                         'error'
                     )
                 })
                 setTimeout(() => {
                        window.location='';
                    }, 1200);
                </script>
                 <?php
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