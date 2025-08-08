<?php
include('../includes/config.php');
if (isset($_GET['id']) && $_GET['id'] != NULL) {
    $id = base64_decode($_GET['id']);
    $res = mysqli_query($ahk_conn, "SELECT * FROM `pan_no` WHERE id='$id'");
    $data = mysqli_fetch_assoc($res);
}


if (isset($_POST['ahkweb'])  && $_POST['ahkweb'] == "ahkwebsolutions") {
    
    
    $status = mysqli_real_escape_string($ahk_conn,$_POST['status']);
    $panno = mysqli_real_escape_string($ahk_conn,$_POST['pan_no']);
   
    $ires = mysqli_query($ahk_conn,"UPDATE `pan_no` SET  status='$status', `pan_no`='$panno' WHERE id='$id' ");    

    if($ires){
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Success',
                    'User Updated Successfully',
                    'success'
                )
            });
             window.setTimeout(function() {
  window.location.href = "../finddata.php";
  }, 1500);
        </script>
        <?php
    }else{
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Opps',
                    'Internal Server Error Please try Agin Later',
                    'error'
                )
            });
        </script>
        <?php
    }
}
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $ahkweb['name']; ?> | Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Datatable Dependency start -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>


</head>
<body id="page-top">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">SUBMIT PAN DATA</h1>
                </div><!-- /.col -->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="card card-default">


                        <!-- form start -->
                        <form method="post" action="" autocomplete="off" enctype="multipart/form-data">
                            
                            <input type="hidden" name="ahkweb" value="ahkwebsolutions">
                            <div class="card-body row">

                            <div class="form-group col-md-2">
                                    <label for="id">id</label>
                                    <input type="text" class="form-control" disabled="disabled" id="id" name="id" placeholder="id" value="<?php echo $data['id'] ?>">
                                </div>

                   
                            <div class="form-group col-md-6">
                                    <label for="name">NAME</label>
                                    <input type="text" class="form-control" disabled="disabled" id="name" name="name" placeholder="name" value="<?php echo $data['name'] ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="appliedby">APPLIED BY<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" disabled="disabled" id="appliedby" name="dob" placeholder="appliedby" value="<?php echo $data['appliedby'] ?>"required="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="aadhaar">Aadhaar No. <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" disabled="disabled" id="aadhaar_no" name="aadhaar" placeholder="<?php echo $data['aadhaar_no'] ?>" value="<?php echo $data['aadhaar_no'] ?>" required="">
                                </div>
                               
                               

                                <div class="form-group col-md-6">
                                    <label for="pan_no">Pan No<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="pan_no" name="pan_no" placeholder="pan_no" value="<?php echo $data['pan_no'] ?>"required="">
                                </div>

                                

                                <div class="form-group col-md-6">
                                    <label for="death_address">Status<span class="text-danger">*</span></label>
                                    <select class="form-control" name="status" id="">
                                        <option  value="">Select </option>
                                        <option <?php if($data['status'] == 'success'){ echo 'selected';} ?> value="success">success</option>
                                        <option <?php if($data['status'] == 'reject'){ echo 'selected';} ?> value="reject">REJECTED</option>
                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-left pt-3 pb-3 mt-2">
                                <button type="submit" class="btn btn-success btn-lg">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


</div>
<!-- /.content-wrapper -->

<!-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer> -->

<!-- Control Sidebar -->
<!-- <aside class="control-sidebar control-sidebar-dark"> -->
<!-- Control sidebar content goes here -->
<!-- </aside> -->
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>

<!-- SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function alertMessage(type, message) {
        if (type == 'error') {
            type = 'danger';
        }

        return "<div class='alert alert-" + type + " alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> " + message + " </div>";
    }
</script>



</body>

</html>