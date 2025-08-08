<?php
include('../includes/session.php');
include('../includes/config.php');
if(checkAdmin($udata['type']) == false){
    ?>
    <script>
        window.location='index.php';
    </script>
    <?php
    die();
}
include('../template/ahkweb/pricing.php');
if(isset($_POST['aadhaarpdf'])){
    $name_to_aadhaar = mysqli_real_escape_string($ahk_conn,$_POST['name_to_aadhaar']);
    $aadhaarpdf = mysqli_real_escape_string($ahk_conn,$_POST['aadhaarpdf']);
    $dl_pdf = mysqli_real_escape_string($ahk_conn,$_POST['dl_pdf']);
    $rasan_card = mysqli_real_escape_string($ahk_conn,$_POST['rasan_card']);
    $aadhaar_no = mysqli_real_escape_string($ahk_conn,$_POST['aadhaar_no']);
    $pan_pdf = mysqli_real_escape_string($ahk_conn,$_POST['pan_pdf']);
    $aadhaar_pdf = mysqli_real_escape_string($ahk_conn,$_POST['aadhaar_pdf']);
    $pan_no = mysqli_real_escape_string($ahk_conn,$_POST['pan_no']);
    $e_nsdl = mysqli_real_escape_string($ahk_conn,$_POST['e_nsdl']);
    $p_nsdl = mysqli_real_escape_string($ahk_conn,$_POST['p_nsdl']);
    $limitcross_fee = mysqli_real_escape_string($ahk_conn,$_POST['limitcross_fee']);

    $update = mysqli_query($ahk_conn,"UPDATE pricing SET price='$aadhaarpdf' WHERE service_name='aadhaarpdf'");
    $update = mysqli_query($ahk_conn,"UPDATE pricing SET price='$dl_pdf' WHERE service_name='dl_pdf'");
    $update = mysqli_query($ahk_conn,"UPDATE pricing SET price='$rasan_card' WHERE service_name='rasan_card'");
    $update1 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$aadhaar_no' WHERE service_name='aadhaar_no'");
    $update2 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$pan_pdf' WHERE service_name='pan_pdf'");
      $update2 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$aadhaar_pdf' WHERE service_name='aadhaar_pdf'");
    $update3 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$pan_no' WHERE service_name='pan_no'");
    $update4 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$e_nsdl' WHERE service_name='e_nsdl'");
    $update5 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$p_nsdl' WHERE service_name='p_nsdl'");
    $update6 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$name_to_aadhaar' WHERE service_name='name_to_aadhaar'");
    $update7 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$limitcross_fee' WHERE service_name='limitcross_fee'");
    if($update && $update1 && $update2 && $update3  && $update4  && $update5 && $update6 && $update7){
        ?>
        <script>
        $(function(){
            Swal.fire(
                'Price Updated Successfully',
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
                'Price Not Updated',
                '',
                'error'
            )
        })
    </script>
    <?php
    }
}
?>