<?php
	require_once '../connection/connection.php';

	$id = $_GET['id'];

	$stmt = $conn->prepare("DELETE FROM product_tbl Where cID = :id");
	$stmt->bindparam(":id", $id);
	$stmt->execute();

	echo "<script>alert('SUCCESS')</script>";
	echo "<script>window.open('index.php','_self')</script>"
?>