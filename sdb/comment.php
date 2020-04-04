<?php
include "hr.php";

echo '<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';

if ($acp){
	  
	 $uid=$_REQUEST['uid']; 
	 $cid=$_REQUEST['cid'];
	 $post= $_REQUEST['post'];
	 
	 $query="INSERT INTO comment (uid, cid, post) values('".$uid."', '".$cid."', '".$post."')";
	 
		  if(!mysqli_multi_query($con,$query))
		  {die ("An unexpected error occured while saving the record, Please try again!");}
		  else
		 {
		  echo "<div class='content' align='center'>New Account Successfully Added!</div>";}
	
	echo "<div align='center'><a href='/sdb/complain.php'>[Add New Account]</a></div>";
	
	 }

else {
      echo "<div class ='container'><div class='login'>You are Not Log In<br/><a href='/sdb/login.php'>Click Here to Login !!!</a></div></div>";
     }

include "fr.php";

?>