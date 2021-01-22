<?php
	require_once '../connection/connection.php';

		$id = $_GET['id'];
		$status = 0;
		$date = date("y-m-d h:i:sa");

			$stmt = $conn->prepare("INSERT INTO checkout_tbl(user_id, cFname, cLname, cProduct, cPrice, cImg) SELECT user_id, cFname, cLname, cProduct, cPrice, cProduct_img FROM cart_tbl");
			$stmt->execute();

			$stmt = $conn->prepare("UPDATE checkout_tbl SET cStatus = :status, cDate = :dat WHERE user_id = :id");
			$stmt->bindparam(":dat", $date);
			$stmt->bindparam(":id", $id);
			$stmt->bindparam(":status", $status);
			$stmt->execute();

			$stmt = $conn->prepare("DELETE FROM cart_tbl WHERE user_id = :id");
			$stmt->bindparam(":id", $id);
			$stmt->execute();
			
	echo "<script>window.open('../checkout.php','_self')</script>";

	
?>