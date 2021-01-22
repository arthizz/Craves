<?php
	require_once '../connection/connection.php';

	$username = $_REQUEST['txtusername'];
	$password = $_REQUEST['txtpassword'];

	$STH = $conn->prepare("SELECT * FROM account_tbl WHERE cUsername=:username and cPassword=:password");
	$STH->bindparam(":username",$username);
	$STH->bindparam(":password",$password);
	$STH->execute();
	$ROW = $STH->fetch(PDO::FETCH_ASSOC);
	$CTR = $STH->rowCount();

	if($CTR<>0){
		if ($ROW['cLevel'] == 'Admin') {
			session_start();
			$_SESSION['user']= $ROW['cID'];
			echo "<script>alert('SUCCESS')</script>";
			echo "<script>window.open('../admin/index.php','_self')</script>";
		}else if($ROW['cLevel'] == 'waiter'){
			session_start();
			$_SESSION['user']= $ROW['cID'];
			echo "<script>alert('SUCCESS')</script>";
			echo "<script>window.open('../kiosk/products-kiosk.php','_self')</script>";
		}
		else if($ROW['cLevel'] == 'cashier'){
			session_start();
			$_SESSION['user']= $ROW['cID'];
			echo "<script>alert('SUCCESS')</script>";
			echo "<script>window.open('../kiosk/cashier.php','_self')</script>";
		}
		else if($ROW['cLevel'] == 'customer'){
			session_start();
			$_SESSION['user']= $ROW['cID'];
			echo "<script>alert('SUCCESS')</script>";
			echo "<script>window.open('../index.php','_self')</script>";
		}
	}else {
		echo "<script>alert('Username or Password Invalid')</script>";
		echo "<script>window.open('../kiosk/index.php','_self')</script>";
	}

?>