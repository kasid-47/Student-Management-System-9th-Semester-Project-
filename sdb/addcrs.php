<?php
include "hr.php";

   echo '<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';

if ($acp){

           echo '<div class="col-md-6">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            Current Courses
							</div>';
					
			$query="SELECT * FROM course";
		    $resource=mysqli_query($con,$query);
			
						echo '<div class="panel-body">
						      <div class="table-responsive">
							  <table class="table table-striped table-bordered table-hover">
							         <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Name</th>
											<th>Course Code</th>
											<th>Assigned Teacher</th>
                                        </tr>
                                    </thead>';
						
						while($result=mysqli_fetch_array($resource))
	                    {
						       $qr="SELECT name FROM users Where id=".$result['tid']."";
		                        $rs=mysqli_query($con,$qr);
								$rst=mysqli_fetch_array($rs);
								
		                         echo ' <tr>
                                            <td>'.$result["courseid"].'</td>
                                            <td>'.$result["cname"].'</td>
											<td>'.$result["ccode"].'</td>
											<td>'.$rst["name"].'</td>
                                        </tr>
                                    </tbody>
                                ';
			            }				
	                echo '</table></div>';
		  echo '</div></div></div>';


























	 	 echo '<div class="col-md-6">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            Add a New Course
							</div>';
	 	echo '<div class="form-group"><form action="submitcrs.php" method="post">
        <strong>Course Name :</strong>
              <input class="form-control" type="text" name="name" id="text" placeholder="Course Name" required>
            <strong>Course Code.:</strong>
			<input class="form-control" type="text" name="ccode" placeholder="Course Code" required>
		  
		  <strong>Select a Teacher :</strong>
		  <select class="form-control" name="tid">
		<option value="">Select Teachers Id</option>';
		
		$sql12="SELECT id,name FROM users WHERE utype = '2'";
         $results=$con->query($sql12); 
		while($rs=$results->fetch_assoc()) {
		
		echo "<option value='".$rs['id']."' >".$rs['name']."</option>";
		}
		
		echo '</select>
		<strong>Semester : </strong>
		      <select class="form-control" name="semid">
			<option value="">Select Semester</option>
		<option value="1">1st Semester</option>
		<option value="2">2nd Semester</option>
		<option value="3">3rd Semester</option>
		<option value="4">4nd Semester</option>
		<option value="5">5th Semester</option>
		<option value="6">6th Semester</option>
		<option value="7">7th Semester</option>
		<option value="8">8th Semester</option>
		<option value="9">9th Semester</option>
		<option value="10">10th Semester</option>
		<option value="11">11th Semester</option>
		<option value="12">12th Semester</option>
                </select>
				
            <strong>Credit : </strong>
		       <select class="form-control" name="credit">
		<option value="">Select Credit</option>
		<option value="1">Credit : 1</option>
		<option value="1.5">Credit : 1.5</option>
		<option value="2">Credit : 2</option>
		<option value="2.5">Credit : 2.5</option>
		<option value="3">Credit : 3</option>
		<option value="3.5">Credit : 3.5</option>
                </select>
				
            <strong>Course Type : </strong>
		   <select class="form-control" name="ctype">
		<option value="">Select Course Type</option>
           <option value="0">Theory</option>
		<option value="1">Lab</option>
		    </select>
        
        <div align="center">
          <label>
            <input type="submit" value="Submit" />
          </label></div>';
		  echo '</div></div></div></div>';
	 }

else {
      echo "<div class ='container'><div class='login'>You are Not Log In<br/><a href='/sdb/login.php'>Click Here to Login !!!</a></div></div>";
     }

include "fr.php";

?>