<?php
error_reporting(0);
include("../includes/config.php");

$id = $_REQUEST['id'];

$updt = mysqli_query($ahk_conn,"delete from voterauto2 WHERE voterautoid=".$id."") ;

//header("location:backend.php#a".$id); exit();

echo '<script> window.open("voteroriginallist.php#a'.$id.'","_self"); </script>' ;

?>

