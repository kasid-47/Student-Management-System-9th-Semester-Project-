<?php
include "hr.php";

   echo '<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';

if ($acp){

	 $id=$_REQUEST['id'];
	 $name=$_REQUEST['name']; 
	 $uid=$_REQUEST['uid'];
	 $utype= $_REQUEST['utype'];
	 $batch=$_REQUEST['batch'];
	 $birth=$_REQUEST['birth'];
	 $mob=$_REQUEST['mob'];
	 $email=$_REQUEST['email'];
	 
	 $query="UPDATE users SET name='".$name."', uid='".$uid."', batch='".$batch."', birth='".$birth."', mob='".$mob."', email='".$email."', utype='".$utype."' WHERE id='".$id."'";
		
		  if(!mysqli_query($con,$query))
		  {die ("An unexpected error occured while saving the record, Please try again!");}
		  else
		 {
		  echo "<div class='content' align='center'>".$name." | ID : ".$uid." Updated Successfully!</div>";}
	
	echo "<div align='center'>
	<a href='profile.php'>[Back to Profile]</a></div>";
	
    }
else if ($scp){
	 $mob=$_REQUEST['mob'];
	 $email=$_REQUEST['email'];
	 $password=$_REQUEST['password'];
	 $pass= md5($password);
	 
	 if($password=='')
	 {
	 $query="UPDATE users SET mob='".$mob."', email='".$email."' WHERE id=".$_REQUEST['id'].";";
	  }
	  else
	  {
	  $query="UPDATE users SET mob='".$mob."', email='".$email."', pass='".$pass."' WHERE id=".$_REQUEST['id'].";";
	  }
		  if(!mysqli_query($con,$query))
		  {die ("An unexpected error occured while saving the record, Please try again!");}
		  else
		 {
		  echo "<div class='content' align='center'>".$_REQUEST['name']." | ID : ".$_REQUEST['id']." Updated Successfully!";}
	
	echo "<div align='center'>
	<a href='profile.php'>[Back to Profile]</a></div>";
	
    }

else {
      echo "<div class ='container'><div class='login'>You are Not Log In<br/><a href='/sdb/login.php'>Click Here to Login !!!</a></div></div>";
     }

include "fr.php";

?>