<?php

include "config.php";

	$query ="SELECT semid FROM course WHERE courseid = '".$_POST["crsid"]."'";
	$results = $con->query($query);

while($rs=$results->fetch_assoc())
	 {
	 echo $rs['semid'];
	 
  }
  
?>