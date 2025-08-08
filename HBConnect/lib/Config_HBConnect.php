<?php
error_reporting(0);
include '../../includes/database.php';
$server=$_SERVER['SERVER_NAME'];
$upiuid= "paytmqr281005050101xad2licz551u@paytm";
$secret= "UrAs0MPB77";
$token = "393509-c022b5-e2b65c-0144ac-e08edc";
$orderId = $_POST['order_id'];
$txnAmount = $_POST['amount'];
$txnNote =   $_POST['email'];
$cust_Mobile = "9876543210";
$cust_Email =  $_POST['email'];
$callback_url = "https://$server/HBConnect/pgResponse.php";
$RECHPAY_ENVIRONMENT = 'PROD'; 
$RECHPAY_TXN_URL='https://tooi.site/order/process';
$RECHPAY_STATUS_URL='https://tooi.site/order/status';
if($RECHPAY_ENVIRONMENT == 'PROD') {
$RECHPAY_TXN_URL='https://tooi.site/order/paytm';
$RECHPAY_STATUS_URL='https://tooi.site/order/status';
}
?>