<?php
	require_once '../connection/connection.php';
	session_start();
	session_unset();
	session_destroy();


	echo "<script>alert('LOGOUT SUCCESS')</script>";
	echo "<script>window.open('../index.php','_self')</script>";


?>