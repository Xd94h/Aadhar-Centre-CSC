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
include('../template/ahkweb/new_pan_admin_list.php');
if(isset($_POST['aadhaar_no']) && !empty($_POST['aadhaar_no']) ){
 $aadhaar_no = mysqli_real_escape_string($ahk_conn,$_POST['aadhaar_no']);
 $id = mysqli_real_escape_string($ahk_conn,$_POST['id']);
   $type = $_FILES['aadhaar_pdf']['type'];
   if($type == "application/pdf" || $type =="image/jpeg" || $type == "image/png" || $type == "image/jpg"){
    $ext = rand(000000,999999).$_FILES['aadhaar_pdf']['name'];
    $link = "https://" .$host.$dir."/uploads". "/".$ext;
   $upload = "uploads/";
   if(move_uploaded_file($_FILES['aadhaar_pdf']['tmp_name'],$upload.$ext)){
    $sql = mysqli_query($ahk_conn,"UPDATE pan_card_applications SET pdf_link='$link', aadhaar_no='$aadhaar_no',status='success' WHERE id='$id'");
    if($sql){
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Aadhaar Uploaded Successfully!',
                    '',
                    'success'
                );
            });
        </script>
        <?php
    }
   }else{
    ?>
        <script>
            $(function(){
                Swal.fire(
                    'Error While Uploading Files!',
                    '',
                    'error'
                );
            });
        </script>
        <?php
   }
}else{
    ?>
        <script>
            $(function(){
                Swal.fire(
                    'Wrong File Type!',
                    'PDF,JPEG,PNG Allowed only',
                    'error'
                );
            });
        </script>
        <?php
   }
}
?>
