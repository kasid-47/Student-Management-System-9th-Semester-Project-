<?php
include "hr.php";

   echo '<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';

if ($acp){
        echo '<div class="col-md-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            Complain Box
							</div>';
							
			
			
			if(!isset($_POST['id'])){
			$_REQUEST['id']=0;
            }			
			$id=$_REQUEST['id'];
            if($id != ''){
	           $query="DELETE FROM complaint WHERE id='".$id."'";
		
		      if(!mysqli_query($con,$query))
		       {
		  echo '<div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <div class="btn btn-danger">An unexpected error occured while saving the record, Please try again!</div>
                        </div>
					</div></div>';
		  }
		  else
		 {
		  
		  echo '<div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <div class="btn btn-success">Complaint Successfully Deleted!</div>
                        </div>
					</div></div>';
			}
			}

		
							
			$query="SELECT * FROM complaint ORDER BY ID DESC";
		    $resource=mysqli_query($con,$query);
			
						echo '<div class="panel-body">
						      <div class="table-responsive">
							  <table class="table table-striped table-bordered table-hover" >
							         <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
											<th>Complain</th>
											<th>Date</th>
											<th>Approve</th>
											<th>Action</th>
                                        </tr>
                                    </thead>';
						
						while($result=mysqli_fetch_array($resource))
	                    {
		 
		                         echo ' <tr>
                                            <td>'.$result["id"].'</td>
                                            <td>'.$result["uid"].'</td>
											<td>'.$result["post"].'</td>
											<td>'.$result["time"].'</td>
											<td>'.$result["approve"].'</td>
											<td><div class="btn-group">
										  <button class="btn btn-primary">Action</button>
										  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></button>
										  <ul class="dropdown-menu">
											<li><a href="/sdb/'.$result["id"].'">Reply</a></li>
										  </ul>
										</div></td>
											</tr>
                                    </tbody>
                                ';
			            }				
	                echo '</table></div>';
		  echo '</div></div></div></div>';
	
	 }
  else if ($tcp||$scp){
  
         echo '<div class="col-md-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            Complaint Box
							</div></div></div>';
  
         if(isset($_POST['submit'])){
						    $qqr ="SELECT id FROM users WHERE uid = ".$pid."";
	                          $ftc = $con->query($qqr);
		                        $rr=$ftc->fetch_assoc();
	 $query="INSERT INTO complaint (uid, post) values('".$rr['id']."', '".$_POST['post']."')";
	 
		  if(!mysqli_multi_query($con,$query))
		  {
		  echo '<div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <div class="btn btn-danger">An unexpected error occured while saving the record, Please try again!</div>
                        </div>
					</div></div>';
		  }
		  else
		 {
		  
		  echo '<div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <div class="btn btn-success">Complaint Successfully Added!</div>
                        </div>
					</div></div>';
			}
			}
  
  
         echo '<div class="col-md-12">
                    <div class="panel panel-info">
					<div class="panel-footer"><form action="" method="post">
			<textarea class="form-control" rows="3" name="post" placeholder="Write a Complaint or Suggestion" required></textarea>
	  <div align="right"><input type="submit" name="submit" class="btn btn-primary" value="POST" /></div></form></div>
	              </div>
				 </div>';
  
		  $query ="SELECT * FROM complaint WHERE approve = 1 ORDER BY id DESC";
	$results = $con->query($query);
	while($rs=$results->fetch_assoc()){
	
	     $qy ="SELECT uid,name FROM users WHERE id = ".$rs["uid"]."";
	     $res = $con->query($qy);
	     $rsd=$res->fetch_assoc();
	       echo '<div class="col-md-12 col-sm-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            '.$rsd['name'].' ('.$rsd['uid'].')
                        </div>
                        <div class="panel-footer">
                            <p>'.$rs['post'].' <a href="/sdb/complaint/'.$rs["id"].'" class="btn btn-info btn-xs">Continue...</a></p>
							'.$rs['time'].'
                        </div>
					 </div>
				  </div>';
	     }
	 }

else {
      echo "<div class ='container'><div class='login'>You are Not Log In<br/><a href='/sdb/login.php'>Click Here to Login !!!</a></div></div>";
     }

include "fr.php";

?>