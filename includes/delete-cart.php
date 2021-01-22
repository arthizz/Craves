<?php
	require_once '../connection/connection.php';

	$product = $_GET['name'];
	$price = $_GET['price'];
	$qty = $_POST['qty'];
	$ctr = 0;

	while($ctr < $qty){
		$stmt = $conn->prepare("SELECT * FROM cart_tbl WHERE cProduct = :product AND cPrice = :price");
		$stmt->bindparam(":product", $product);
		$stmt->bindparam(":price", $price);
		$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			$stmt = $conn->prepare("DELETE FROM cart_tbl WHERE cID = :id");
			$stmt->bindparam(":id", $row['cID']);
			$stmt->execute();
			

		$ctr++;

	}


	echo "<script>window.open('../products.php','_self')</script>";

?>