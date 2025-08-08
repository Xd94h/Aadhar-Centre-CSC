<?php 
// Database Details  
$hostname = "localhost";
$username = "rsrahedt_otp";
$password = "rsrahedt_otp";
$database = "rsrahedt_otp";

$ahk_conn = mysqli_connect($hostname, $username, $password, $database);

if (!$ahk_conn) {
    include('links.php');
    ?>
    <script>
    $(function() {
        Swal.fire(
            'Oops',
            'Database Connection Failed',
            'error'
        )
    });
    </script>
    <?php
}
?>
