<html>
<body>
	<form method="POST" action="ci_pe_db.php">
		UID:- <input type="text" name="UID" />
		<br /><br />
		Size:- <input type="text" name="size" />
		<br /><br />
		Gender:- <input type="text" name="gender" />
		<br /><br />
		Pattern:- <input type="text" name="pattern" />
		<br /><br />
		Purchase_Date:- <input type="date" name="pur_date" />
		<br /><br />
		Marked_Price:- <input type="number" name="marked" />
		<br /><br />
		Purchased_Price:- <input type="number" name="purchase" />
		<br /><br />
		Expiry(in months):- <input type="number" name="expiry" />
		<br /><br />
		<input type="submit" value="Save and Next" />
		<input type="submit" formaction="index.php" value="Exit" />
	</form>
</body>
</html>