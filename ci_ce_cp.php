<?php session_start();?>
<html>
<body>
<?php 
	include 'connection.php';
	$mobile = $_SESSION['mobile'];
	$sql = "SELECT * FROM ci_cust_prof where MOBILE = $mobile";
	if (!$conn->query($sql)){
		die("ERROR: " .$conn->error);
	}
	
	$result = $conn->query($sql);

	if ($result->num_rows == 0){
?>

<form method="POST" action="ci_ce_pur.php">
	Name : <input type="text" pattern="[a-zA-Z ]{3,20}" name="name" autofocus required /><br/><br/>
	Gender :
	<select name="gender">
		<option value="male">Male</option>
		<option value="female" selected>Female</option>
		<option value="other">Other</option>
	</select><br/><br/>
	D.O.B : <input type="date" name="date" /><br/><br/>
	Mobile : <input type="text" value="<?php echo $mobile; ?>" readonly /><br/><br/>
	E-mail : <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" /><br/><br/>
	<input type="submit" value="Proceed" />
</form>
<?php 
}

else if ($result->num_rows == 1){
	$row = $result->fetch_assoc();
	$name = $row["NAME"];
	$birth_date = $row["BIRTHDATE"];
	$gender = $row["GENDER"];
	$email = $row["EMAIL"];
	$mobile = $row["MOBILE"];
	$frequency = $row["FREQUENCY"];
	$revenue = $row["REVENUE"];
	$last_visit = $row["LAST_VISIT"];
	$last_purchase = $row["LAST_PURCHASE"];
	$rebate = $row["REBATE"];
?>

<form action = "ci_ce_pur.php" method="POST">
	Name : <input type="text" name="name" value="<?php echo $name; ?>" readonly />
	<br/><br/>
	Update Mobile : <input type="text" name="new_mobile" value="<?php echo $mobile; ?>" />
	<br/><br/>
	Gender : <input type="text" name="gender" value="<?php echo $gender; ?>" readonly />
	<br/><br/>
	Age : <input type="number" value="<?php $from = new DateTime($birth_date); $to = new DateTime('today'); echo $from->diff($to)->y;?>" readonly />
	<br/><br/>
	Update E-mail : <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo $email?>" />
	<br/><br/>
	Revenue : <input type="number" name="revenue" value="<?php echo $revenue;?>" readonly />
	<br/><br/>
	Frequency : <input type="number" name="frequency" value="<?php echo $frequency?>" readonly />
	<br/><br/>
	Last_Visit : <input type="date" name="last_visit" value="<?php echo $last_visit; ?>" readonly />
	<br/><br/>
	Last_Purchase : <input type="number" name="last_purchase" value="<?php echo $last_purchase; ?>" readonly />
	<br/><br/>
	Rebate : <input type="number" name="rebate" value="<?php echo $rebate; ?>" readonly />
	<br/><br/>
	<input type="submit" value="PROCEED">
</form>

<?php
}
?>

<?php $conn->close();?>

</body>
</html>