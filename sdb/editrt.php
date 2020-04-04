<?php
include "hr.php";

    echo '<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';
					
if ($acp){

     if($_GET['act'] == 'theory') {
         if(isset($_POST['tsubmit'])){
			
			$query="UPDATE tresults SET atten=".$_POST['atten'].", assign=".$_POST['assign'].", ctest=".$_POST['ctest'].", mid=".$_POST['mid'].", fnal=".$_POST['fnal']."";
	
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
                            <div class="btn btn-success">Result Successfully Updated!</div>
                        </div>
					</div></div>';
			   }
			}


        $id=$_GET['id'];

		 $query="SELECT * FROM tresults WHERE rid='".$id."'";
		 $resource=mysqli_query($con,$query);
		  $result=mysqli_fetch_array($resource);
		  
      echo '<div class="col-md-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                           Edit Results
							</div>';
							
	 echo '<div class="form-group"><form id="form1" name="form1" method="post" action="">
		  <strong>Attendence :</strong>
		  <input class="form-control" name="atten" type="number" value="'.$result['atten'].'" />
          
		  <strong>Assignment :</strong>
		  <input class="form-control" name="assign" type="number" value="'.$result['assign'].'" />
		  
		  <strong>Class Test :</strong>
		  <input class="form-control" name="ctest" type="number" value="'.$result['ctest'].'" />
		  
		<strong>Mid-Term :</strong>
		<input class="form-control" name="mid" type="number" value="'.$result['mid'].'" />
				
		<strong>Final :</strong>:
		<input class="form-control" name="fnal" type="number" value="'.$result['fnal'].'" />
		
		</table>
        <div align="right">
          <label>
            <input type="submit" name="tsubmit" value="Edit Result" />
          </label></div></form>
        </p>';
		
				  echo '</div></div></div></div>';
	}
	
	
	     if($_GET['act'] == 'lab') {
         if(isset($_POST['lsubmit'])){
			
			$query="UPDATE lresults SET atten=".$_POST['atten'].", asses=".$_POST['asses'].", ltest=".$_POST['ltest']."";
	
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
                            <div class="btn btn-success">Result Successfully Updated!</div>
                        </div>
					</div></div>';
			   }
			}


        $id=$_GET['id'];

		 $query="SELECT * FROM lresults WHERE rid='".$id."'";
		 $resource=mysqli_query($con,$query);
		  $result=mysqli_fetch_array($resource);
		  
      echo '<div class="col-md-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                           Edit Results
							</div>';
							
	 echo '<div class="form-group"><form id="form1" name="form1" method="post" action="">
		  <strong>Attendence :</strong>
		  <input class="form-control" name="atten" type="number" value="'.$result['atten'].'" />
          
		  <strong>Assesment :</strong>
		  <input class="form-control" name="asses" type="number" value="'.$result['asses'].'" />
		  
		  <strong>Lab Test :</strong>
		  <input class="form-control" name="ltest" type="number" value="'.$result['ltest'].'" />
		  
		</table>
        <div align="right">
          <label>
            <input type="submit" name="lsubmit" value="Edit Result" />
          </label></div></form>
        </p>';
		
				  echo '</div></div></div></div>';
	}
	}
	
else {
echo "<div class ='container'><div class='login'>You are Not Log In<br/><a href='/sdb/login.php'>Click Here to Login !!!</a></div></div>";
}

include "fr.php";

?>