<?php
  session_start();
  require_once 'dbconnect.php';
  require_once 'header.php';

 


?>

<?php 
 /*   if(isset($_GET['delete'])){

      print_r($_GET['delete']);
      die("fsd");

    
      $del = "DELETE * from products where product_id=".$_GET['id'];

          if(mysqli_query($conn,$del))
          {

              ?>
              <script>alert('successfully Deleted ');</script>
              <?php header("Location: products_information.php"); ?>
              <?php 
            }
            else
            {
              ?>
              <script>alert('This Product can not be deleted because associated with passed orders! ...');</script>
              <?php header("Location: products_information.php"); ?>
              <?php
            } 
          }
*/
 ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Supplier Payment Management System </title>

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

            <div class="right_col" role="main">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Orders Information</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    

                    <table class="table">
                      <thead>
                        <tr>
                          <th>Code</th>
                          <th>Description</th>
                          <th>Price</th>
                          <th>Supplier Name </th>
                         
                          <th></th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $products = array();
                      
                          $ress=mysqli_query($conn,"SELECT products.product_id as p_id, products.code as p_code, products.description as p_desc, products.price as p_p, 
                                                    products.description as p_d, suppliers.supplier_id as s_id, suppliers.name as s_name from products
                                                    INNER JOIN suppliers on suppliers.supplier_id= products.supplier_id ");
                          
                          while ($productRow=mysqli_fetch_array($ress,MYSQLI_ASSOC))
                          {
                              $products[] = $productRow;
                          }
                          foreach ($products as $productRow)
                          {
                        ?>
                        <form method = "get" action="product_update.php">

                        <tr>
                          <td><?php echo $productRow['p_code']; ?></td>
                          <td><?php echo $productRow['p_desc']; ?></td>
                          <td><?php echo $productRow['p_p']; ?></td>
                          <td><?php echo $productRow['s_name']; ?></td>
                          <?php 
                          /*
                        <input type="hidden" name="id" value="<?php echo $productRow['p_id']; ?>"/>
                          <td><input type="submit" class="btn btn-dark"   name="action" value="Delete"/></td>
                           * 
                           */
                          ?>
              
                        </tr>
                        </form>
                          <?php
                          }
                        ?>

                      </tbody>
                    </table>

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
