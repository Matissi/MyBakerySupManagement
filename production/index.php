<?php 
session_start();
require_once 'dbconnect.php';

//it will never let you open index(login) page if session is set
if((isset($_SESSION['user'])!="")&&(isset($_SESSION['type'])=="Admin")){
    header("Location: dashboard_admin.php");
    exit;
}
 


$error= false;
if(isset($_POST['btn-login'])){
    $email= test_input($_POST['email']);
    $pass = test_input($_POST['pass']);

//prevent sql injection
    if(empty($email)){
    $error = true;
    $emailError = "Please enter your email address.";
  }
    else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
    $error = true;
    $emailError = "Please enter valid email address.";
  }

    if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   //$password = hash('sha256', $pass); // password hashing using SHA256
   $password =  $pass;
  
   $res=mysqli_query($conn,"SELECT user_ID, email, password, name, profile FROM users WHERE email='$email'");
   $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
   

   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['password']==$password && $row['profile'] == 'Admin') {
    $_SESSION['user'] =$row['user_ID'];
    $_SESSION['type'] =$row['profile'];
    $_SESSION['name'] =$row['name'];

    header("Location: dashboard_admin.php");
   } 
  /* elseif( $count == 1 && $row['password']==$password && $row['tittle'] == 'Supplier'){
    $_SESSION['user'] =$row['userID'];
    $_SESSION['type'] =$row['tittle'];
    header("Location: dashboard_supplier.php");

   }
   * 
   */
   else {
    $errMSG = "Incorrect Credentials, Try again...";
   }
    
  }


}

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}

?>




<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<profile>Login & Registration System</profile>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">Sign In.</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>


            <?php
            if ( isset($errMSG) ) {
                
                ?>
                <div class="form-group">
                <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
                </div>
                <?php
            }
            ?>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                </div>
                <span class="text-danger"> <?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
          </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php  mysqli_close($conn); ?>
