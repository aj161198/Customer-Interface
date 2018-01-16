<?php
session_start();
include('way2sms-api.php');
include 'connection.php';

	$bill_no = $_SESSION["BILL_NO"] ;
	$_SESSION["uid"] = $_POST["uid"];
	$_SESSION["price"] = $_POST["price"];
	$uid = "9561503330";
	$pass = "ajuba";
	$phone = $_SESSION['new_mobile'];
	$mes_uid = "";
	$purchase = $_POST['purchase'];
	$rebate = $_POST["rebate"];
	$mobile = $_SESSION['mobile'];
	$sql = "SELECT * FROM ci_cust_prof where MOBILE = $mobile";
	if (!$conn->query($sql)){
		die("ERROR: " .$conn->error);
	}
	
	$result = $conn->query($sql);
	$price = $purchase;
	
	$name = $_SESSION['name'];
	$gender = $_SESSION['gender'];
	$birth_date = $_SESSION['date'];
	$email = $_SESSION['email'];
	$last_visit = date('Y-m-d', time());
	
	if ($result->num_rows == 0){
		$sql = "INSERT INTO ci_cust_prof (NAME, GENDER, BIRTHDATE, EMAIL, MOBILE, FREQUENCY, REVENUE, LAST_VISIT, LAST_PURCHASE, REBATE)
		VALUES ('$name', '$gender', '$birth_date', '$email', '$phone', '1', '$price', '$last_visit', '$price', '$rebate')";
	} 
	else{
		$sql = "UPDATE ci_cust_prof
		SET MOBILE = $phone, FREQUENCY = FREQUENCY + 1, REVENUE = REVENUE + $price, LAST_VISIT = '$last_visit', LAST_PURCHASE = $price, EMAIL = '$email' ,REBATE = REBATE + $rebate
		WHERE MOBILE = $mobile";
	}
		
	if (!$conn->query($sql)){
		die("Error :". $conn->error);
	}
		
	
	$sql_le = "INSERT INTO ci_ledger (DATE, MOBILE, PURCHASE)
	VALUES ('$last_visit', '$phone', '$price')";
	if (!$conn->query($sql_le)){
		die("Error :". $conn->error);
	}
	
	for ($i = 0;  $i  < count($_SESSION['uid']); $i++){
		$temp = $_SESSION['price'][$i];
		$temp_ = $_SESSION['uid'][$i];
		$mes_uid = $mes_uid . $temp_ . "; ";
		$sql_sa = "INSERT INTO ci_sales (BILL_NO, UID, PRICE)
		VALUES ('$bill_no', '$temp_', '$temp')";
		
		if (!$conn->query($sql_sa)){
			die("Error :". $conn->error);
		}
	}
	
	$message = "Thank you for the purchase " . $_SESSION['name'] . ". The UID's you own are : " . $mes_uid . "are worth Rs. $price. Greetings From Ajooba Kids Collection.";
    sendWay2SMS($uid,$pass,$phone,$message);
