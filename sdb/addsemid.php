<?php
include "hr.php";
include "config.php";

   echo '<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';

if ($acp){

           echo '<div class="col-md-6">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            Semester List
							</div>';
					
			$query="SELECT * FROM semester";
		    $resource=mysqli_query($con,$query);
			
						echo '<div class="panel-body">
						      <div class="table-responsive">
							  <table class="table table-striped table-bordered table-hover">
							         <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Semester</th>
                                        </tr>
                                    </thead>';
						
						while($result=mysqli_fetch_array($resource))
	                    {
		                         echo ' <tr>
                                            <td>'.$result["semid"].'</td>
                                            <td>'.$result["semester"].'</td>
                                        </tr>
                                    </tbody>
                                ';
			            }				
	                echo '</table></div>';
		  echo '</div></div></div>';


	 	 		  echo '<div class="col-md-6">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            Add a New Semester
							</div>';
	 	echo '<div class="form-group"><form action="submitsemid.php" method="post">
        <strong>Batch Name :</strong>
              <input class="form-control" type="text" name="name" id="text" placeholder="Ex: First Semester" required>
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