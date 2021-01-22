<?php
	require_once '../connection/connection.php';

	$date = $_GET['date'];
	$status = 2;

	$stmt = $conn->prepare("UPDATE cashier_tbl SET cStatus = :stat WHERE cDate = :dat");
	$stmt->bindparam(":dat", $date);
	$stmt->bindparam(":stat", $status);
	$stmt->execute();

	echo "<script>window.open('../kiosk/pila.php','_self')</script>"


?>