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
include('../template/ahkweb/name_to_aadhaar_no_admin_list.php');
if(isset($_GET['deleteid']) && $_GET['deleteid']!=NULL){
    $deleteid = base64_decode(mysqli_real_escape_string($ahk_conn,$_GET['deleteid']));
    if(mysqli_query($ahk_conn,"DELETE from name_to_aadhaar WHERE id='$deleteid'")){
        ?>
            <script>
                $(function(){
                    Swal.fire(
                        'Deleted Success',
                        '',
                        'success'
                    );
                });
                setTimeout(() => {
                    window.location='name_to_aadhaar_no_admin_list.php';
                }, 1200);
            </script>
            <?php
    }
}
if(isset($_POST['aadhaar_no']) && !empty($_POST['aadhaar_no']) && $_POST['status']  && $_POST['remark']){
 $aadhaar_no = mysqli_real_escape_string($ahk_conn,$_POST['aadhaar_no']);
 $status = mysqli_real_escape_string($ahk_conn,$_POST['status']);
 $remark = mysqli_real_escape_string($ahk_conn,$_POST['remark']);
 $id = mysqli_real_escape_string($ahk_conn,$_POST['id']);
    if($status == 'refunded'){
        $sl = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM name_to_aadhaar WHERE id='$id' LIMIT 1"));
        $amount = $sl['fee'];
        $updt = mysqli_query($ahk_conn,"UPDATE users SET balance=balance+$amount WHERE phone='".$sl['appliedby']."'");
        $sql = mysqli_query($ahk_conn,"UPDATE name_to_aadhaar SET  aadhaar_no='$aadhaar_no',status='$status', remark='$remark' WHERE id='$id'");
        if($updt && $sql){
            ?>
            <script>
                $(function(){
                    Swal.fire(
                        'Refunded Success',
                        '',
                        'success'
                    );
                });
                setTimeout(() => {
                    window.location='';
                }, 1200);
            </script>
            <?php
        }
    }else if($status == 'success'){
        $sql = mysqli_query($ahk_conn,"UPDATE name_to_aadhaar SET  aadhaar_no='$aadhaar_no',status='$status', remark='$remark' WHERE id='$id'");
        if($sql){
            ?>
            <script>
                $(function(){
                    Swal.fire(
                        'Aadhaar Number Updated Successfully!',
                        '',
                        'success'
                    );
                });
                setTimeout(() => {
                    window.location='';
                }, 1200);
            </script>
            <?php
        }
    }
    
   

}
?>
