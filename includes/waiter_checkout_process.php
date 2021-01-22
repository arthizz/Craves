<?php
	require_once '../connection/connection.php';

		$id = $_GET['id'];
		$status = 0;
		$date = date("m-d-y h:i:s a");


			$stmt = $conn->prepare("SELECT * FROM user_tbl WHERE cID = :id");
			$stmt->bindparam(":id", $id);
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$fullname = $row['cFname'].' '.$row['cLname'];

			$stmt1 = $conn->prepare("SELECT * FROM waiter_cart_tbl Where user_id = :id");
			$stmt1->bindparam(":id", $id);
			$stmt1->execute();

			while($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
				$stmt2 = $conn->prepare("SELECT * FROM waiter_cart_tbl Where cDate = :dat");
				$stmt2->bindparam(":dat", $row['cDate']);
				$stmt2->execute();
				$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

				$stmt3 = $conn->prepare("INSERT INTO cashier_tbl (user_id, cWaiter_name, cProduct, cPrice, cStatus, cDate)VALUES(:id, :name, :product, :price, :status, :dat)");
				$stmt3->bindparam(":id", $id);
				$stmt3->bindparam(":name", $fullname);
				$stmt3->bindparam(":product", $row2['cProduct']);
				$stmt3->bindparam(":status", $status);
				$stmt3->bindparam(":dat", $date);
				$stmt3->bindparam(":price", $row2['cPrice']);
				$stmt3->execute();

			}


			$stmt = $conn->prepare("DELETE FROM waiter_cart_tbl WHERE user_id = :id");	
			$stmt->bindparam(":id", $id);
			$stmt->execute();
			
	echo "<script>window.open('../kiosk/products-kiosk.php','_self')</script>";

	
?>