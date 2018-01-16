<?php session_start(); 
	include "connection.php";	
	$_SESSION["name"] = $_POST["name"];
	$_SESSION["gender"] = $_POST["gender"];
	$_SESSION["date"] = isset($_POST["date"]) ? $_POST["date"] : "";
	$_SESSION["email"] = $_POST["email"];
	$_SESSION["new_mobile"] = isset($_POST["new_mobile"]) ? $_POST["new_mobile"] : $_SESSION["mobile"];
?>
<html>
<head>
	<script src="ci_ce_pur.js"></script>
</head>
<body>
<?php 
	$sql_bill = "SELECT BILL_NO FROM ci_ledger ORDER BY BILL_NO DESC LIMIT 1";
	$results = $conn->query($sql_bill);
	$row = $results->fetch_assoc();
	$bill_no = $row["BILL_NO"] + 1;
	$_SESSION["BILL_NO"] = $bill_no;
?>
<form name="Purchase" action="SMS/sendsms.php" method="POST">
	Bill_No :<input type="number" name="bill_no" value="<?php echo $bill_no; ?>" readonly /><br/><br/>
	<pre>UID's			Price</pre>
	<div id="uid">
		<input type="text"  name="uid[]" />
		<input type="number" name="price[]" onblur="findTotal()" />
		<br/><br/>
	</div>
	<div id="add"></div>
	<input type="button" value="Add another" onclick="add()" />
	<p>Search UID:&ensp;<input type="text" onkeyup="show(this.value)" name="uid_search" placeholder="UID_Search" /><span id="uid_det"></span></p>

	Total : <input type="text"  name="total" id="total" readonly /><br/><br/>
	Rebate : <input type="number" name="rebate" onkeyup="rebate_()" id="rebate" /><br/><br/>
	Purchase : <input type="number" name="purchase" id="purchase" readonly /><br/><br/>
	
	<input type="submit" value="Submit & Send_SMS" />
	<button type="submit" formaction="abort.php">Abort</button>
	
</form>
	
</body>
</html>