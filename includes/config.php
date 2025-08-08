<?php
require('database.php');
require('links.php');
// Fetch Website Settings Data
$host = $_SERVER['SERVER_NAME'];
$dir = dirname($_SERVER['SCRIPT_NAME']);
date_default_timezone_set("Asia/Kolkata");
$webres = mysqli_query($ahk_conn,"SELECT * FROM settings WHERE id=1 AND status=1");

//api url and access key here 
$skylineapiurl="indiaservice.co.in";
$skyline_key="ca1f94fca1b61a1826708732bd0a8eee24a6f61c6356377277452a911a1c4ac3";


$webdata = mysqli_fetch_assoc($webres);
// Check If User Is Logged In or Not

function checkSession(){
    if(!$_SESSION['phone']){
        header('Location: ../login.php');
        die();
    }
}


if(isset($_SESSION['phone'])){
    $udata = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM users WHERE phone='".$_SESSION['phone']."'"));

//  Check admin Here 
    function checkadmin($usertype){
        if($usertype == "admin"){
            return true;
        }else{
            return false;
        }
    }
    // 
    // Get API balance
    $api_key = $webdata['nsdl_api_key'];
    function getAPIBalance(){
        global $api_key;
        $url = "https://apizone.in/api/v1/fetch_balance.php?api_key=$api_key";
        // echo $url;
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
         $response;
        $data = json_decode($response,true);
        if($data['status'] == 1){
            return $data['balance'];
        }else{
            return $data['message'];
        }
    }
    // if admin 
    $nutype =  $udata['type'];
    function ifadmin(){
        global $nutype;
        if($nutype == 'admin'){
            return true;
        }else{
            return false;
        }
    }

    
    // get NSDL ekyc  pending data
    $nsdlpendingnum = ahkRows("SELECT * FROM nsdlekyc WHERE status='pending' AND appliedby='".$udata['phone']."'");
    $nsdlsuccessnum = ahkRows("SELECT * FROM nsdlekyc WHERE status='success' AND appliedby='".$udata['phone']."'");
    $nsdlrejectnum = ahkRows("SELECT * FROM nsdlekyc WHERE status='reject' AND appliedby='".$udata['phone']."'");
    // get UTI  pending data
    $utipendingnum = ahkRows("SELECT * FROM utipsa WHERE status='pending' AND user_id='".$udata['phone']."'");
    $utisuccessnum = ahkRows("SELECT * FROM utipsa WHERE status='success' AND user_id='".$udata['phone']."'");
    $utirejectnum = ahkRows("SELECT * FROM utipsa WHERE status='reject' AND user_id='".$udata['phone']."'");
    // get All users List
    $allusersforadmin = ahkRows("SELECT * FROM users");
    $eidtoaadhaar = ahkRows("SELECT * FROM aadhaarpdf");
    // EID to aadhaar for User 
    $eidtoaadhaarfuser = ahkRows("SELECT * FROM aadhaarpdf WHERE appliedby='".$udata['phone']."'");

    // 
    $eidtoaadhaarNoforadmin = ahkRows("SELECT * FROM aadhaar_no ");
    $eidtoaadhaarNoforuser = ahkRows("SELECT * FROM aadhaar_no WHERE appliedby='".$udata['phone']."'");
    // 
    $pan_noforadmin = ahkRows("SELECT * FROM pan_no ");
    $pan_no_foruser = ahkRows("SELECT * FROM pan_no WHERE appliedby='".$udata['phone']."'");
    
      $query_noforadmin = ahkRows("SELECT * FROM contact ");
    $query_foruser = ahkRows("SELECT * FROM contact WHERE email='".$udata['email']."'");

}
// Session END
/*
=====================================================================================
=====================================================================================
=============================== ALL FUNCTIONS HERE ==================================
=====================================================================================
=====================================================================================
*/
// Query Execute
function ahkQuery($sql){
    global $ahk_conn ;
    $res = mysqli_query($ahk_conn,$sql);
    return $res;
}
// Count Row Number
function ahkRows($sql){
    global $ahk_conn ;
    $res = mysqli_num_rows(ahkQuery($sql));
    return $res;
}
// Fetch Row Data 
function fetchRow($sql){
    global $ahk_conn ;
    $res = mysqli_fetch_assoc(ahkQuery($sql));
    return $res;
}
// Get Website data 
function ahkweb($columnName){
    $res = fetchRow("SELECT * FROM settings WHERE id=1");
    echo $res[$columnName];
}
// Get Particular Column Name of table
function getColumn($tableName,$columnName,$Identity){
    $sql = "SELECT * FROM ". $tableName . " WHERE ".  $Identity ;
    if(ahkRows($sql)>0){
        $res = fetchRow($sql);
        echo $res[$columnName];
    }else{
        return "data not Found";
    }
}
// Get Safe Value 
function getSafe($value){
    global $ahk_conn;
    $safe = mysqli_real_escape_string($ahk_conn,$value);
    return $safe;
}
// print Array Function 
function printR($data){
    echo "<pre>";
    print_r($data);
}
function ahkRedirect($url='',$time){
    ?>
    <script>
         setTimeout(() => {
            window.location='<?php echo $url; ?>';
        }, <?php echo $time; ?>);
    </script>
    <?php 
}
function showAlert($fmsg = '',$smsg ='',$type='success'){
    ?>
    <script>
       $(function(){
                Swal.fire(
                '<?php echo $fmsg; ?>', 
                '<?php echo $smsg; ?>', 
                '<?php echo $type; ?>'
            )
        })
    </script>
    <?php 
}
function loginAsadmin(){
    if(isset($_SESSION['adminasuser'])== true && $_SESSION['adminusername'] ){
        $_SESSION['phone'] = $_SESSION['adminusername'];
        unset($_SESSION['adminasuser']);
        unset($_SESSION['adminusername']);
        ahkRedirect('index.php',1200);
    }
}

?>