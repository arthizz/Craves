<?php
	require_once '../connection/connection.php';

	$id = $_GET['id'];
	$status1 = 1;
	$status2 = 2;

	$stmt = $conn->prepare("SELECT * FROM checkout_tbl WHERE user_id = :id");
	$stmt->bindparam(":id", $id);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if($row['cStatus'] == 0){
		$stmt = $conn->prepare("UPDATE checkout_tbl SET cStatus = :status WHERE user_id = :id");
		$stmt->bindparam(":id", $id);
		$stmt->bindparam(":status", $status1);
		$stmt->execute();

		$stmt = $conn->prepare("UPDATE history_tbl SET cStatus = :status WHERE user_id = :id");
		$stmt->bindparam(":id", $id);
		$stmt->bindparam(":status", $status1);
		$stmt->execute();


	}else if($row['cStatus'] == 1){
		$stmt = $conn->prepare("UPDATE checkout_tbl SET cStatus = :status1 WHERE user_id = :id");
		$stmt->bindparam(":id", $id);
		$stmt->bindparam(":status1", $status2);
		$stmt->execute();

		$stmt = $conn->prepare("UPDATE history_tbl SET cStatus = :status1 WHERE user_id = :id");
		$stmt->bindparam(":id", $id);
		$stmt->bindparam(":status1", $status2);
		$stmt->execute();

		$stmt = $conn->prepare("INSERT INTO history_tbl(user_id, cFname, cLname, cProduct, cPrice, cImg, cDate, cStatus) SELECT user_id, cFname, cLname, cProduct, cPrice, cImg, cDate, cStatus FROM checkout_tbl");
			$stmt->execute();

		$stmt = $conn->prepare("DELETE FROM checkout_tbl WHERE user_id = :id");
		$stmt->bindparam(":id", $id);
		$stmt->execute();

}
	echo "<script>window.open('../admin/transaction.php','_self')</script>";

	
?>