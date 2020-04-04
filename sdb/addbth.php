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
                            Current Batches
							</div>';
							
			$query="SELECT * FROM batch";
		    $resource=mysqli_query($con,$query);
			
						echo '<div class="panel-body">
						      <div class="table-responsive">
							  <table class="table table-striped table-bordered table-hover">
							         <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Batch Name</th>
                                        </tr>
                                    </thead>
									<tbody>';
						
						while($result=mysqli_fetch_array($resource))
	                    {
		 
		                         echo ' <tr>
                                            <td>'.$result["bid"].'</td>
                                            <td>'.$result["bname"].'</td>
                                        </tr>
                                    </tbody>';
			            }				
	                echo '</table></div>';
		  echo '</div></div></div>';
		  
		  
		  
		  echo '<div class="col-md-6">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            Add a New Batch
							</div>';
	 	echo '<div class="form-group"><form action="submitbth.php" method="post">
        <strong>Batch Name :</strong>
              <input class="form-control" type="text" name="name" id="text" placeholder="Ex: First Batch" required>
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