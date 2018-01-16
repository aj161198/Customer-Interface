<?php session_start();?>
<html>
<body>
<?php 
	$mobileError = $mobile = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$mobile = $_POST["mobile"];
		if (empty($mobile)){
			$mobileError = "Required Field";
		} 
		else if(preg_match("/^[0-9]{10}$/", $mobile)) {
			$_SESSION['mobile'] = $_POST["mobile"];
			header("Location: ci_ce_cp.php");
			die();
		} 
		else {
			$mobileError = "10 digit integers only";
		}
	}
?>

<form action="ci_ce_mob.php" method="post">
	Mobile : <input type="text" name="mobile" value="<?php echo $mobile;?>" autofocus /><span><?php echo $mobileError;?><span><br/><br/>
	<input type="submit" value="Proceed" />
	<button type="submit" formaction="index.php">Previous</button>
</form>

</body>
</html>