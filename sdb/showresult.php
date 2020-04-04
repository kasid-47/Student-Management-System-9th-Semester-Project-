<?php
include "hr.php";
include "function.php";

   echo '<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';
	
  
 if ($acp||$tcp){
  $sid=$_REQUEST['sid'];
  $thgpa = 0;
  $lbgpa = 0;
  $tgpa = 0;
  $creditsum = 0;
	 
	 
	 $qr="SELECT crsemid FROM crsemester Where sid=".$sid."";
		    $rs=mysqli_query($con,$qr);
			    $rt=mysqli_fetch_array($rs);
								
	 
			/* ====================================================================12th Semester==================================================================== */
			
            if($rt['crsemid']>11){
			   echo '<div class="col-md-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            12th Semester
							</div>';
	 
	          $query="SELECT * FROM tresults WHERE sid='".$sid."' && semid='12'";
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
										<th>Action</th>
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=theory"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$sid."' && semid='12'";
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
						    <td><a href="editrt.php?id='.$result["rid"].'&act=lab"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
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
	 
	            $query="SELECT * FROM tresults WHERE sid='".$sid."' && semid='11'";
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
										<th>Action</th>
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=theory"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$sid."' && semid='11'";
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=lab"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
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
	 
	            $query="SELECT * FROM tresults WHERE sid='".$sid."' && semid='10'";
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
										<th>Action</th>
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=theory"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$sid."' && semid='10'";
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=lab"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
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
	 
	             $query="SELECT * FROM tresults WHERE sid='".$sid."' && semid='9'";
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
										<th>Action</th>
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=theory"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$sid."' && semid='9'";
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=lab"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
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
	 
	            $query="SELECT * FROM tresults WHERE sid='".$sid."' && semid='8'";
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
										<th>Action</th>
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=theory"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$sid."' && semid='8'";
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=lab"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
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
	 
	            $query="SELECT * FROM tresults WHERE sid='".$sid."' && semid='7'";
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
										<th>Action</th>
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=theory"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$sid."' && semid='7'";
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=lab"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
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
	 
	            $query="SELECT * FROM tresults WHERE sid='".$sid."' && semid='6'";
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
										<th>Action</th>
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=theory"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$sid."' && semid='6'";
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=lab"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
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
	 
	                $query="SELECT * FROM tresults WHERE sid='".$sid."' && semid='5'";
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
										<th>Action</th>
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=theory"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$sid."' && semid='5'";
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=lab"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
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
	 
	                $query="SELECT * FROM tresults WHERE sid='".$sid."' && semid='4'";
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
										<th>Action</th>
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=theory"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$sid."' && semid='4'";
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=lab"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
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
	 
	                $query="SELECT * FROM tresults WHERE sid='".$sid."' && semid='3'";
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
										<th>Action</th>
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=theory"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$sid."' && semid='3'";
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=lab"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
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
	 
	                $query="SELECT * FROM tresults WHERE sid='".$sid."' && semid='2'";
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
										<th>Action</th>
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=theory"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
                          </tr>';
						  $thgpa = $thgpa + $result['GPA'];
                  }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$sid."' && semid='2'";
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=lab"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
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
	 
	                $query="SELECT * FROM tresults WHERE sid='".$sid."' && semid='1'";
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
										<th>Action</th>
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=theory"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
                          </tr>';
						  $creditsum = $creditsum + $result["acredit"];
						  $thgpa = $thgpa + ($result['GPA']*$result["acredit"]);
                    }
				  		
					
					$query="SELECT * FROM lresults WHERE sid='".$sid."' && semid='1'";
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
							<td><a href="editrt.php?id='.$result["rid"].'&act=lab"><img src="/sdb/assets/img/edit.png" width="38px" ></a></td>
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
				
			echo "<div align='center'><a href='result.php'>[Check Another Student Result]</a></div>";
					
}

else{
echo "<div class ='container'><div class='login'>You are Not Log In<br/><a href='/sdb/login.php'>Click Here to Login !!!</a></div></div>";
}

include "fr.php";

?>