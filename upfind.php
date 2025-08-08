<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/upfind.php');

if (
    isset($_POST['upfind']) && !empty($_POST['state']) && !empty($_POST['ret_wp_no']) && !empty($_POST['upfind'])
) {
    $upfind = mysqli_real_escape_string($ahk_conn, $_POST['upfind']);
    $state = mysqli_real_escape_string($ahk_conn,$_POST['state']);
    $ret_wp_no = mysqli_real_escape_string($ahk_conn,$_POST['ret_wp_no']);
    
    // Additional fields for wallet balance check and fee deduction
    $application_no = "KAFILA" . rand(00000000, 99999999);
    $appliedby = $udata['phone'];
    $date = date("jS \of F Y h:i:s A");
    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn, "SELECT * FROM pricing WHERE service_name='upbpay' "));

    if ($udata['balance'] >= $price['price']) {
        $fee = $price['price'];
        $nbal = $udata['balance'] - $price['price'];
        $debit = mysqli_query($ahk_conn, "UPDATE users SET balance=balance-$fee WHERE phone='$appliedby'");
        $updatehistory = mysqli_query($ahk_conn, "INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$appliedby','$fee','$nbal','LABOUR CARD PRINT','1','Debit')");

        if ($debit && $updatehistory) {
            // Database insertion
            $submit = mysqli_query($ahk_conn, "INSERT INTO `upfind` (`appliedby`, `application_no`, `state`, `ret_wp_no`, `upfind`, `status`, `fee`, `date`) 
            VALUES ('$appliedby', '$application_no', '$upfind', '$state', '$ret_wp_no', 'pending', '$fee', '$date')");

            if ($submit) {
                ?>
                <script>
                    $(function(){
                        Swal.fire(
                            'Application Submitted Successfully',
                            '',
                            'success'
                        )
                    })
                    setTimeout(() => {
                        window.location = '';
                    }, 1200);
                </script>
                <?php
            } else {
                ?>
                <script>
                    $(function(){
                        Swal.fire(
                            'Oops',
                            'Try Again',
                            'error'
                        )
                    })
                    setTimeout(() => {
                        window.location = '';
                    }, 1200);
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                $(function(){
                    Swal.fire(
                        'Oops',
                        'Try Again',
                        'error'
                    )
                })
                setTimeout(() => {
                    window.location = '';
                }, 1200);
            </script>
            <?php
        }
    } else {
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
                window.location = 'wallet.php';
            }, 1200);
        </script>
        <?php
    }
}
?>
