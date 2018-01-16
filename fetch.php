<!DOCTYPE html>
<html>
<body>

<?php
$q = intval($_GET['q']);
include 'connection.php';

$sql="SELECT * FROM ci_prod_entry WHERE UID= $q";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $p_p = $row['PURCHASE_PRICE'];
    $m_p = $row['MARKED_PRICE'];
    $d_p = $row['PURCHASE_DATE'];
}
$conn->close();
?>
<form>
<pre>Purchase_Price		  Marked_Price	          Date_Purchase</pre>
<input type="text" value="<?php echo $p_p;?>" readonly />
<input type="text" value="<?php echo $m_p;?>" readonly />
<input type="text" value="<?php echo $d_p;?>" readonly />
</form>
</body>
</html>