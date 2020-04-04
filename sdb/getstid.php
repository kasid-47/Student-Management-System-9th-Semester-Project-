<?php
include "config.php";

	$query ="SELECT uid FROM users WHERE batch = '".$_POST["batch"]."'";
	$results = $con->query($query);
	echo '<option value="">Select Student Id</option>';
	while($rs=$results->fetch_assoc()) {
	echo "<option value='".$rs["uid"]."'>".$rs["uid"]."</option>";
     }
?>