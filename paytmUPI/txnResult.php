<?php
error_reporting(0);
include('../includes/config.php');
require_once('lib/AhkWeb_Config.php');
require_once('lib/AhkWebCheckSum.php');

$secret = 'UrAs0MPB77'; // Your Secret Key.
$status = $_POST['status']; // Its Payment Status Only, Not Txn Status.
$message = $_POST['message']; // Txn Message.
$cust_Mobile = $_POST['cust_Mobile']; // Txn Message.
$cust_Email = $_POST['cust_Email']; // Txn Message.
$hash = $_POST['hash']; // Encrypted Hash / Generated Only SUCCESS Status.
$checksum = $_POST['checksum']; // Checksum verifySignature / Generated Only SUCCESS Status.

// Payment Status.
if ($status == "SUCCESS") {
    $paramList = hash_decrypt($hash, $secret);
    $verifySignature = AhkWebCheckSum::verifySignature($paramList, $secret, $checksum);

    // Checksum verify.
    if ($verifySignature) {
        // Assuming $apid and $amt are present in $array after decoding.
        $array = json_decode($paramList, true);
        $orderId = $array['orderId'];
        $amt = $array['txnAmount'];
        $phone = $cust_Mobile; // Use 'cust_Mobile' as the correct key to fetch the phone number.

        // Database updates.
        // Assuming you have established a database connection already.
        $db_host = 'localhost';
        $db_user = 'amanport_all';
        $db_pass = 'amanport_all';
        $db_name = 'amanport_all';

        // Perform the database update queries with prepared statements.
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        // Check if the database connection was successful.
        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Update wallet status to 'success' for the given txn_id.
        $update_wallet_status_query = "UPDATE wallet SET status='success' WHERE txn_id='$orderId'";
        if (!mysqli_query($conn, $update_wallet_status_query)) {
            die("Update wallet status query failed: " . mysqli_error($conn));
        }

        // Update user balance by adding $amt to the existing balance for the given phone number (using prepared statement).
        $update_user_balance_query = "UPDATE users SET balance=balance+? WHERE phone=?";
        $stmt = mysqli_prepare($conn, $update_user_balance_query);
        mysqli_stmt_bind_param($stmt, "is", $amt, $phone);

        if (!mysqli_stmt_execute($stmt)) {
            die("Update user balance query failed: " . mysqli_error($conn));
        }

        // Close the prepared statement.
        mysqli_stmt_close($stmt);

        // Close the database connection.
        mysqli_close($conn);

        // After updating the database, redirect to wallet.php.
        header("Location: ../admin/wallet.php");
        exit();
    } else {
        // Checksum is invalid.
        header("Location: ../admin/wallet.php?error=checksum_invalid");
        exit();
    }
} else {
    // Payment status is not 'SUCCESS'.
    header("Location: ../admin/wallet.php?error=payment_not_success");
    exit();
}
?>
