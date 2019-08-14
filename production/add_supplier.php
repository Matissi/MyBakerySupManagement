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
  
?>


<?php
if(isset($_POST['update'])){



  $s_email = mysqli_real_escape_string($conn,$_POST['s_email']);
  $s_fullname = mysqli_real_escape_string($conn,$_POST['s_fullname']);
  $s_code = mysqli_real_escape_string($conn,$_POST['s_code']);
  $s_pnum = mysqli_real_escape_string($conn,$_POST['s_pnum']);
  $s_address = mysqli_real_escape_string($conn,$_POST['s_address']);


  $sql= "INSERT INTO suppliers (email,name,id,phoneNumber,address)VALUES('$s_email','$s_fullname','$s_code','$s_pnum','$s_address')";

  //$sql= "INSERT INTO users (s_email,u_pass,s_fullname,s_code,s_pnum,u_gender,u_dob,s_address,u_type,u_role)VALUES('$s_email','$u_pass','$f_name','$l_name','$s_pnum','$u_gender','$u_bday','$s_address','$u_type','$u_role')";
 //var_dump($sql);
  
  if(mysqli_query($conn,$sql))
  {

      ?>
      <script>alert('successfully registered ');</script>
      <?php 
    }
    else
    {
      ?>
      <script>alert('error while Adding! Check email/Server...');</script>
      <?php
    } 
   
   
  }
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv=" " content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Disbursement Management System </title>

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
    <!-- Custom Theme Style -->
    <link href="../build/css/sami.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
     <?php          include 'sidebar.php'; ?>

          <div class="right_col" role="main" >

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">


                        <form method="post" enctype="multipart/form-data">
                          <fieldset>
                            <div class="form-group">
                              <h2>Add New Supplier </h2><br>
                            </div> 
                            <div class="form-group">
                                Email : <input class="form-control" placeholder="E-mail" name="s_email" id="username" type="email" onBlur="checkAvailability()" required><span id="user-availability-status"></span> 
                            </div>
                             <div class="form-group">
                              Supplier Code : <input class="form-control" placeholder="Code (unique)" size="20" name="s_code" id="username" type="text"  required>
                            </div>
                            <div class="form-group">
                               Full Name : <input class="form-control" size="180" placeholder="Supplier's Name" name="s_fullname" type="text"  required>
                            </div>
                            
                            <div class="form-group">
                                Phone number : <input class="form-control" placeholder="Mobile" name="s_pnum" type="tel"  required>
                            </div>
                          
                        
                            <div class="form-group">
                              Address: <textarea rows="3" cols="10" class="form-control"  size="200" name="s_address"></textarea>
                            </div>
                            
                           
                            <button type="submit" name="update">Submit</button>
                          </fieldset>
                        </form>
                      </div>
                    </div>
                  </div>
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
