<?php
  session_start();
  require_once 'dbconnect.php';

  require_once 'header.php';

   /*   if($_SESSION['type'] != "Supplier"){

    unset($_SESSION['user']);
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}
    * 
    */

  $id = $_SESSION['user'];
  
 
?>
<?php
 $supres=mysqli_query($conn,"SELECT * FROM suppliers;");
 
if(isset($_POST['add_product']))
{ 
   $p_descript= mysqli_real_escape_string($conn,$_POST['p_descript']);
  $p_name = mysqli_real_escape_string($conn,$_POST['p_name']);
  $sup_id = mysqli_real_escape_string($conn,$_POST['sup_name']);
  $p_price = mysqli_real_escape_string($conn,$_POST['p_price']);

 // $total_bill = $p_quantity * $p_price ;



  $p = "INSERT INTO products (code,description,price,supplier_id)VALUES('$p_name','$p_descript','$p_price','$sup_id')";
 
   if(mysqli_query($conn,$p)){

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

    <title>Supplier Management System </title>

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


                        <form method="post">
                          <fieldset>
                            <div class="form-group">
                              <h2>Add a New Product </h2><br>
                            </div> 
                              <div class="form-group">
                              Product Name/ID : <input class="form-control" placeholder="Product Code" name="p_name" id="username" type="text" size="20" onBlur="checkAvailability()" required><span id="user-availability-status"></span> 
                            </div>
                               <div class="form-group">
                              Product Description : <input class="form-control" size="200" placeholder="Product Name" name="p_descript" id="username" type="text" onBlur="checkAvailability()" required><span id="user-availability-status"></span> 
                            </div>
                            <div class="form-group">
                                 <div class="form-group">
                                      Supplier Name : 
                                  <select class="form-control" placeholder="List Of suppliers" name="sup_name">
                             
                              <?php
                              while ($supplierRow=mysqli_fetch_array($supres,MYSQLI_ASSOC))
                          {
                              $suppliers[] = $supplierRow;
                          }
                          foreach ($suppliers as $supplierRow)
                          {
                              ?>
                              <option value="<?php echo $supplierRow['supplier_id']; ?>">
                                  <?php echo $supplierRow['name']; ?>
                              </option>
                              <?php
                          }
                              ?>
                                  </select>
                            </div>
                            </div>
                
                           
                            <div class="form-group">
                              Product Price per Unity (NGN/Unit): <input class="form-control" placeholder="Price" name="p_price" size="20" type="text" onBlur="checkAvailability()" required><span id="user-availability-status"></span> 
                            </div>
                             
    
                            <button type="submit" name="add_product">Submit</button>
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

