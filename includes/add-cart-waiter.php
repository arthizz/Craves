<?php
	require_once '../connection/connection.php';

	session_start();

	$id = $_GET['id'];
	$qty = $_POST['quant'];
	$x = 0;
	$date = date("m-d-y h:i:s a");

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

	while($x < $qty){
		$stmt = $conn->prepare("INSERT INTO waiter_cart_tbl(user_id, cFname, cLname, cProduct, cPrice, cProduct_img, cDate)VALUES(:id, :fname, :lname, :product, :price, :img, :dat)");
	$stmt->bindparam(":id", $_SESSION['user']);
	$stmt->bindparam(":fname", $fname);
	$stmt->bindparam(":lname", $lname);
	$stmt->bindparam(":product", $name);
	$stmt->bindparam(":price", $price);
	$stmt->bindparam(":img", $img);
	$stmt->bindparam(":dat", $date);
	$stmt->execute();

		$x++;
	}

	echo "<script>window.open('../kiosk/products-kiosk.php','_self')</script>";




	


?>