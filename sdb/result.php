<?php
include "hr.php";
include "function.php";

   echo '<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';
	
     if ($acp){
  
	 	echo '<div class="col-md-5">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            Select a Student
							</div>';
	 	echo '<div class="form-group"><form action="showresult.php" method="post">
		  <b>Batch : </b>
		  <select class="form-control" name="batch" onChange="getStid(this.value);" required>
		<option value="">Select Batch</option>';
		
		$sql1="SELECT * FROM batch";
         $results=$con->query($sql1); 
		while($rs=$results->fetch_assoc()) {
		
		echo "<option class='form-control' value='".$rs['bid']."' >".$rs['bname']."</option>";
		}
		echo '</select>
		
		<b>Student Id : </b>
		  <select class="form-control" id="stid" name="sid" required>
		  <option class="form-control" value="">Select Student Id</option>
		  </select>
		
        <div align="right">
          <label>
            <input type="submit" value="Submit" />
          </label>
		  </form></div>';
		  echo '</div></div></div>';
		  
		  
		  echo '<div class="col-md-6">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            Select a Student
							</div>';
	 	echo '<div class="form-group"><form action="showresult.php" method="post">
		  <strong>Student Id :</strong>
		  <input class="form-control" name="sid" type="number" placeholder="Insert a Student Id"/>
        <div align="right">
          <label>
            <input type="submit" value="Submit" />
          </label>
		  </form></div>';
		  echo '</div></div></div></div>';
		 
	
	 }
	 
  else if ($tcp){
  
         echo '<div class="col-md-6">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            Select a Student
							</div>';
  
        $qq ="SELECT id FROM users WHERE uid = '".$pid."'";
	     $results = $con->query($qq);

         while($rs=$results->fetch_assoc())
	    {
	     $tid = $rs['id'];
	    }
	 	echo '<div class="form-group"><form action="showresult.php" method="post">
		  <select class="form-control" name="crsid" onChange="getSemid(this.value);" required>
		<option value="">Select Course Code</option>';
		$sql1="SELECT courseid,ccode FROM course WHERE tid = '".$tid."'";
         $results=$con->query($sql1); 
		while($rs=$results->fetch_assoc()) {
		
		echo "<option value='".$rs['courseid']."' >".$rs['ccode']."</option>";
		}
		
		echo '</select>
		<select class="form-control" id="sid" name="sid" required>
		  <option value="">Select Student Id</option>
		  </select>
		
        <div align="center">
          <label>
            <input type="submit" value="Submit" />
          </label>
		  </form></div>';
		  echo '</div></div></div></div>';
		 
	
	 }
  
  
 else if ($scp){
  
  $thgpa = 0;
  $lbgpa = 0;
  $tgpa = 0;
  $creditsum = 0;
	 
	 
	 $qr="SELECT crsemid FROM crsemester Where sid=".$pid."";
		    $rs=mysqli_query($con,$qr);
			    $rt=mysqli_fetch_array($rs);
								
	 
			/* ====================================================================12th Semester==================================================================== */
			
            if($rt['crsemid']>11){
			   echo '<div class="col-md-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            12th Semester
							</div>';
	 
	          $query="SELECT * FROM tresults WHERE sid='".$pid."' && semid='12'";
		        $resource=mysqli_query($con,$query);
		  
	            echo '<div class="panel-body">
			            <div class="table-responsive">
			                <table class="table table-striped table-bordered table-hover">
					            <thead>
                                    <tr>
                                        <th>Course Code</th>
										<th>Course Name</th>
                                        <th>Credit</th>
								        <th>Grade</th>
								        <th>Point</th>
                                    </tr>
                                </thead>
				            <tbody>';
									  
                 while($result=mysqli_fetch_array($resource))
	              {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$pid."' && semid='12'";
		             $resource=mysqli_query($con,$query);
									  
                 while($result=mysqli_fetch_array($resource))
	              {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $lbgpa = $lbgpa + $result['GPA'];
                  }
				  
				  $tgpa = $thgpa + $lbgpa;
				  
				    echo '
					      <tr>
						    <td></td>
							<td></td>
							<td></td>
							<td></td>
                            <td><b>GPA : </b>'.$tgpa.'</td>
                          </tr>';
				    echo '</tbody></table></div>';
					
				echo '</div></div></div>';
			}
					
			/* ====================================================================11th Semester==================================================================== */		
				
				
			if($rt['crsemid']>10){
				echo '<div class="col-md-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            11th Semester
							</div>';
	 
	            $query="SELECT * FROM tresults WHERE sid='".$pid."' && semid='11'";
		            $resource=mysqli_query($con,$query);
		  
	            echo '<div class="panel-body">
			            <div class="table-responsive">
			                <table class="table table-striped table-bordered table-hover">
					            <thead>
                                    <tr>
                                        <th>Course Code</th>
										<th>Course Name</th>
                                        <th>Credit</th>
								        <th>Grade</th>
								        <th>Point</th>
                                    </tr>
                                </thead>
				            <tbody>';
									  
                 while($result=mysqli_fetch_array($resource))
	              {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$pid."' && semid='11'";
		              $resource=mysqli_query($con,$query);
									  
                 while($result=mysqli_fetch_array($resource))
	              {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $lbgpa = $lbgpa + $result['GPA'];
                  }
				  
				  $tgpa = $thgpa + $lbgpa;
				  
				    echo '
					      <tr>
						    <td></td>
							<td></td>
							<td></td>
							<td></td>
                            <td><b>GPA : </b>'.$tgpa.'</td>
                          </tr>';
				    echo '</tbody></table></div>';
					
				echo '</div></div></div>';
			}
					
			/* ====================================================================10th Semester==================================================================== */		
				
				
			if($rt['crsemid']>9){
				echo '<div class="col-md-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            10th Semester
							</div>';
	 
	            $query="SELECT * FROM tresults WHERE sid='".$pid."' && semid='10'";
		            $resource=mysqli_query($con,$query);
		  
	                echo '<div class="panel-body">
			            <div class="table-responsive">
			                <table class="table table-striped table-bordered table-hover">
					            <thead>
                                    <tr>
                                        <th>Course Code</th>
										<th>Course Name</th>
                                        <th>Credit</th>
								        <th>Grade</th>
								        <th>Point</th>
                                    </tr>
                                </thead>
				            <tbody>';
									  
                 while($result=mysqli_fetch_array($resource))
	              {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$pid."' && semid='10'";
		                $resource=mysqli_query($con,$query);
									  
                   while($result=mysqli_fetch_array($resource))
	                {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $lbgpa = $lbgpa + $result['GPA'];
                  }
				  
				  $tgpa = $thgpa + $lbgpa;
				  
				    echo '
					      <tr>
						    <td></td>
							<td></td>
							<td></td>
							<td></td>
                            <td><b>GPA : </b>'.$tgpa.'</td>
                          </tr>';
				    echo '</tbody></table></div>';
					
				echo '</div></div></div>';
			}
			
            /* ====================================================================9th Semester==================================================================== */
                
			if($rt['crsemid']>8){
				
				echo '<div class="col-md-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            9th Semester
							</div>';
	 
	             $query="SELECT * FROM tresults WHERE sid='".$pid."' && semid='9'";
		            $resource=mysqli_query($con,$query);
		  
	            echo '<div class="panel-body">
			            <div class="table-responsive">
			                <table class="table table-striped table-bordered table-hover">
					            <thead>
                                    <tr>
                                        <th>Course Code</th>
										<th>Course Name</th>
                                        <th>Credit</th>
								        <th>Grade</th>
								        <th>Point</th>
                                    </tr>
                                </thead>
				            <tbody>';
									  
                 while($result=mysqli_fetch_array($resource))
	              {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$pid."' && semid='9'";
		              $resource=mysqli_query($con,$query);
									  
                   while($result=mysqli_fetch_array($resource))
	                {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $lbgpa = $lbgpa + $result['GPA'];
                  }
				  
				  $tgpa = $thgpa + $lbgpa;
				  
				    echo '
					      <tr>
						    <td></td>
							<td></td>
							<td></td>
							<td></td>
                            <td><b>GPA : </b>'.$tgpa.'</td>
                          </tr>';
				    echo '</tbody></table></div>';
					
				echo '</div></div></div>';
			}
				
				
			/* ====================================================================8th Semester==================================================================== */
			    
			if($rt['crsemid']>7){
				
				echo '<div class="col-md-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            8th Semester
							</div>';
	 
	            $query="SELECT * FROM tresults WHERE sid='".$pid."' && semid='8'";
		            $resource=mysqli_query($con,$query);
		  
	            echo '<div class="panel-body">
			            <div class="table-responsive">
			                <table class="table table-striped table-bordered table-hover">
					            <thead>
                                    <tr>
                                        <th>Course Code</th>
										<th>Course Name</th>
                                        <th>Credit</th>
								        <th>Grade</th>
								        <th>Point</th>
                                    </tr>
                                </thead>
				            <tbody>';
									  
                 while($result=mysqli_fetch_array($resource))
	              {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$pid."' && semid='8'";
		                $resource=mysqli_query($con,$query);
									  
                 while($result=mysqli_fetch_array($resource))
	              {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $lbgpa = $lbgpa + $result['GPA'];
                  }
				  
				  $tgpa = $thgpa + $lbgpa;
				  
				    echo '
					      <tr>
						    <td></td>
							<td></td>
							<td></td>
							<td></td>
                            <td><b>GPA : </b>'.$tgpa.'</td>
                          </tr>';
				    echo '</tbody></table></div>';
					
				echo '</div></div></div>';
			}
			
			/* ====================================================================7th Semester==================================================================== */
			    
			if($rt['crsemid']>6){	
				echo '<div class="col-md-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            7th Semester
							</div>';
	 
	            $query="SELECT * FROM tresults WHERE sid='".$pid."' && semid='7'";
		            $resource=mysqli_query($con,$query);
		  
	            echo '<div class="panel-body">
			            <div class="table-responsive">
			                <table class="table table-striped table-bordered table-hover">
					            <thead>
                                    <tr>
                                        <th>Course Code</th>
										<th>Course Name</th>
                                        <th>Credit</th>
								        <th>Grade</th>
								        <th>Point</th>
                                    </tr>
                                </thead>
				            <tbody>';
									  
                 while($result=mysqli_fetch_array($resource))
	              {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$pid."' && semid='7'";
		                $resource=mysqli_query($con,$query);
									  
                    while($result=mysqli_fetch_array($resource))
	                {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $lbgpa = $lbgpa + $result['GPA'];
                  }
				  
				  $tgpa = $thgpa + $lbgpa;
				  
				    echo '
					      <tr>
						    <td></td>
							<td></td>
							<td></td>
							<td></td>
                            <td><b>GPA : </b>'.$tgpa.'</td>
                          </tr>';
				    echo '</tbody></table></div>';
					
				echo '</div></div></div>';
			}

            /* ====================================================================6th Semester==================================================================== */
			    
			if($rt['crsemid']>5){
				echo '<div class="col-md-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            6th Semester
							</div>';
	 
	            $query="SELECT * FROM tresults WHERE sid='".$pid."' && semid='6'";
		            $resource=mysqli_query($con,$query);
		  
	            echo '<div class="panel-body">
			            <div class="table-responsive">
			                <table class="table table-striped table-bordered table-hover">
					            <thead>
                                    <tr>
                                        <th>Course Code</th>
										<th>Course Name</th>
                                        <th>Credit</th>
								        <th>Grade</th>
								        <th>Point</th>
                                    </tr>
                                </thead>
				            <tbody>';
									  
                 while($result=mysqli_fetch_array($resource))
	              {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$pid."' && semid='6'";
		                $resource=mysqli_query($con,$query);
									  
                 while($result=mysqli_fetch_array($resource))
	              {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $lbgpa = $lbgpa + $result['GPA'];
                  }
				  
				  $tgpa = $thgpa + $lbgpa;
				  
				    echo '
					      <tr>
						    <td></td>
							<td></td>
							<td></td>
							<td></td>
                            <td><b>GPA : </b>'.$tgpa.'</td>
                          </tr>';
				    echo '</tbody></table></div>';
					
				echo '</div></div></div>';
			}
			
		    /* ====================================================================5th Semester==================================================================== */
		        
			if($rt['crsemid']>4){
				echo '<div class="col-md-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            5th Semester
							</div>';
	 
	                $query="SELECT * FROM tresults WHERE sid='".$pid."' && semid='5'";
		                $resource=mysqli_query($con,$query);
		  
	            echo '<div class="panel-body">
			            <div class="table-responsive">
			                <table class="table table-striped table-bordered table-hover">
					            <thead>
                                    <tr>
                                        <th>Course Code</th>
										<th>Course Name</th>
                                        <th>Credit</th>
								        <th>Grade</th>
								        <th>Point</th>
                                    </tr>
                                </thead>
				            <tbody>';
									  
                 while($result=mysqli_fetch_array($resource))
	              {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$pid."' && semid='5'";
		                $resource=mysqli_query($con,$query);
									  
                 while($result=mysqli_fetch_array($resource))
	              {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $lbgpa = $lbgpa + $result['GPA'];
                  }
				  
				  $tgpa = $thgpa + $lbgpa;
				  
				    echo '
					      <tr>
						    <td></td>
							<td></td>
							<td></td>
							<td></td>
                            <td><b>GPA : </b>'.$tgpa.'</td>
                          </tr>';
				    echo '</tbody></table></div>';
					
				echo '</div></div></div>';
			}
        
		    /* ====================================================================4th Semester==================================================================== */
				
			if($rt['crsemid']>3){
				echo '<div class="col-md-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            4th Semester
							</div>';
	 
	                $query="SELECT * FROM tresults WHERE sid='".$pid."' && semid='4'";
		                $resource=mysqli_query($con,$query);
		  
	            echo '<div class="panel-body">
			            <div class="table-responsive">
			                <table class="table table-striped table-bordered table-hover">
					            <thead>
                                    <tr>
                                        <th>Course Code</th>
										<th>Course Name</th>
                                        <th>Credit</th>
								        <th>Grade</th>
								        <th>Point</th>
                                    </tr>
                                </thead>
				            <tbody>';
									  
                 while($result=mysqli_fetch_array($resource))
	              {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$pid."' && semid='4'";
		                $resource=mysqli_query($con,$query);
									  
                 while($result=mysqli_fetch_array($resource))
	              {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $lbgpa = $lbgpa + $result['GPA'];
                  }
				  
				  $tgpa = $thgpa + $lbgpa;
				  
				    echo '
					      <tr>
						    <td></td>
							<td></td>
							<td></td>
							<td></td>
                            <td><b>GPA : </b>'.$tgpa.'</td>
                          </tr>';
				    echo '</tbody></table></div>';
					
				echo '</div></div></div>';
            }				
				
			
			/* ====================================================================3rd Semester==================================================================== */
				
			if($rt['crsemid']>2){
				echo '<div class="col-md-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            3rd Semester
							</div>';
	 
	                $query="SELECT * FROM tresults WHERE sid='".$pid."' && semid='3'";
		                $resource=mysqli_query($con,$query);
		  
	            echo '<div class="panel-body">
			            <div class="table-responsive">
			                <table class="table table-striped table-bordered table-hover">
					            <thead>
                                    <tr>
                                        <th>Course Code</th>
										<th>Course Name</th>
                                        <th>Credit</th>
								        <th>Grade</th>
								        <th>Point</th>
                                    </tr>
                                </thead>
				            <tbody>';
									  
                 while($result=mysqli_fetch_array($resource))
	              {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$pid."' && semid='3'";
		                $resource=mysqli_query($con,$query);
									  
                    while($result=mysqli_fetch_array($resource))
	                {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $lbgpa = $lbgpa + $result['GPA'];
                  }
				  
				  $tgpa = $thgpa + $lbgpa;
				  
				    echo '
					      <tr>
						    <td></td>
							<td></td>
							<td></td>
							<td></td>
                            <td><b>GPA : </b>'.$tgpa.'</td>
                          </tr>';
				    echo '</tbody></table></div>';
					
				echo '</div></div></div>';
			}
					
			/* ====================================================================2nd Semester==================================================================== */
				
			if($rt['crsemid']>1){
				echo '<div class="col-md-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            2nd Semester
							</div>';
	 
	                $query="SELECT * FROM tresults WHERE sid='".$pid."' && semid='2'";
		                $resource=mysqli_query($con,$query);
		  
	            echo '<div class="panel-body">
			            <div class="table-responsive">
			                <table class="table table-striped table-bordered table-hover">
					            <thead>
                                    <tr>
                                        <th>Course Code</th>
										<th>Course Name</th>
                                        <th>Credit</th>
								        <th>Grade</th>
								        <th>Point</th>
                                    </tr>
                                </thead>
				            <tbody>';
									  
                    while($result=mysqli_fetch_array($resource))
	                {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$pid."' && semid='2'";
		                $resource=mysqli_query($con,$query);
									  
                    while($result=mysqli_fetch_array($resource))
	                {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $lbgpa = $lbgpa + $result['GPA'];
                    }
				  
				  $tgpa = $thgpa + $lbgpa;
				  
				    echo '
					      <tr>
						    <td></td>
							<td></td>
							<td></td>
							<td></td>
                            <td><b>GPA : </b>'.$tgpa.'</td>
                          </tr>';
				    echo '</tbody></table></div>';
					
				echo '</div></div></div>';
			}
					
			
			/* ====================================================================1st Semester==================================================================== */
			
				echo '<div class="col-md-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            1st Semester
							</div>';
	 
	                $query="SELECT * FROM tresults WHERE sid='".$pid."' && semid='1'";
		                $resource=mysqli_query($con,$query);
		  
	            echo '<div class="panel-body">
			            <div class="table-responsive">
			                <table class="table table-striped table-bordered table-hover">
					            <thead>
                                    <tr>
                                        <th>Course Code</th>
										<th>Course Name</th>
                                        <th>Credit</th>
								        <th>Grade</th>
								        <th>Point</th>
                                    </tr>
                                </thead>
				            <tbody>';
									  
                    while($result=mysqli_fetch_array($resource))
	                {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $creditsum = $creditsum + $result["acredit"];
						  $thgpa = $thgpa + ($result['GPA']*$result["acredit"]);
                    }
					
					
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$pid."' && semid='1'";
		                $resource=mysqli_query($con,$query);
									  
                    while($result=mysqli_fetch_array($resource))
	                {
	                  $qt="SELECT ccode,cname FROM course WHERE courseid='".$result['crsid']."'";
		                $rse=mysqli_query($con,$qt);	  
                          while($rst=mysqli_fetch_array($rse))
	                       {
	                        $cc = $rst['ccode'];
							$cname = $rst['cname'];
	                       }
	                echo '
					      <tr>
                            <td>'.$cc.'</td>
							<td>'.$cname.'</td>
                            <td>'.$result["acredit"].'</td>
							<td>'.$result["grade"].'</td>
							<td>'.$result["GPA"].'</td>
                          </tr>';
						  $creditsum = $creditsum + $result["acredit"];
						  $lbgpa = $lbgpa + ($result['GPA']*$result["acredit"]);
                  }
				  
				  $tgpa = $thgpa + $lbgpa;
				  $tgpa = $tgpa/$creditsum;
				  $tgpa = number_format($tgpa, 2, '.', '');
				  
				    echo '
					      <tr>
						    <td></td>
							<td></td>
							<td></td>
							<td></td>
                            <td><b>GPA : </b>'.$tgpa.'</td>
                          </tr>';
				    echo '</tbody></table></div>';
					
				echo '</div></div></div>';
				
					
}

else{
echo "<div class ='container'><div class='login'>You are Not Log In<br/><a href='/sdb/login.php'>Click Here to Login !!!</a></div></div>";
}

include "fr.php";

?>