<?php
include "hr.php";

echo '<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';

if ($acp){
	  
	 $name=$_REQUEST['name']; 
	 $uid=$_REQUEST['uid'];
	 $utype= $_REQUEST['utype'];
	 $batch=$_REQUEST['batch'];
	 $birth=$_REQUEST['birth'];
	 $mob=$_REQUEST['mob'];
	 $email=$_REQUEST['email'];
	 $password= $_REQUEST['password'];
	 $pass= md5($password);
	 
	 $query="INSERT INTO users (name, uid, batch, birth, mob, email, utype, pass) values('".$name."', '".$uid."', '".$batch."', '".$birth."', '".$mob."', '".$email."', '".$utype."', '".$pass."')";
	 $query2="INSERT INTO crsemester (crsemid, sid) values('1', '".$uid."')";
	
	$ttr = mysqli_multi_query($con,$query);
	$tts = mysqli_multi_query($con,$query2);
		  if(!$ttr && !tts)
		  {die ("An unexpected error occured while saving the record, Please try again!");}
		  else
		 {
		  echo "<div class='content' align='center'>New Account Successfully Added!</div>";}
	
	echo "<div align='center'><a href='/sdb/insert.php'>[Add New Account]</a></div>";
	
	 }

else {
      echo "<div class ='container'><div class='login'>You are Not Log In<br/><a href='/sdb/login.php'>Click Here to Login !!!</a></div></div>";
     }

include "fr.php";

?>