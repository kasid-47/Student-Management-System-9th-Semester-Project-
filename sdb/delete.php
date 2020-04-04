<?php
include "hr.php";

   echo '<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';

if ($acp){

	 $id=$_REQUEST['id']; 	 
	 $query="DELETE FROM users WHERE id='".$id."'";
	 $qr=mysqli_query($con,"SELECT * FROM users WHERE id='".$id."'");
     $did= mysqli_fetch_array($qr);
		
		  if(!mysqli_query($con,$query))
		  {die ("An unexpected error occured while <b>deleting</b> the record, Please try again!");}
		  else
		 {
		  echo "<div class='content' align='center'>ID Removed successfully!</div>";}
	
	echo "<div align='center'><a href='insert.php'>[Delete More Accounts]</a></div>";
	
	}
	else if ($tcp){
	echo "<div class ='container'><div class='login'><font color='red'>Sorry !!!</font> You Can Not Delete This Id. You are not allowed.<br/>
	<center><a href='/sdb'>[Home]</a></center></div></div>";
	}

else {
      echo "<div class ='container'><div class='login'>You are Not Log In<br/><a href='/sdb/login.php'>Click Here to Login !!!</a></div></div>";
     }


include "fr.php";

?>