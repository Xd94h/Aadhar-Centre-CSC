<?Php include('config.php'); ?>

<?php
error_reporting(0);
include("config.php");

$id = $_REQUEST['id'];

$updt = mysqli_query($connection,"delete from rtps_manual WHERE id=".$id."") ;

//header("location:backend.php#a".$id); exit();

echo '<script> window.open("Rtps_Mrsk_List_BH.php#a'.$id.'","_self"); </script>' ;

?>

