<?php
	require_once '../connection/connection.php';
	session_start();
	$qty = $_GET['qty'];
	$id = $_GET['id'];
	$price = $_GET['price'];
	$x = 0;
	
	$stmt = $conn->prepare("SELECT * FROM product_tbl Where cID = :id");
	$stmt->bindparam(":id", $id);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	$stmt = $conn->prepare("SELECT * FROM user_tbl WHERE cID = :id");
	$stmt->bindparam(":id", $_SESSION['user']);
	$stmt->execute();

	$row1 = $stmt->fetch(PDO::FETCH_ASSOC);

	while($x < $qty){
		$stmt = $conn->prepare("INSERT INTO cart_tbl(user_id, cFname, cLname, cProduct, cPrice, cProduct_img)VALUES(:uid, :fname, :lname, :product, :price, :img)");
		$stmt->bindparam(":uid", $_SESSION['user']);
		$stmt->bindparam(":fname", $row1['cFname']);
		$stmt->bindparam(":lname", $row1['cLname']);
		$stmt->bindparam(":product", $row['cProduct_name']);
		$stmt->bindparam(":price", $price);
		$stmt->bindparam(":img", $row['cProduct_img']);
		$stmt->execute();
		$x++;

	}
	echo "<script>window.open('../products.php','_self')</script>";

?>