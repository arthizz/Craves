<?php
	 require_once '../connection/connection.php';

	 $date = $_POST['date'];
	 $expenses = $_POST['expenses'];
	 $rev = $_POST['rev'];

	 $stmt = $conn->prepare("INSERT INTO chart_tbl(cBudget_date, cExpenses, cRevenue)VALUES(:bud, :ex, :rev)");
	 $stmt->bindparam(":bud", $date);
	 $stmt->bindparam(":ex", $expenses);
	 $stmt->bindparam(":rev", $rev);
	 $stmt->execute();

	 echo "<script>window.open('../admin/cash.php','_self')</script>"

?>