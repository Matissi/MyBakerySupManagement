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
 $pres=mysqli_query($conn,"SELECT * FROM products;");
 
if(isset($_POST['add_order']))
{ 
   $o_code= mysqli_real_escape_string($conn,$_POST['o_code']);
  $o_date = mysqli_real_escape_string($conn,$_POST['o_date']);
  $o_quantity = mysqli_real_escape_string($conn,$_POST['o_quantity']);
  $o_amount = mysqli_real_escape_string($conn,$_POST['o_amount']);
  $o_paid = mysqli_real_escape_string($conn,$_POST['o_paid']);
   $p_id = mysqli_real_escape_string($conn,$_POST['p_id']);
   $o_delivered = mysqli_real_escape_string($conn,$_POST['o_deliv']);
   var_dump($o_amount);



  $p = "INSERT INTO orders (code,date,quantity,bill,paid,delivered,product_id)VALUES('$o_code','$o_date','$o_quantity','$o_amount','$o_paid','$o_delivered','$p_id')";
 
   if(mysqli_query($conn,$p)){

      ?>
      <script>alert('successfully registered ');</script>
      <?php 
    
  }
    else
    {
      var_dump($p);
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
                              <h2>New Order </h2><br>
                             
                                <div class="form-group">
                                
                                <select class="form-control" placeholder="List Of Product" name="p_id" id="p_id">
                                    <option value="" disabled selected>Select the product</option>
                              <?php
                              while ($productRow=mysqli_fetch_array($pres,MYSQLI_ASSOC))
                          {
                              $products[] = $productRow;
                          }
                          foreach ($products as $productRow)
                          {
                              ?>
                              <option value="<?php echo $productRow['product_id']; ?>">
                                  <?php echo $productRow['code']; ?>
                              </option>
                              <?php
                          }
                              ?>
                                  </select>
                           
                            </div>
                              
                            </div> 
                              <div class="form-group">
                              Order ID or CODE : <input id="o_code" class="form-control"  name="o_code" id="username" type="text" size="20" required ><span id="user-availability-status"></span> 
                            </div>
                               
                            <div class="form-group">
                                Date <input class="form-control"  name="o_date"  type="date" required value="<?php echo date("Y-m-d") ?>"><span id="user-availability-status"></span> 
                            </div>
                              <div class="form-group">
                                Quantity <input class="form-control" size="100"  name="o_quantity"  type="text" required ><span id="user-availability-status"></span> 
                            </div>
                               <div class="form-group">
                                   Bill Amount(NGN) <input class="form-control" size="20" name="o_amount"  type="number" required <span id="user-availability-status"></span> 
                            </div>
                              
                              <div class="form-group">
                                  Order status
                                  <input type="radio" name="o_deliv" value="0" checked> Not  Delivered<br>
                               <input type="radio" name="o_deliv" value="1"> Delivered<br>
                            </div>
                              
                              <div class="form-group">
                                  Payment
                                  <input type="radio" name="o_paid" value="0" checked> Not done<br>
                               <input type="radio" name="o_paid" value="1"> Done<br>    
                            </div>
                            <button type="submit" name="add_order">Submit</button>
                          </fieldset>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            
                

            


   <script>
                            var e = document.getElementById("p_id");
                              var prod_id = e.options[e.selectedIndex].value;

                              var today = new Date();
                              var time = today.getFullYear() + ""+ today.getMonth()+""+ today.getDate();
                              document.getElementById("o_code").value = "O" + "_"+ time +""+ Math.floor(Math.random() * 100);;
                         </script>
          
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

