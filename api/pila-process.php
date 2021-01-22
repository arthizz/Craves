<?php
	require_once '../connection/connection.php';

	$date = $_GET['date'];
	$id = $_GET['id'];
	$status = 1;

	$sth = $conn->prepare("SELECT * FROM user_tbl WHERE cID = :id");
	$sth->bindparam(":id", $id);
	$sth->execute();

	$row = $sth->fetch(PDO::FETCH_ASSOC);
	$name = $row['cFname'].' '.$row['cLname'];


	$stmt = $conn->prepare("UPDATE cashier_tbl SET cStatus = :stat, cCashier = :name WHERE cDate = :dat");
	$stmt->bindparam(":dat", $date);
	$stmt->bindparam(":stat", $status);
	$stmt->bindparam(":name", $name);
	$stmt->execute();

	echo "<script>window.open('../kiosk/cashier.php','_self')</script>";
?>