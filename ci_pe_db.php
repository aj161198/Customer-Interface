<?php 
	include "connection.php";
	
	$uid =$_POST["UID"];
	$size = $_POST["size"];
	$gender = $_POST["gender"];
	$pattern = $_POST["pattern"];
	$marked = $_POST["marked"];
	$purchase = $_POST["purchase"];
	$pur_date = $_POST["pur_date"];
	$maturity = $_POST["expiry"];
	$expiry_date = date('Y-m-d', strtotime("+$maturity months", strtotime($pur_date)));
	
	$sql="INSERT INTO ci_prod_entry (UID, SIZE, GENDER, PATTERN, MARKED_PRICE, PURCHASE_PRICE, PURCHASE_DATE, MATURITY, EXPIRY_DATE)
	VALUES ('$uid', '$size', '$gender', '$pattern', $marked, $purchase, '$pur_date', '$maturity', '$expiry_date')";
	
	if (!$conn->query($sql)){
		die("Error :". $conn->error);
	}
	else{
		echo "Entry Completed Successfully";
		header('Refresh:5;url=http://localhost/ci/ci_pe.php');
		die();
	}
	
?>