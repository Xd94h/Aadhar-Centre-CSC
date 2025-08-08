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
include('../template/ahkweb/no_uid_for_corresponding_admin_list.php');
if(isset($_POST['aadhaar_no']) && !empty($_POST['aadhaar_no']) ){
 $aadhaar_no = mysqli_real_escape_string($ahk_conn,$_POST['aadhaar_no']);
 $id = mysqli_real_escape_string($ahk_conn,$_POST['id']);
   
    $sql = mysqli_query($ahk_conn,"UPDATE aadhaar_no SET  aadhaar_no='$aadhaar_no',status='success' WHERE id='$id'");
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
?>
