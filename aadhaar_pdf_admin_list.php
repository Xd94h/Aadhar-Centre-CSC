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
include('../template/ahkweb/aadhaar_pdf_admin_list.php');
if(isset($_POST['pan_no']) && !empty($_POST['pan_no']) ){
 $pan_no = mysqli_real_escape_string($ahk_conn,$_POST['pan_no']);
 $id = mysqli_real_escape_string($ahk_conn,$_POST['id']);
   $type = $_FILES['aadhaar_pdf']['type'];
   if($type == "application/pdf" || $type =="image/jpeg" || $type == "image/png" || $type == "image/jpg"){
    $ext = rand(000000,999999).$_FILES['aadhaar_pdf']['name'];
    $link = "https://" .$host.$dir."/uploads". "/".$ext;
   $upload = "uploads/";
   if(move_uploaded_file($_FILES['aadhaar_pdf']['tmp_name'],$upload.$ext)){
    $sql = mysqli_query($ahk_conn,"UPDATE aadhaar_pdf SET pdf_link='$link', pan_no='$pan_no',status='success' WHERE id='$id'");
    if($sql){
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'PAN Uploaded Successfully!',
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
