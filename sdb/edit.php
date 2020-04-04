<?php
include "hr.php";

    echo '<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';
					
if ($acp || $tcp){
$id=$_GET['id'];

		 $query="SELECT * FROM users WHERE id='".$id."'";
		 $resource=mysqli_query($con,$query);
		  $result=mysqli_fetch_array($resource);
		  
      echo '<div class="col-md-6">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                           Edit Account Info
							</div>';
							
	 echo '<div class="form-group"><form id="form1" name="form1" method="post" action="edit2.php">
		  <input class="form-control" name="id" type="hidden" value="'.$result['id'].'" />
          
		  <strong>Name of Student.:</strong>
		  <input class="form-control" name="name" type="text" value="'.$result['name'].'" />
		  
		  <strong>ID No.:</strong>
		  <input class="form-control" name="uid" type="number" value="'.$result['uid'].'" />
		  
		  <strong>Type </strong>:
		  <select class="form-control" name="utype">
		<option value="1">Admin</option>
		<option value="2">Teacher</option>
		<option value="3">Student</option>
                </select>
				
		<strong>Batch No. #:</strong>
		<input class="form-control" type="number" name="batch" value="'.$result['batch'].'" />
				
		<strong>Birth Day : </strong>
		<input class="form-control" type="date" value="'.$result['birth'].'" name="birth">
		
		<strong>Mobile No.</strong>:
		<input class="form-control" type="number" name="mob" value="'.$result['mob'].'" />
		
		<strong>Email Id</strong>:
		<input class="form-control" type="email" name="email" value="'.$result['email'].'" />
        </table>
        <div align="center">
          <label>
            <input type="submit" value="Edit" />
          </label></div></form>
        </p>';
		
				  echo '</div></div></div></div>';
		
	echo "<div align='center'><a href='/sdb'>[HOME]</a></div>";
	}
	
  else if ($scp){
    $id=$_GET['id'];

		 $query="SELECT * FROM users WHERE id='".$id."'";
		 $resource=mysqli_query($con,$query);
		  $result=mysqli_fetch_array($resource);
		  
		  echo '<div class="col-md-6">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                           Edit Your Account Info
							</div>';
		  
      echo '<div class="form-group"><form id="form1" name="form1" method="get" action="edit2.php">
        <table align="center" width="428" border="0">
		  <input name="id" type="hidden" value="'.$result['id'].'" />
          <strong>Name :</strong>
		  <input class="form-control" type="text" name="name" value="'.$result['name'].'" readonly/>
		  
		  <strong>ID No. :</strong>
		  <input class="form-control" type="text" name="uid" value="'.$result['uid'].'" readonly/>
		  
		  <strong>Batch No. :</strong>
		  <input class="form-control" type="text" name="batch" value="'.$result['batch'].'" readonly/>
		  
			<strong>Birth Day : </strong>
			<input class="form-control" type="date" value="'.$result['birth'].'" name="birth" readonly>
			
			<strong>Mobile No. :</strong>
			<input class="form-control" type="text" name="mob" value="'.$result['mob'].'" />
			
			<strong>Email Id :</strong>
			<input class="form-control" type="text" name="email" value="'.$result['email'].'" />
			
			<strong>Password : </strong>
			<input class="form-control" type="password" name="password" placeholder="Password" />
        </table>
        <div align="center">
          <label>
            <input type="submit" value="Edit" />
          </label></div>';
		
	echo "<div align='center'><a href='/sdb'>[HOME]</a></div>";
	}
	
	
else {
echo "<div class ='container'><div class='login'>You are Not Log In<br/><a href='/sdb/login.php'>Click Here to Login !!!</a></div></div>";
}

include "fr.php";

?>