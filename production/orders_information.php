<?php
  session_start();
  require_once 'dbconnect.php';
  require_once 'header.php';

 


?>

<?php 
 $del = "DELETE * from orders where order_id=".$_POST['id'];
      

    if(isset($_POST['id'])){

          if(mysqli_query($conn,$del))
          {

              ?>
              <script>alert('successfully Deleted ');</script>
              <?php header("Location: orders_information.php"); ?>
              <?php 
            }
            else
            {
              ?>
              <script>alert('error while Deleting! ...');</script>
              <?php header("Location: orders_information.php"); ?>
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
                    

                <form method="post">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Code</th>
                          <th>Product Code</th>
                          <th>Supplier name</th>
                          <th>Quantity</th>
                          <th>Date</th>
                          <th>Total Bill</th>
                          <th>Status</th>
                          <th>Delivery</th>
                          <th>Action</th>
                          <th></th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $orders = array();
                         /* $ress=mysqli_query($conn,"SELECT orders.order_id, orders.code, orders.date, orders.paid, orders.delivered, orders.bill, products.name, suppliers.name FROM orders
                           INNER JOIN products ON products.product_id=orders.product_id 
                           INNER JOIN suppliers on suppliers.supplier_id= product.supplier_id");
                          * 
                          */
                               
                          $ress=mysqli_query($conn,"SELECT orders.order_id as o_id, orders.code as o_code, orders.date as date, orders.paid as paid, orders.delivered as delivered,
                                                    orders.bill as bill, orders.quantity as quantity, products.code as p_code,suppliers.supplier_id as s_id, suppliers.name as s_name FROM orders
                                                    INNER JOIN products ON products.product_id=orders.product_id 
                                                    INNER JOIN suppliers on suppliers.supplier_id= products.supplier_id ");
                          
                          while ($orderRow=mysqli_fetch_array($ress,MYSQLI_ASSOC))
                          {
                              $orders[] = $orderRow;
                          }
                          foreach ($orders as $orderRow)
                          {
                        ?>
                        <tr>
                          <td><?php echo $orderRow['o_id']; ?></th>
                          <td><?php echo $orderRow['o_code']; ?></td>
                          <td><?php echo $orderRow['p_code']; ?></td>
                          <td><?php echo $orderRow['s_name']; ?></td>
                          <td><?php echo $orderRow['quantity']; ?></td>
                          <td><?php echo $orderRow['date']; ?></td>
                          <td><?php echo $orderRow['bill']; ?></td>
                          <td><?php 
                          if($orderRow['paid']) echo 'PAID';
                          else                              echo 'UNPAID';
                            ?></td>
                          <td><?php if($orderRow['delivered']) echo 'DONE';

                          else                              echo 'NOT DONE'; ?></td>
                    
                          <input type="hidden" name="id" value="<?php echo $orderRow['o_id']; ?>">
                          <td> <button type="submit" class="btn btn-dark"   name="delete" > Delete </button></td>
                       
                          <?php 
                          if(!$orderRow['paid']) {
                          echo '<td><a href="initialize.php?sup_id='. $orderRow['s_id'].'&order_id='.$orderRow['o_id'].'"><i class="button"></i> PAY NOW</a></td>';
                          }
                            ?>
              
                        </tr>
                          <?php
                          }
                        ?>
     </form>
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
