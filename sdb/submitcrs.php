<?php
include "hr.php";
include "config.php";

  echo '<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';

if ($acp){
	  
	 $name=$_REQUEST['name']; 
	 $ccode=$_REQUEST['ccode'];
	 $tid= $_REQUEST['tid'];
	 $semid=$_REQUEST['semid'];
	 $credit=$_REQUEST['credit'];
	 $ctype=$_REQUEST['ctype'];
	 
	 $query="INSERT INTO course (cname, ccode, tid, semid, credit, ctype) values('".$name."', '".$ccode."', '".$tid."', '".$semid."', '".$credit."', '".$ctype."')";
	
	if(!mysqli_query($con,$query))
		  {die ("An unexpected error occured while saving the record, Please try again!");}
		  else
		 {
		  echo "<div class='content' align='center'>New Record Successfully Added!</div>";}
	
	echo "<div align='center'><a href='addcrs.php'>[Add Another Course]</a></div>";
	
	 }

else {
      echo "<div class ='container'><div class='login'>You are Not Log In<br/><a href='/sdb/login.php'>Click Here to Login !!!</a></div></div>";
     }

include "fr.php";

?>