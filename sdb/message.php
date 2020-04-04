<?php

include "/hr.php";

echo '<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';
					
				         if(isset($_POST['submit'])){
						    
							$qid = "SELECT * FROM `users` WHERE uid=".$_POST['receiver']."";
$rst = mysqli_query($con,$qid);
$rs= mysqli_fetch_array($rst);
$count = mysqli_num_rows($rst);

                            if ($count == 1){
                        $qqr ="SELECT id FROM users WHERE uid = ".$pid."";
	                          $ftc = $con->query($qqr);
		                        $rr=$ftc->fetch_assoc();
	 $query="INSERT INTO message (msg, sender, receiver) values('".$_POST['msg']."', '".$rr['id']."', '".$rs['id']."')";
	 
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
                            <div class="btn btn-success">Message Successfully Sent to '.$rs["name"].' ('.$rs["id"].')</div>
                        </div>
					</div></div>';
			}
			}
			else{
			echo '<div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <div class="btn btn-danger">User Id Not Found! Please Check The Id.</div>
                        </div>
					</div></div>';
			}
			}
					
				
				echo '<div class="col-md-12 col-sm-4">
                    <div class="panel panel-info">
					<div class="panel-footer"><form action="" method="post">
					<strong>Send To:</strong>
			<input class="form-control" type="text" name="receiver" placeholder="Enter a User Id" required>
			<textarea class="form-control" rows="3" name="msg" placeholder="Write a Message" required></textarea>
	  <div align="right"><input type="submit" name="submit" class="btn btn-primary" value="Send" /></div></form></div>
	              </div>
				 </div>';
				 
				 
				 
				 
				 
				 
				 
		
  
         
		  $query ="SELECT * FROM message";
	$results = $con->query($query);
	while($rs=$results->fetch_assoc()){
	
	     $qy ="SELECT uid,name FROM users WHERE id = ".$rs["sender"]."";
	     $res = $con->query($qy);
	     $rsd=$res->fetch_assoc();
	       echo '<div class="col-md-12 col-sm-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            '.$rsd['name'].' ('.$rsd['uid'].')
                        </div>
                        <div class="panel-footer">
                            <p>'.$rs['msg'].'</p>
							'.$rs['time'].'
                        </div>
					 </div>
				  </div>';	 
				 
				 }
				 
				 
				 
				 
				 
				 
				 
				 
include "fr.php";
?>