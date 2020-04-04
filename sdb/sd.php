<?php

include "/hr.php";

echo '<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';

 $fid = (int)$_GET['id'];

  $query ="SELECT * FROM complaint WHERE id = ".$fid."";
	$results = $con->query($query);
	$rs=$results->fetch_assoc();
	
	     $qy ="SELECT uid,name FROM users WHERE id = ".$rs["uid"]."";
	     $res = $con->query($qy);
	     $rsd=$res->fetch_assoc();

		
	       echo '<div class="col-md-12 col-sm-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            '.$rsd['name'].' ('.$rsd['uid'].')
                        </div>
                        <div class="panel-body">
                            <p>'.$rs['post'].'</p>
							'.$rs['time'].'
                        </div>
					</div>
				  </div>';
					
					
					
				         if(isset($_POST['submit'])){
						    $qqr ="SELECT id FROM users WHERE uid = ".$pid."";
	                          $ftc = $con->query($qqr);
		                        $rr=$ftc->fetch_assoc();
	 $query="INSERT INTO comment (uid, cid, post) values('".$rr['id']."', '".$rs['id']."', '".$_POST['post']."')";
	 
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
                            <div class="btn btn-success">Comment Successfull Added!</div>
                        </div>
					</div></div>';
			}
			}
					
				
				$qr ="SELECT * FROM comment WHERE cid = ".$fid." ORDER BY `id` DESC";
	$rt = $con->query($qr);
	
	    echo '<div class="col-md-12">
		<div class="panel panel-primary">
            <div class="panel-heading">
                            Comments
                   </div>
		<div class="panel panel-default">';
	while($rst=$rt->fetch_assoc()){
	     $qry ="SELECT uid,name FROM users WHERE id = ".$rst["uid"]."";
	     $rtt = $con->query($qry);
		 $rtd=$rtt->fetch_assoc();
	    echo '<div class="panel-heading">
						    <div class="btn btn-danger">'.$rtd['name'].' ('.$rtd['uid'].')</div>
                            <p>'.$rst['post'].'</p>
							'.$rst['time'].'
                        </div>';
	}
	echo '</div></div></div>';	
				
				echo '<div class="col-md-12 col-sm-4">
                    <div class="panel panel-info">
					<div class="panel-footer"><form action="" method="post">
			<textarea class="form-control" rows="3" name="post" placeholder="Write a Comment" required></textarea>
	  <div align="right"><input type="submit" name="submit" class="btn btn-primary" value="Comment" /></div></form></div>
	              </div>
				 </div>';
    
include "fr.php";
?>