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
  
 

  if ($_GET['action'] && $_GET['id']) {
  if ($_GET['action'] == 'Edit') {

  $up=mysqli_query($conn,"SELECT * FROM users WHERE u_id=".$_GET['id']) ;
  $updateRow=mysqli_fetch_array($up,MYSQLI_ASSOC);
  }
}

      if ($_GET['action'] && $_GET['id']) {
         if ($_GET['action'] == 'Delete') {


              $del = "DELETE  FROM users WHERE u_id=".$_GET['id'];
              // print_r($del);
              // die("dfsf");


                      if(mysqli_query($conn,$del))
                      {

                          ?>
                          <script>alert('successfully Deleted ');</script>
                          <?php 
                        }
                        else
                        {
                          ?>
                          <script>alert('error while Deleting! ...');</script>
                          <?php //header("Location: supplier_information.php"); ?>
                          <?php
                        }
                      ?> 
                        <?php header("Location: supplier_information.php"); 
                      }
            }

?>


<?php

if(isset($_POST['update']))
{ 


  $u_email = mysqli_real_escape_string($conn,$_POST['u_email']);
  $u_pass  = mysqli_real_escape_string($conn,$_POST['u_pass']);
  $f_name = mysqli_real_escape_string($conn,$_POST['f_name']);
  $l_name = mysqli_real_escape_string($conn,$_POST['l_name']);
  $u_mobile = mysqli_real_escape_string($conn,$_POST['u_mobile']);
  $u_gender = mysqli_real_escape_string($conn,$_POST['u_gender']);
  $u_bday = $_POST['u_bday'];
  $u_address = mysqli_real_escape_string($conn,$_POST['u_address']);
  $u_type = mysqli_real_escape_string($conn,$_POST['u_type']);
  $u_role = mysqli_real_escape_string($conn,$_POST['u_role']);

  $sql= "UPDATE users SET u_email='$u_email',u_pass='$u_pass',u_first='$f_name',u_last='$l_name',u_mobile='$u_mobile',u_gender='$u_gender',u_dob='$u_bday',u_address='$u_address',u_type='$u_type',u_role='$u_role' where u_id=".$_GET['id'];

  if(mysqli_query($conn,$sql))
  {

      ?>
      <script>alert('successfully UPDATED ');</script>
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Supplier Mangement System </title>

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
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Supplier</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo $userRow['u_path']   ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $userRow['u_first']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                  </li>

                  <li><a href="add_Supplier.php"><i class="fa fa-edit"></i> Add Supplier  <span class="fa fa-chevron-down"></span></a>
                  </li>

                  <li><a href="Supplier_information.php"><i class="fa fa-desktop"></i> Supplier Details <span class="fa fa-chevron-down"></span></a>
                  </li>
                  
                  
              </div>
            </div>

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $userRow['u_path']   ?>" alt=""><?php echo $userRow['u_first']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                   
                    <li><a href="logout.php?logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content --> 
        
          <!-- top tiles -->
          

            
            
          <!-- /top tiles -->

                      <div class="right_col" role="main" >

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">


                        <form method="post">
                          <fieldset>
                            <div class="form-group">
                              <h2>Update Supplier or Admin </h2><br>
                            </div> 
                            <div class="form-group">
                              Email : <input class="form-control" placeholder="E-mail" name="u_email" value="<?php echo $updateRow["u_email"]; ?>" type="email" onBlur="checkAvailability()" required><span id="user-availability-status"></span> 
                            </div>
                            <div class="form-group">
                              Password : <input class="form-control" placeholder="Password" name="u_pass" value="<?php echo $updateRow["u_pass"]; ?>" type="password" required>
                            </div>
                            <div class="form-group">
                              First Name : <input class="form-control" placeholder="First Name" name="f_name" value="<?php echo $updateRow["u_first"]; ?>" type="text"  required>
                            </div>
                            <div class="form-group">
                              Last Name : <input class="form-control" placeholder="Last Name" name="l_name" value="<?php echo $updateRow["u_last"]; ?>" type="text" required>
                            </div>
                            <div class="form-group">
                              Mobile : <input class="form-control" placeholder="Mobile" name="u_mobile" type="number" value="<?php echo $updateRow["u_mobile"]; ?>" required>
                            </div>
                            <div class="form-group">
                              Gender : <input type="radio" name="u_gender" value="Male"<?php if ($updateRow['u_gender'] == 'Male') echo 'checked="checked"'; ?>  > Male
                                   <input type="radio" name="u_gender" value="Female" <?php if ($updateRow['u_gender'] == 'Female') echo 'checked="checked"'; ?> >Female
                                    
                            </div>
                            <div class="form-group">
                              Date of Birth:<input type="date" value="<?php echo $updateRow["u_dob"]; ?>" name="u_bday">
                            </div>
                            <div class="form-group">
                              Address: <textarea rows="3" cols="10" class="form-control" value="" name="u_address"><?php echo $updateRow["u_address"]; ?></textarea>
                            </div>
                            <div class="form-group">
                              Choose Picture : <input type="file" name="myimage" value="fdsfsf" /><img src="<?php echo $updateRow['u_path']; ?>" width="100" height="100" />


                            </div>
                            
                            <div class="form-group">
                              User Type: 
                                     <input type="radio" name="u_type" value="Admin" value="Admin" <?php if ($updateRow['u_type'] == 'Admin') echo 'checked="checked"'; ?>> Admin
                                     <input type="radio" name="u_type" value="Supplier" <?php if ($updateRow['u_type'] == 'Supplier') echo 'checked="checked"'; ?> > Supplier                 
                            </div>
                            <div class="form-group">
                              User Role: 
                                     <input type="radio" name="u_role" value="Active" <?php if ($updateRow['u_role'] == 'Active') echo 'checked="checked"'; ?>> Active
                                     <input type="radio" name="u_role" value="Inactive" <?php if ($updateRow['u_role'] == 'Inactive') echo 'checked="checked"'; ?>> Inactive                 
                            </div>
                            <button type="submit" name="update">Submit</button>
                          </fieldset>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              <!-- end of table -->
               


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
<?php //mysqli_close($conn); ?>
