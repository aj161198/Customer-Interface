<html>
<head>
	<title>PRODUCT ENTRY LOGIN</title>
</head>
<?php 
	$id=$pass="";
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$id = $_POST["userId"];
		$pass = $_POST["password"];
		
		if($id == "1234" && $pass == "ajuba") {
			header("Location: ci_pe.php");
			die();
		} 
		else {
			$Error = "Invalid UserID or Password";
			echo $Error;
		}
	}
?>
<body>
	<form method="POST" action="ci_pe_login.php">
		UserID:- <input type="text" name="userId" value="<?php echo $id;?>" />
		Password:- <input type="password" name="password" value="<?php echo $pass;?>" />
		<input type="submit" />
	</form>
</body>

</html>