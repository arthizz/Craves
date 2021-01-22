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
		}else{
			session_start();
			$_SESSION['user']= $ROW['cID'];
			


			$stmt = $conn->prepare("SELECT * FROM cart_tbl");
			$stmt->execute();

			$count = $stmt->rowCount();

			if($count > 0){
				$stmt2 = $conn->prepare("SELECT * FROM user_tbl WHERE cID = :id");
				$stmt2->bindparam(":id", $_SESSION['user']);
				$stmt2->execute();

				$row1 = $stmt2->fetch(PDO::FETCH_ASSOC);



				$stmt1 = $conn->prepare("UPDATE cart_tbl SET user_id = :id, cFname = :fname, cLname = :lname");
				$stmt1->bindparam(":id", $_SESSION['user']);
				$stmt1->bindparam(":fname", $row1['cFname']);
				$stmt1->bindparam(":lname", $row1['cLname']);
				$stmt1->execute();
				echo "<script>alert('SUCCESS')</script>";
				echo "<script>window.open('../checkout.php','_self')</script>";
			}else{

				echo "<script>alert('SUCCESS')</script>";
				echo "<script>window.open('../index.php','_self')</script>";
				
			}
			


		}
	}else {
		echo "<script>alert('Username or Password Invalid')</script>";
		echo "<script>window.open('../index.php','_self')</script>";
	}

?>