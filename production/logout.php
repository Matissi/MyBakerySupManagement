<?php


	session_start();
        /*
	if (!isset($_SESSION['user'])){
		header("Location: index.php");
	}
	elseif(isset($_SESSION['user']) != ""){
		header("Location: dashboard_admin.php");
	}
 * 
 */
		unset($_SESSION['user']);
		session_unset();
		session_destroy();
		header("Location: index.php");
		exit;
	