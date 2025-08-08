<?php 
// Database  Details 
$hostname = "localhost";
$username = "rsrahedt_otp";
$password = "rsrahedt_otp";
$database = "rsrahedt_otp";

// Establish connection
$ahk_conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$ahk_conn) {
    // Include links.php for necessary dependencies (e.g., jQuery and Swal)
    include('links.php');
    ?>
    <script>
    $(document).ready(function() {
        Swal.fire(
            'Oops',
            'Database Connection Failed',
            'error'
        );
    });
    </script>
    <?php
}
?>
