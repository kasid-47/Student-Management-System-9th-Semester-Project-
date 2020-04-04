<?php
include "config.php";

	$query ="SELECT sid FROM crsemester WHERE crsemid = '".$_POST["semid"]."'";
	$results = $con->query($query);
	
	echo '<option value="">Select Student Id</option>';
	while($rs=$results->fetch_assoc()) {
	echo "<option value='".$rs["sid"]."'>".$rs["sid"]."</option>";
     }
?>