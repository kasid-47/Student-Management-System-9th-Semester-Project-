<?php
include "hr.php";

echo '<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';

if ($acp){
	  
	 $name=$_REQUEST['name']; 
	 $id=$_REQUEST['id'];
	 $post= $_REQUEST['post'];
	 $date=$_REQUEST['date'];
	 $approve=$_REQUEST['approve'];
	 
	 $query="INSERT INTO complain (name, id, post, date, approve) values('".$name."', '".$id."', '".$post."', '".$date."', '".$approve."')";
	 
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