<?php

include "config.php";

function getCredit($tresult,$crsid){
     if ($tresult>39){
     global $con;
     $qr="SELECT credit FROM course WHERE courseid='".$crsid."'";
		 $rsc=mysqli_query($con,$qr);
       while($rst=mysqli_fetch_array($rsc))
	   {
         return $rst['credit'];
       }
   }
}


function getPoint($z) {
	if ($z > 79)
	  {
    $z = "4.00";
      }
    else if ($z > 74)
	  {
    $z = "3.75";
      }
	else if ($z > 69)
	  {
    $z = "3.50";
      }
	else if ($z > 64)
	  {
    $z = "3.25";
      }
	else if ($z > 59)
	  {
    $z = "3.00";
      }
	else if ($z > 54)
	  {
    $z = "2.75";
      }
	else if ($z > 49)
	  {
    $z = "2.50";
      }  
	else if ($z > 44)
	  {
    $z = "2.25";
      }  
	else if ($z > 39)
	  {
    $z = "2.00";
      }
	else
	  {
    $z = "0.00";
      }
	  
    return $z;
}


function getGrade($z) {
	if ($z > 79)
	  {
    $z = "A+";
      }
    else if ($z > 74)
	  {
    $z = "A";
      }
	else if ($z > 69)
	  {
    $z = "A-";
      }
	else if ($z > 64)
	  {
    $z = "B+";
      }
	else if ($z > 59)
	  {
    $z = "B";
      }
	else if ($z > 54)
	  {
    $z = "B-";
      }
	else if ($z > 49)
	  {
    $z = "C+";
      }  
	else if ($z > 44)
	  {
    $z = "C";
      }  
	else if ($z > 39)
	  {
    $z = "D";
      }
	else
	  {
    $z = "F";
      }
	  
    return $z;
}

?>

<script>
function getStudent(val) {
	$.ajax({
	type: "POST",
	url: "getsid.php",
	data:'semid='+val,
	success: function(data){
		$("#sid").html(data);
	}
	});
}

function getSemid(val) {
	$.ajax({
	type: "POST",
	url: "getsemid.php",
	data:'crsid='+val,
	success: function(data){
	   getStudent(data);
	}
	});
}

function getlStudent(val) {
	$.ajax({
	type: "POST",
	url: "getsid.php",
	data:'semid='+val,
	success: function(data){
		$("#sidl").html(data);
	}
	});
}

function getlSemid(val) {
	$.ajax({
	type: "POST",
	url: "getsemid.php",
	data:'crsid='+val,
	success: function(data){
	   getlStudent(data);
	}
	});
}


function getStid(val) {
	$.ajax({
	type: "POST",
	url: "getstid.php",
	data:'batch='+val,
	success: function(data){
		$("#stid").html(data);
	}
	});
}

</script>