<?php
include('./includes/config.php');
$ref_code = '';
if(isset($_GET['ref']) && $_GET['ref']!=''){
    $ref_code = base64_decode(mysqli_real_escape_string($ahk_conn,$_GET['ref']));
}
include('./template/ahkweb/authentication-signup.php');

if(isset($_POST['phone']) && !empty($_POST['phone'])){
    $name = mysqli_real_escape_string($ahk_conn,$_POST['name']);
    $email = mysqli_real_escape_string($ahk_conn,$_POST['email']);
    $phone = mysqli_real_escape_string($ahk_conn,$_POST['phone']);
    $usertype = mysqli_real_escape_string($ahk_conn,$_POST['usertype']);
    $ref = mysqli_real_escape_string($ahk_conn,$_POST['ref']);
    $password = mysqli_real_escape_string($ahk_conn,$_POST['password']);
    $cpassword = mysqli_real_escape_string($ahk_conn,$_POST['cpassword']);
    $order_id = "alam_".rand(000000,999999);
    $amount =1;
    if($usertype == "retailer"){
        $amount = 199;
    }else if($usertype == "distributor"){
        $amount = 499;
    }else{
        $amount = 9999999999999999;
    }
    if($_POST['usertype'] =="ADMIN" || $_POST['usertype'] =="admin" || $_POST['usertype'] =="Admin"){
        ?>
        <script>
            $(function(){ 
                Swal.fire(
                    'Wow!',
                    'You are A cheater WHY WHY WHY...!!!! WAH MOZ KARDI🖕🖕🖕🖕🖕 ',
                    'error'
                )
            })
        </script>
        <?php 
    }else{
        $fdata = mysqli_query($ahk_conn,"SELECT * FROM users WHERE phone='$phone' OR email='$email'");
        if(mysqli_num_rows($fdata) == 0){
            if($_POST['password'] == $_POST['cpassword']){
                $vpass= password_hash($_POST['password'], PASSWORD_DEFAULT);
                $res = mysqli_query($ahk_conn,"INSERT INTO `users`( `name`, `phone`, `email`, `password`, `type`, `status`,`referred_by`,`order_id`) VALUES ('$name','$phone','$email','$vpass','$usertype','0','$ref_code','$order_id')");
                if($ref_code !=''){
                    $referupdate = mysqli_query($ahk_conn,"INSERT INTO referal (`phone`, `referred_by`, `txn_no`, `referral_balance`,  `status`) VALUES('$phone','$ref_code','REF".rand(00000,99999)."','".$webdata['ref_bal']."','1')");
                }
                if($res){
                    if($_POST['mode'] =="paytm"){
                         ?>
                    <form name="f2" method="post" action="paytm/registerRedirect.php">
                    <input hidden id="ORDER_ID" name="ORDER_ID" value="<?php echo  $order_id ;?>">
                    <input hidden type="hidden" name="new" value="1">
                    <input hidden id="CUST_ID" name="CUST_ID" value="<?php echo $phone; ?>">
                    <input hidden id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" value="Retail">
                    <input hidden id="CHANNEL_ID" name="CHANNEL_ID" value="WEB">
                    <input hidden type="text" name="TXN_AMOUNT" value="<?php echo $amount; ?>">
                </form>
                <script type="text/javascript">
                document.f2.submit();
                </script>
                <!--  -->
                    <?php 
                    }else if($_POST['mode'] == "payu"){
                         // Payu Code Start Here 
                        $ORDER_ID =  $phone . rand(1000,99999);
                            ?>
                    <form class="mt-2" method="post" name="f2" action="payu/register.php?pay_uid">
                    <input  type="hidden"  name="pay_uid"  value="<?php echo $phone ?>">
                    <input  type="hidden"  name="order_id"  value="<?php echo $ORDER_ID; ?>">
                    <input type="hidden" name="Pay_Amt" value="<?php echo $amount; ?>">
                    </form>
                    <script type="text/javascript">
                    document.f2.submit();
                    </script>
                        <?php 

                    
                        // Payu Code End Here 
                    }else if($_POST['mode'] == "upi"){
                        // UPI Code Start Here
                             ?>
                    <form class="mt-2" method="post" name="f2" action="upi/regRedirect.php">
                    <input  type="hidden"  name="order_id"  value="<?php echo $order_id; ?>">
                    <input type="hidden" class="form-control" name="email" value="<?php echo $email; ?>">
                    <input type="hidden" class="form-control" name="name" value="<?php echo $name; ?>">
                    <input type="hidden" class="form-control" name="phone" value="<?php echo $phone; ?>">
                    <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                    </form>
                    <script type="text/javascript">
                    document.f2.submit();
                    </script>
                        <?php 
                    }else if($_POST['mode'] == "sam"){
                        // UPI Code Start Here
                             ?>
                    <form class="mt-2" method="post" name="f2" action="payment/regRedirect.php">
                    <input  type="hidden"  name="order_id"  value="<?php echo $order_id; ?>">
                    <input type="hidden" class="form-control" name="email" value="<?php echo $email; ?>">
                    <input type="hidden" class="form-control" name="name" value="<?php echo $name; ?>">
                    <input type="hidden" class="form-control" name="phone" value="<?php echo $phone; ?>">
                    <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                    </form>
                    <script type="text/javascript">
                    document.f2.submit();
                    </script>
                        <?php 
                        // UPI Code END Here 
                    }else if($_POST['mode'] == "qr"){
                        // QR Code Start Here 
                        date_default_timezone_set("Asia/Kolkata");
                        $date = date("d-m-Y");
                        $ins = mysqli_query($ahk_conn,"INSERT INTO `wallet`(`phone`,`amount`,`txn_id`,`email`,`status`,`date`,`PAYMENTMODE`) VALUES ('$phone','$amount','$order_id','$email','pending','$date','REGQR')");
                             ?>
                    <form class="mt-2" method="post" name="f2" action="qr/pay.php">
                        <input type="hidden" name="frompage" value="reg">
                    <input  type="hidden" name="order_id"  value="<?php echo $order_id; ?>">
                    <input type="hidden"  name="phone" value="<?php echo $phone; ?>">
                    <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                    </form>
                    <script type="text/javascript">
                    document.f2.submit();
                    </script>
                        <?php 
                        
                        // QR Code END Here 
                    }
                    
                   
                }
            }else{
                ?>
                <script>
                    $(function(){
                        Swal.fire(
                            'Opps!',
                            'Confirm password Not Match',
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
                        'Opps',
                        'Your Email or Phone Already Exist',
                        'error'
                    )
                })
            </script>
            <?php 
        }
        
    }
}
if(isset($_POST['successmsg']) && $_POST['successmsg'] == "true"){
    ?>
      <script>
                        $(function(){
                            Swal.fire(
                                'Success!',
                                'Your Account Created Successfully!',
                                'success'
                            )
                        })
                    </script>
    <?php
}
if(isset($_POST['failedmsg']) && $_POST['failedmsg'] == "true"){
    ?>
    <script>
        $(function(){
            Swal.fire(
                'Payment Added Failed',
                'if Payment Deduct Then Contact us!',
                'error'
            )
        })
    </script>
    <?php
}
?>




