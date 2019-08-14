<?php
  session_start();

  require_once 'dbconnect.php';

  require_once 'header.php';

    if($_SESSION['type'] != "Admin"){

    unset($_SESSION['user']);
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}


  $ut=mysqli_query($conn,"SELECT * FROM users ;");
  $ucount=mysqli_num_rows($ut);


  $vt=mysqli_query($conn,"SELECT * FROM users WHERE profile = 'Admin';");
  $admincount=mysqli_num_rows($vt);
  
  $uorders=mysqli_query($conn,"SELECT * FROM orders WHERE delivered =1 AND paid=0;");
  $unpaidcount=mysqli_num_rows($uorders);

 /* $st=mysqli_query($conn,"SELECT * FROM users WHERE tittle = 'Supplier';");
  $scount=mysqli_num_rows($st);
  * 
  */

  $ct=mysqli_query($conn,"SELECT * FROM suppliers ;");
  $supcount=mysqli_num_rows($ct);

  
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Supplier Disbursement  Management System </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
    <link href="../build/css/sami.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php          include 'sidebar.php'; ?>

        <!-- page content --> 
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count" align = "center">
            <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total of Admin</span>
              <div class="count"><?php echo $admincount; ?></div>
            </div>

             
         <!-- top tiles -->
          <div class="row tile_count" align = "center">
            <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total of unpaid orders</span>
              <div class="count"><?php echo $unpaidcount; ?></div>
            </div>

            <!-- top tiles -->
          <div class="row tile_count" align = "center">
            <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i>Total of Suppliers</span>
              <div class="count"><?php echo $supcount; ?></div>
            </div>
              
           

            
            
          

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>

<?php mysqli_close($conn); ?>
