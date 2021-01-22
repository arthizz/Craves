<?php
	require_once '../connection/connection.php';

	session_start();

	$id = $_GET['id'];

	$sth = $conn->prepare("SELECT * FROM product_tbl WHERE cID = :id");
	$sth->bindparam(":id", $id);
	$sth->execute();

	$row = $sth->fetch(PDO::FETCH_ASSOC);

	$img = $row['cProduct_img'];
	$name = $row['cProduct_name'];
	$price = $row['cProduct_price'];

	$sth1 = $conn->prepare("SELECT * FROM user_tbl where cID = :id");
	$sth1->bindparam(":id", $_SESSION['user']);
	$sth1->execute();

	$row1 = $sth1->fetch(PDO::FETCH_ASSOC);
	$fname = $row1['cFname'];
	$lname = $row1['cLname'];

	$stmt = $conn->prepare("INSERT INTO cart_tbl(cProduct, cPrice, cProduct_img)VALUES(:product, :price, :img)");
	$stmt->bindparam(":product", $name);
	$stmt->bindparam(":price", $price);
	$stmt->bindparam(":img", $img);
	$stmt->execute();

	echo "<script>window.open('../kiosk/products-kiosk.php','_self')</script>";




	


?>