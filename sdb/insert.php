<?php
include "hr.php";
include "config.php";

   echo '<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';

if ($acp){

        echo '<div class="col-md-8">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            Admin and Teachers
							</div>';
							
			$query="SELECT * FROM users WHERE utype='1' || utype='2'";
		    $resource=mysqli_query($con,$query);
			
						echo '<div class="panel-body">
						      <div class="table-responsive">
							  <table class="table table-striped table-bordered table-hover" >
							         <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
											<th>Birth Day</th>
											<th>Mob</th>
											<th>Email</th>
											<th>Action</th>
                                        </tr>
                                    </thead>';
						
						while($result=mysqli_fetch_array($resource))
	                    {
		 
		                         echo ' <tr>
                                            <td>'.$result["uid"].'</td>
                                            <td>'.$result["name"].'</td>
											<td>'.$result["birth"].'</td>
											<td>'.$result["mob"].'</td>
											<td>'.$result["email"].'</td>
											<td><a href="edit.php?id='.$result["id"].'"><img src="/sdb/assets/img/edit.png" width="38px" ></a> | <a href="delete.php?id='.$result["id"].'"><img src="/sdb/assets/img/delete.png" width="38px" ></a></td>
                                        </tr>
                                    </tbody>
                                ';
			            }				
	                echo '</table></div>';
		  echo '</div></div></div>';
		  
		  
		  
		  echo '<div class="col-md-4">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            Add a New Account
							</div>';
	 	 
	 	echo '<div class="form-group"><form action="insert2.php" method="post">
        <strong>Name :</strong>
              <input class="form-control" type="text" name="name" id="text" placeholder="Name" required>
            <strong>ID NO.:</strong>
			<input class="form-control" type="text" name="uid" placeholder="Student Id" required>
			<strong>Type </strong>:
			<select class="form-control" name="utype">
		<option value="1">Admin</option>
		<option value="2">Teacher</option>
		<option value="3">Student</option>
                </select>
			<strong>Batch No. :</strong>
			<input class="form-control" type="text" name="batch" placeholder="Batch" required>
			
				<strong>Birth Day : </strong>
				<input class="form-control" type="date" name="birth">
				<strong>Mob No. : </strong>
				<input class="form-control" type="text" name="mob" placeholder="Mobile No">
				<strong>Email Id : </strong>
				<input class="form-control" type="text" name="email" placeholder="Email Id">
				<strong>Password : </strong>:
				<input class="form-control" type="password" name="password" placeholder="Password" required>
        <div align="center">
          <label>
            <input type="submit" value="Submit" />
          </label></form>';
		  echo '</div></div></div></div>';


		  echo '<div class="col-md-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            All Students
							</div>';
							
			$query="SELECT * FROM users";
		    $resource=mysqli_query($con,$query);
			
						echo '<div class="panel-body">
						      <div class="table-responsive">
							  <table class="table table-striped table-bordered table-hover" >
							         <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
											<th>Batch</th>
											<th>Birth Day</th>
											<th>Mob</th>
											<th>Email</th>
											<th>Action</th>
                                        </tr>
                                    </thead>';
						
						while($result=mysqli_fetch_array($resource))
	                    {
		 
		                         echo ' <tr>
                                            <td>'.$result["uid"].'</td>
                                            <td>'.$result["name"].'</td>
											<td>'.$result["batch"].'</td>
											<td>'.$result["birth"].'</td>
											<td>'.$result["mob"].'</td>
											<td>'.$result["email"].'</td>
											<td><a href="edit.php?id='.$result["id"].'"><img src="/sdb/assets/img/edit.png" width="38px" ></a> | <a href="delete.php?id='.$result["id"].'"><img src="/sdb/assets/img/delete.png" width="38px" ></a></td>
                                        </tr>
                                    </tbody>
                                ';
			            }				
	                echo '</table></div>';
		  echo '</div></div></div></div></div>';
	
	 }

else {
      echo "<div class ='container'><div class='login'>You are Not Log In<br/><a href='/sdb/login.php'>Click Here to Login !!!</a></div></div>";
     }

include "fr.php";

?>