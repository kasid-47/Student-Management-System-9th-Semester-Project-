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
                            Admin Info
							</div>';
					
                 $query="SELECT * FROM users WHERE uid='".$pid."'";
		            $resource=mysqli_query($con,$query);
		  
                       while($result=mysqli_fetch_array($resource))
	                    {
			   
                          echo "<div class='panel-body'><a href='/sdb/edit.php?id=".$result['id']."'>Edit Info</a><br/>";
	                      echo "Name : ".$result['name']."<br/>
	                            ID : ".$result['uid']."<br/>
		                        Birth Day : ".$result['birth']."<br/>
		                        Mobile No. : ".$result['mob']."<br/>
		                        Email Id : ".$result['email']."</div>";
	                    }
	 
	                      echo '</div></div></div>';
              }
			 
			 
			 
 else if ($tcp){

             echo '<div class="col-md-6">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            Admin Info
							</div>';
							
                 $query="SELECT * FROM users WHERE uid='".$pid."'";
		            $resource=mysqli_query($con,$query);
		  
                       while($result=mysqli_fetch_array($resource))
	                    {
			   
                          echo "<div class='panel-body'><a href='/sdb/edit.php?id=".$result['id']."'>Edit Info</a><br/>";
	                      echo "Name : ".$result['name']."<br/>
	                            ID : ".$result['uid']."<br/>
		                        Birth Day : ".$result['birth']."<br/>
		                        Mobile No. : ".$result['mob']."<br/>
		                        Email Id : ".$result['email']."</div>";
	                    }
	 
	                      echo '</div></div></div>';
              }


 else if ($scp){

             echo '<div class="col-md-6">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            Student Info
							</div>';

                 $query="SELECT * FROM users WHERE uid='".$pid."'";
		            $resource=mysqli_query($con,$query);
		  
                       while($result=mysqli_fetch_array($resource))
	                    {
	                      $qr="SELECT crsemid FROM crsemester Where sid=".$result['uid']."";
		                    $rs=mysqli_query($con,$qr);
			                  $rst=mysqli_fetch_array($rs);
			   
                          echo "<div class='panel-body'><a href='/sdb/edit.php?id=".$result['id']."'>Edit Info</a><br/>";
	                      echo "Name : ".$result['name']."<br/>
	                            ID : ".$result['uid']."<br/>
		                        Batch No : ".$result['batch']."<br/>
		                        Current Semester : ".$rst['crsemid']."<br/>
		                        Birth Day : ".$result['birth']."<br/>
		                        Mobile No. : ".$result['mob']."<br/>
		                        Email Id : ".$result['email']."</div>";
	                    }
	 
	                      echo '</div></div></div>';
}

else{
echo "<div class ='container'><div class='login'>You are Not Log In<br/><a href='/sdb/login.php'>Click Here to Login !!!</a></div></div>";
}

include "fr.php";

?>